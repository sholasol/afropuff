<x-front-layout>
    <style>
        input, select {
            border: 1px solid grey !important;
        }
    </style>
     <!-- Page Header -->
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('cart')}}">Cart</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout Section -->
    <section class="checkout-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="checkout-form" action="{{ route('payment.initialize') }}" method="POST">
                            @csrf
                        <!-- Customer Information -->
                        <div class="checkout-step mb-5">
                            <h4 class="step-title">Customer Information</h4>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName" class="form-label">Full Name *</label>
                                    <input type="text" name="firstname" class="form-control" id="firstName" value="{{$user->name}}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" name="phone" class="form-control" id="phone" value="{{$user->phone}}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="checkout-step mb-5">
                            <h4 class="step-title">Delivery Address</h4>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="address" class="form-label">Street Address *</label>
                                    <input type="text" class="form-control" name="shipping_address" id="address" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City *</label>
                                    <input type="text" class="form-control" name="city" id="city" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state" class="form-label">State *</label>
                                    <select class="form-select" name="state" id="state" required>
                                        <option value="">Select State</option>
                                        <option>ABUJA FCT</option>
                                        <option>ABIA</option>
                                        <option>ADAMAWA</option>
                                        <option>AKWA IBOM</option>
                                        <option>ANAMBRA</option>
                                        <option>BAUCHI</option>
                                        <option>BAYELSA</option>
                                        <option>BENUE</option>
                                        <option>BORNO</option>
                                        <option>CROSS RIVER</option>
                                        <option>DELTA</option>
                                        <option>EBONYI</option>
                                        <option>EDO</option>
                                        <option>EKITI</option>
                                        <option>ENUGU</option>
                                        <option>GOMBE</option>
                                        <option>IMO</option>
                                        <option>JIGAWA</option>
                                        <option>KADUNA</option>
                                        <option>KANO</option>
                                        <option>KATSINA</option>
                                        <option>KEBBI</option>
                                        <option>KOGI</option>
                                        <option>KWARA</option>
                                        <option>LAGOS</option>
                                        <option>NASSARAWA</option>
                                        <option>NIGER</option>
                                        <option>OGUN</option>
                                        <option>ONDO</option>
                                        <option>OSUN</option>
                                        <option>OYO</option>
                                        <option>PLATEAU</option>
                                        <option>RIVERS</option>
                                        <option>SOKOTO</option>
                                        <option>TARABA</option>
                                        <option>YOBE</option>
                                        <option>ZAMFARA</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zipCode" class="form-label">ZIP Code </label>
                                    <input type="text" class="form-control" name="zip" id="zipCode" required>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Information -->
                        {{-- <div class="checkout-step mb-5">
                            <h4 class="step-title">Payment Information</h4>
                            <div class="payment-methods mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" checked>
                                    <label class="form-check-label" for="creditCard">
                                        Credit/Debit Card
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                                    <label class="form-check-label" for="paypal">
                                        PayPal
                                    </label>
                                </div>
                            </div>
                            
                            <div class="credit-card-form">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="cardNumber" class="form-label">Card Number *</label>
                                        <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="expiryDate" class="form-label">Expiry Date *</label>
                                        <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cvv" class="form-label">CVV *</label>
                                        <input type="text" class="form-control" id="cvv" placeholder="123" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="cardName" class="form-label">Name on Card *</label>
                                        <input type="text" class="form-control" id="cardName" required>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Age Verification -->
                        <div class="checkout-step mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ageVerification" required>
                                <label class="form-check-label" for="ageVerification">
                                    I confirm that I am 21 years of age or older *
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsAccept" required>
                                <label class="form-check-label" for="termsAccept">
                                    I agree to the <a href="#terms">Terms of Service</a> and <a href="#privacy">Privacy Policy</a> *
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-orange btn-lg">
                            <i class="fas fa-lock me-2"></i>Place Order
                        </button>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="order-summary">
                        <h4 class="mb-4">Order Summary</h4>
                        
                        <!-- Order Items -->
                        <div class="order-items mb-4">
                            @php
                                $total = 0;
                                $gtotal = 0;
                                $subtotal = 0;
                                $qty = 0;
                                $taxRate = 0.08;
                                $tax = 0.0;
                                $cartItems = session('cart', []);
                            @endphp

                            @if(session('cart'))

                            @foreach (session('cart') as $id => $details)
                            @php
                               $total += $details['price'] * $details['quantity'];
                               $qty += $details['quantity'];

                               $tax = $taxRate * $total;
                               $gtotal = $total + $tax;
                           @endphp
                            <div class="order-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $details['image'] ? asset('storage/' . $details['image'])  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                    alt="{{ $details['name']}}" width="50" height="50" class="me-3 rounded">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $details['name']}}</h6>
                                        <small class="text-muted">Qty: {{ $details['quantity']}}</small>
                                    </div>
                                    <span class="fw-bold">${{ $details['price']}}</span>
                                </div>
                            </div>
                            @endforeach

                            @endif

                        </div>

                        <!-- Order Totals -->
                        <div class="order-totals">
                            {{-- <div class="summary-item">
                                <span>Shipping</span>
                                <span class="text-green">Free</span>
                            </div> --}}
                            <hr>
                            <div class="summary-total">
                                <span class="fw-bold">Subtotal</span>
                                <span class="fw-bold text-orange">${{$total}}</span>
                            </div>
                            <div class="summary-total">
                                <span class="fw-bold">Tax</span>
                                <span class="fw-bold text-orange">${{$tax}}</span>
                            </div>
                           <div class="summary-total">
                               <span class="fw-bold">Total</span>
                               <span class="fw-bold text-orange">${{$gtotal}}</span>
                           </div>
                        </div>

                        <!-- Security Features -->
                        <div class="security-features mt-4">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-shield-alt text-green me-2"></i>
                                <small>SSL Encrypted Checkout</small>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-lock text-green me-2"></i>
                                <small>Secure Payment Processing</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-undo text-green me-2"></i>
                                <small>30-Day Money Back Guarantee</small>
                            </div>
                        </div>

                        <div class="payment-methods mt-3">
                            <small class="text-muted">We accept:</small>
                            <div class="payment-icons mt-2">
                                <i class="fab fa-cc-visa"></i>
                                <i class="fab fa-cc-mastercard"></i>
                                <i class="fab fa-cc-amex"></i>
                                <i class="fab fa-cc-paypal"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>