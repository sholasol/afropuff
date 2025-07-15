<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PaystackService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    protected $paystackService;

    public function __construct(PaystackService $paystackService)
    {
        $this->paystackService = $paystackService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cart.index');
    }

    public function checkout()
    {
        $user = Auth::user();

        return view('cart.checkout', ['user' => $user]);
    }

    public function storeCart($id)
    {
        try {
            $product = Product::findOrFail($id);

            if (auth()->check()) {
                $cart_id = auth()->user()->customer_id;
            } else {
                $cart_id = session()->get('cart_token', Str::random(32));
                session()->put('cart_token', $cart_id);
            }

            $cart = session()->get('cart', []);

            // Get quantity from request (default to 1 if not provided)
            $quantity = request()->input('quantity', 1);

            // Get variant ID from request if available
            $variantId = request()->input('variant_id');
            $cartKey = $variantId ? $id . '_' . $variantId : $id;

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] += $quantity;
            } else {
                $cart[$cartKey] = [
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->regular_price,
                    "image" => $product->featuredImage,
                    "variant_id" => $variantId,
                    // "variant_name" => $variantId ? Variant::find($variantId)->name : null
                ];
            }

            // store cart in session
            session()->put('cart', $cart);

            // Calculate total items in cart
            $cartCount = array_sum(array_column($cart, 'quantity'));

            // Check if request expects JSON response
            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item added successfully.',
                    'cart_count' => $cartCount
                ]);
            }

            // For regular requests, return redirect
            noty()
                ->layout('topCenter')
                ->info('Item added successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            // Always return JSON for errors since AJAX requests need consistent response format
            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error adding item to cart: ' . $e->getMessage()
                ], 500);
            }

            // For regular requests
            noty()->danger('Error adding item to cart: ' . $e->getMessage());
            return redirect()->back();
        }
    }



    public function updateCartQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return response()->json(['success' => false, 'message' => 'Item not found in cart.']);
        }

        $newQuantity = (int) $request->quantity;

        if ($newQuantity <= 0) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return response()->json(['success' => true, 'message' => 'Item removed from cart']);
        }

        // Update quantity
        $cart[$id]['quantity'] = $newQuantity;
        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Quantity updated']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function deleteFromCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            noty()
                ->layout('topCenter')
                ->info('Item removed successfully.');
            return redirect()->back();
        }

        noty()
            ->layout('topCenter')
            ->danger('Item not found in the cart.');
        return redirect()->back();
    }

    public function clearCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (!$cart) {
            noty()->warning('Your cart is empty.');
            return redirect()->back();
        }

        session()->forget('cart');

        noty()
            ->layout('topCenter')
            ->info('Cart cleared successfully.');
        return redirect()->back();
    }


    /**
     * Initialize Paystack payment
     */
    public function initializePayment(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required|email',
            'shipping_address' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'nullable|string',
        ]);

        // Get cart items from session
        $cart = session()->get('cart', []);

        // Ensure cart is not empty
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        // Calculate total amount from session cart
        $totalAmount = 0;
        foreach ($cart as $id => $details) {
            $totalAmount += $details['price'] * $details['quantity'];
        }

        if ($totalAmount <= 0) {
            return redirect()->back()->with('error', 'Cart total is invalid.');
        }

        // Convert to kobo (Paystack uses kobo for NGN)
        $amountInKobo = $totalAmount * 100;

        try {
            // Generate reference
            $reference = $this->paystackService->generateReference();

            // Create order record
            $order = Order::create([
                'customer_id' => Auth::check() ? Auth::id() : null,
                'reference' => $reference,
                'amount' => $totalAmount,
                'email' => $request->email,
                'shipping_address' => $request->shipping_address,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'status' => 'pending'
            ]);

            $user = Auth::user();
            if (!$user->phone) {
                $user->update([
                    'phone' => $request->phone
                ]);
            }

            // Create order items from session cart
            foreach ($cart as $cartKey => $item) {
                // Extract product ID from cart key (handle variant keys like "1_2")
                $productId = explode('_', $cartKey)[0];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'variant_id' => $item['variant_id'] ?? null
                ]);
            }

            // Prepare payment data
            $paymentData = [
                'amount' => $amountInKobo,
                'reference' => $reference,
                'email' => $request->email,
                'currency' => 'NGN',
                'callback_url' => route('payment.callback'),
                'channels' => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
                'metadata' => [
                    'order_id' => $order->id,
                    'user_id' => Auth::check() ? Auth::id() : null,
                    'custom_fields' => [
                        [
                            'display_name' => 'Order ID',
                            'variable_name' => 'order_id',
                            'value' => $order->id
                        ]
                    ]
                ]
            ];

            // Initialize payment
            $payment = $this->paystackService->initializePayment($paymentData);

            if ($payment['status']) {
                return redirect($payment['data']['authorization_url']);
            } else {
                // Delete the order if payment initialization fails
                $order->delete();
                noty()
                    ->layout('topCenter')
                    ->info('error', $payment['message']);

                return redirect()->route('cart')
                    ->with('error', $payment['message']);
            }
        } catch (\Exception $e) {
            Log::error('Payment initialization failed: ' . $e->getMessage());

            noty()
                ->layout('topCenter')
                ->info('Payment initialization failed. Try again');
            return redirect()->route('cart')
                ->with('error', 'Payment initialization failed. Please try again.');
        }
    }

    /**
     * Handle Paystack payment callback
     */
    public function handlePaymentCallback(Request $request)
    {
        $reference = $request->reference;

        if (!$reference) {
            noty()
                ->layout('topCenter')
                ->info('Payment Response not found.');

            return redirect()->route('cart')
                ->with('error', 'Payment reference not found!');
        }

        try {
            // Verify payment
            $verification = $this->paystackService->verifyPayment($reference);

            if ($verification['status'] && $verification['data']['status'] === 'success') {
                // Payment successful
                $order = Order::where('reference', $reference)->first();

                if ($order) {
                    // Update order status
                    $order->update([
                        'status' => 'paid',
                        'payment_reference' => $verification['data']['reference'],
                        'gateway_response' => $verification['data']['gateway_response'],
                        'updated_at' => now()
                    ]);

                    // Clear session cart instead of database cart
                    session()->forget('cart');

                    // Also clear cart token if it exists
                    session()->forget('cart_token');

                    return redirect()->route('payment.success')
                        ->with('success', 'Payment successful! Your order has been confirmed.')
                        ->with('order', $order);
                } else {
                     // Payment failed
                    $order = Order::where('reference', $reference)->first();
                    if ($order) {
                        $order->update(['status' => 'failed']);
                    }

                noty()
                    ->layout('topCenter')
                    ->info('Payment failed.');
                return redirect()->route('home.failed')
                    ->with('error', 'Payment failed or was cancelled.');
                }
            } else {
                // Payment failed
                $order = Order::where('reference', $reference)->first();
                if ($order) {
                    $order->update(['status' => 'failed']);
                }

                noty()
                    ->layout('topCenter')
                    ->info('Payment failed.');
                return redirect()->route('payment.failed')
                    ->with('error', 'Payment failed or was cancelled.');
            }
        } catch (\Exception $e) {
            \Log::error('Payment callback error: ' . $e->getMessage());
            noty()
            ->layout('topCenter')
            ->info('Payment verification failed.');
            return redirect()->route('cart')
                ->with('error', 'Payment verification failed. Please contact support.');
        }
    }

    // /**
    //  * Payment success page
    //  */
    // public function paymentSuccess()
    // {
    //     return view('home.success');
    // }


    // public function handlePaymentCallback(Request $request)
    // {
    //     $reference = $request->reference;

    //     if (!$reference) {
    //         noty()
    //             ->layout('topCenter')
    //             ->info('Payment Response not found.');

    //         return redirect()->route('cart')
    //             ->with('error', 'Payment reference not found!');
    //     }

    //     try {
    //         // Verify payment
    //         $verification = $this->paystackService->verifyPayment($reference);

    //         if ($verification['status'] && $verification['data']['status'] === 'success') {
    //             // Payment successful
    //             $order = Order::with(['orderItems.product'])->where('reference', $reference)->first();

    //             if ($order) {
    //                 // Update order status
    //                 $order->update([
    //                     'status' => 'paid',
    //                     'payment_reference' => $verification['data']['reference'],
    //                     'gateway_response' => $verification['data']['gateway_response'],
    //                     'updated_at' => now()
    //                 ]);

    //                 // Clear session cart instead of database cart
    //                 session()->forget('cart');

    //                 // Also clear cart token if it exists
    //                 session()->forget('cart_token');

    //                 return redirect()->route('payment.success')
    //                     ->with('success', 'Payment successful! Your order has been confirmed.')
    //                     ->with('order', $order);
    //             } else {
    //                 return redirect()->route('cart')
    //                     ->with('error', 'Order not found!');
    //             }
    //         } else {
    //             // Payment failed
    //             $order = Order::where('reference', $reference)->first();
    //             if ($order) {
    //                 $order->update(['status' => 'failed']);
    //             }

    //             noty()
    //                 ->layout('topCenter')
    //                 ->info('Payment failed.');
    //             return redirect()->route('payment.failed')
    //                 ->with('error', 'Payment failed or was cancelled.');
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Payment callback error: ' . $e->getMessage());
    //         noty()
    //             ->layout('topCenter')
    //             ->info('Payment verification failed.');
    //         return redirect()->route('cart')
    //             ->with('error', 'Payment verification failed. Please contact support.');
    //     }
    // }

    /**
     * Payment success page
     */
    public function paymentSuccess()
    {
        $order = session('order');

        if (!$order) {
            return redirect()->route('cart')->with('error', 'No order found.');
        }

        return view('cart.receipt', compact('order'));
    }

    /**
     * Show receipt for a specific order (optional - for direct access)
     */
    public function showReceipt($reference)
    {
        $order = Order::with(['orderItems.product'])
            ->where('reference', $reference)
            ->where('customer_id', Auth::id()) // Ensure user can only see their own orders
            ->firstOrFail();

        return view('cart.receipt', compact('order'));
    }


     /**
     * Verify payment status (for webhook)
     */
    public function verifyPayment(Request $request)
    {
        $reference = $request->reference;
        
        try {
            $payment = Paystack::getPaymentData();
            
            if ($payment['status']) {
                $order = Order::where('reference', $reference)->first();
                
                if ($order && $payment['data']['status'] === 'success') {
                    $order->update([
                        'status' => 'paid',
                        'payment_reference' => $payment['data']['reference'],
                        'paid_at' => now()
                    ]);
                    
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Payment verified successfully'
                    ]);
                }
            }
            
            return response()->json([
                'status' => 'failed',
                'message' => 'Payment verification failed'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Payment verification error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Payment verification error'
            ], 500);
        }
    }


    /**
     * Payment failed page
     */
    public function paymentFailed()
    {
        return view('home.failed');
    }



}
