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
        return view('cart.checkout');
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
            noty()->info('Item added successfully.');
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

            noty()->info('Item removed successfully.');
            return redirect()->back();
        }

        noty()->danger('Item not found in the cart.');
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

        noty()->info('Cart cleared successfully.');
        return redirect()->back();
    }


    public function redirectToGateway(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'], // Added email validation
            'phone' => ['required', 'string'],
        ]);

        $cart = session()->get('cart', []);
        $total = 0;

        // Calculate total price from cart
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        // Ensure cart is not empty
        if ($total <= 0) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        DB::beginTransaction();
        try {
            // Generate user or retrieve authenticated user's email and customer_id
            if ($validated['email']) {
                $password = $validated['phone'];
                $email = $validated['email'];

                $random = Str::random(4);
                $ranCode = "USR-" . $random;

                $checkUser = User::where('email', $email)->first();

                if ($checkUser) {
                    $customer_id = $checkUser->id;
                } else {
                    $user = User::create([
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'phone' => $validated['phone'],
                        'customer_id' => $ranCode,
                        'password' => Hash::make($password),
                    ]);
                    $customer_id = $user->id;
                }
            } else {
                $email = auth()->user()->email;
                $customer_id = auth()->user()->customer_id;
            }

            session()->put('customer_id', $customer_id);
            session()->put('ranCode', $ranCode ?? null); // Handle case where $ranCode might not be set

            // Generate or retrieve cart_id
            if (!session()->has('cart_id')) {
                $cart_id = Str::uuid();  // Generate a unique cart ID
                session()->put('cart_id', $cart_id);  // Store cart_id in session
            } else {
                $cart_id = session()->get('cart_id');  // Retrieve cart_id from session
            }

            // Payment details
            $amount = $total;
            $ref = strtoupper(Str::random(7));  // Generate payment reference

            // Initialize Stripe Payment
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk')); //$stripe = new StripeClient(config('stripe.stripe_sk')); 

            $response = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'], // Specify payment methods
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => ['name' => 'Order for Food'], // Corrected typo from 'Oder' to 'Order'
                            'unit_amount' => $amount * 100, // Amount in cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
            ]);

            // Corrected response check: Stripe Checkout Session does not have a 'status' field
            if ($response && $response->url) { // Check for the existence of the URL
                DB::commit();
                return redirect($response->url);
            } else {
                throw new \Exception('Unable to initiate payment. Please try again.');
                // Removed the unreachable return statement after throw
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Oops! Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Initialize Paystack payment
     */
    public function initializePayment(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'shipping_address' => 'required|string',
            'phone' => 'required|string'
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
                'user_id' => Auth::check() ? Auth::id() : null,
                'reference' => $reference,
                'amount' => $totalAmount,
                'email' => $request->email,
                'shipping_address' => $request->shipping_address,
                'phone' => $request->phone,
                'status' => 'pending'
            ]);

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
                return redirect()->route('cart')
                    ->with('error', $payment['message']);
            }
        } catch (\Exception $e) {
            Log::error('Payment initialization failed: ' . $e->getMessage());
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
                        'paid_at' => now()
                    ]);

                    // Clear session cart instead of database cart
                    session()->forget('cart');

                    // Also clear cart token if it exists
                    session()->forget('cart_token');

                    return redirect()->route('payment.success')
                        ->with('success', 'Payment successful! Your order has been confirmed.')
                        ->with('order', $order);
                } else {
                    return redirect()->route('cart.index')
                        ->with('error', 'Order not found!');
                }
            } else {
                // Payment failed
                $order = Order::where('reference', $reference)->first();
                if ($order) {
                    $order->update(['status' => 'failed']);
                }

                return redirect()->route('payment.failed')
                    ->with('error', 'Payment failed or was cancelled.');
            }
        } catch (\Exception $e) {
            \Log::error('Payment callback error: ' . $e->getMessage());
            return redirect()->route('cart.index')
                ->with('error', 'Payment verification failed. Please contact support.');
        }
    }

    /**
     * Payment success page
     */
    public function paymentSuccess()
    {
        return view('payment.success');
    }

    /**
     * Payment failed page
     */
    public function paymentFailed()
    {
        return view('payment.failed');
    }
}
