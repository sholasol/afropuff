<x-front-layout>
     <!-- Page Header -->
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">Shopping Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="cart-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-items">
                        <h4 class="mb-4">Cart Items (3)</h4>
                        
                        <!-- Cart Item 1 -->
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="/placeholder.svg?height=80&width=80" alt="Dark Menthol" class="img-fluid rounded">
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1">Dark Menthol</h6>
                                    <p class="text-muted mb-0">Menthol Flavor</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="quantity-controls">
                                        <button class="btn btn-sm btn-outline-light" onclick="updateQuantity(1, -1)">-</button>
                                        <span class="quantity mx-2">2</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="updateQuantity(1, 1)">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="item-price">$12.99</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="item-total fw-bold">$25.98</span>
                                    <button class="btn btn-sm text-danger ms-2" onclick="removeItem(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Item 2 -->
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="/placeholder.svg?height=80&width=80" alt="Mixed Fruits" class="img-fluid rounded">
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1">Mixed Fruits</h6>
                                    <p class="text-muted mb-0">Fruity Flavor</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="quantity-controls">
                                        <button class="btn btn-sm btn-outline-light" onclick="updateQuantity(2, -1)">-</button>
                                        <span class="quantity mx-2">1</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="updateQuantity(2, 1)">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="item-price">$14.99</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="item-total fw-bold">$14.99</span>
                                    <button class="btn btn-sm text-danger ms-2" onclick="removeItem(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Item 3 -->
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="/placeholder.svg?height=80&width=80" alt="Blushed Mango" class="img-fluid rounded">
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1">Blushed Mango</h6>
                                    <p class="text-muted mb-0">Tropical Flavor</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="quantity-controls">
                                        <button class="btn btn-sm btn-outline-light" onclick="updateQuantity(3, -1)">-</button>
                                        <span class="quantity mx-2">1</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="updateQuantity(3, 1)">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="item-price">$13.99</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="item-total fw-bold">$13.99</span>
                                    <button class="btn btn-sm text-danger ms-2" onclick="removeItem(3)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="cart-actions mt-4">
                            <a href="{{route('shop')}}" class="btn btn-outline-light">Continue Shopping</a>
                            <button class="btn btn-outline-danger ms-2">Clear Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-summary">
                        <h4 class="mb-4">Order Summary</h4>
                        <div class="summary-item">
                            <span>Subtotal (4 items)</span>
                            <span>$54.96</span>
                        </div>
                        <div class="summary-item">
                            <span>Shipping</span>
                            <span class="text-green">Free</span>
                        </div>
                        <div class="summary-item">
                            <span>Tax</span>
                            <span>$4.40</span>
                        </div>
                        <hr>
                        <div class="summary-total">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold text-orange">$59.36</span>
                        </div>
                        
                        <div class="promo-code mt-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <button class="btn btn-outline-light">Apply</button>
                            </div>
                        </div>

                        <a href="{{route('checkout')}}" class="btn btn-orange btn-lg w-100 mt-4">
                            Proceed to Checkout
                        </a>

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

    <script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </script>
</x-front-layout>