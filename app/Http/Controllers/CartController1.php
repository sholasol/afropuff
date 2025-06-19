<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     */
    public function storeCart($id)
    {
        $product = Product::findOrFail($id);

        if(auth()->check()){
            $cart_id = auth()->user()->customer_id;
        }else{
            $cart_id = session()->get('cart_token', Str::random(32));
            session()->get('cart_token', $cart_id);
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->name,
                "image" => $product->featuredImage
            ];
        }

        //store cart in session
        session()->put('cart', $cart);

        noty()->info('Item added successfully.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function updateCartQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            return response()->json(['success' => true, 'message'=>'Quantity updated']);
        }

        return response()->json(['success' => false, 'message' => 'Item not found in cart.']);
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

            return response()->json(['success' => true, 'message' => 'Item removed from cart.']);
        }

        return response()->json(['success' => false, 'message' => 'Item not found in cart.']);
    }

    /**
     * Update the specified resource in storage.
     */
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

                if($checkUser){
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
                'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
