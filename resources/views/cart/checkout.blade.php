<x-front-layout>
     <!-- Page Header -->
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="cart.html">Cart</a></li>
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
                    <form class="checkout-form">
                        <!-- Customer Information -->
                        <div class="checkout-step mb-5">
                            <h4 class="step-title">Customer Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="checkout-step mb-5">
                            <h4 class="step-title">Delivery Address</h4>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="address" class="form-label">Street Address *</label>
                                    <input type="text" class="form-control" id="address" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City *</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state" class="form-label">State *</label>
                                    <select class="form-select" id="state" required>
                                        <option value="">Select State</option>
                                        <option value="CA">California</option>
                                        <option value="NY">New York</option>
                                        <option value="TX">Texas</option>
                                        <option value="FL">Florida</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zipCode" class="form-label">ZIP Code *</label>
                                    <input type="text" class="form-control" id="zipCode" required>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Information -->
                        <div class="checkout-step mb-5">
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
                        </div>

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
                            <div class="summary-item">
                                <span>Subtotal</span>
                                <span>${{$total}}</span>
                            </div>
                            <div class="summary-item">
                                <span>Shipping</span>
                                <span class="text-green">Free</span>
                            </div>
                            <div class="summary-item">
                                <span>Tax</span>
                                <span>${{$tax}}</span>
                            </div>
                            <hr>
                            <div class="summary-total">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold text-orange">$ {{$gtotal}}</span>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>