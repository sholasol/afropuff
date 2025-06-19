<x-front-layout>
    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endsection

    <!-- Page Header -->
    <section class="page-header">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <h1 class="page-title">Shopping Cart</h1>
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                       <h4 class="mb-4">Cart Items ({{ count((array) session('cart', [])) }})</h4>
                       
                       @php
                           $subtotal = 0;
                           $taxRate = 0.08;
                           $cartItems = session('cart', []);
                       @endphp
                       
                       @if(!empty($cartItems))
                        @foreach ($cartItems as $id => $details)
                            @php
                                $price = is_numeric($details['price']) ? (float)$details['price'] : 0;
                                $quantity = (int)($details['quantity'] ?? 0);
                                $itemTotal = $price * $quantity;
                                $subtotal += $itemTotal;
                            @endphp
                           <div data-id="{{$id}}" class="cart-item mb-3" id="cart-item-{{$id}}">
                               <div class="row align-items-center">
                                   <div class="col-md-2">
                                        
                                       <img src="{{ $details['image'] ? asset('storage/' . $details['image'])  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                         alt="{{ $details['name']}}" class="img-fluid rounded">
                                   </div>
                                   <div class="col-md-4">
                                       <h6 class="mb-1">{{ $details['name'] }}</h6>
                                       <p class="text-muted mb-0">Menthol Flavor</p>
                                   </div>
                                   <div class="col-md-2">
                                       <div class="quantity-controls">
                                           <button data-id="{{ $id }}" class="btn btn-sm btn-outline-light decrease-quantity">-</button>
                                           <span class="quantity mx-2">{{$quantity}}</span>
                                           <button data-id="{{ $id }}" class="btn btn-sm btn-outline-light increase-quantity">+</button>
                                       </div>
                                   </div>
                                   <div class="col-md-2">
                                       <span class="item-price">$ {{ $details['price']}} || {{ number_format($price, 2) }}</span>
                                   </div>
                                   <div class="col-md-2">
                                       <span class="item-total fw-bold">${{ number_format($itemTotal, 2) }}</span>
                                       <button data-id="{{ $id }}" class="btn btn-sm text-danger ms-2 remove-item">
                                           <i class="fas fa-trash"></i>
                                       </button>
                                   </div>
                               </div>
                           </div>
                       @endforeach
                       @else
                           <div class="alert alert-info">Your cart is empty</div>
                       @endif

                       <div class="cart-actions mt-4">
                           <a href="{{route('shop')}}" class="btn btn-outline-light">Continue Shopping</a>
                           <button class="btn btn-outline-danger ms-2 clear-cart">Clear Cart</button>
                       </div>
                   </div>
               </div>

               <div class="col-lg-4">
                   <div class="order-summary">
                       <h4 class="mb-4">Order Summary</h4>
                       <div class="summary-item">
                           <span>Subtotal ({{ count($cartItems) }} items)</span>
                           <span>${{ number_format($subtotal, 2) }}</span>
                       </div>
                       <div class="summary-item">
                           <span>Shipping</span>
                           <span class="text-green">Free</span>
                       </div>
                       <div class="summary-item">
                           <span>Tax</span>
                           <span>${{ number_format($subtotal * $taxRate, 2) }}</span>
                       </div>
                       <hr>
                       <div class="summary-total">
                           <span class="fw-bold">Total</span>
                           <span class="fw-bold text-orange">${{ number_format($subtotal * (1 + $taxRate), 2) }}</span>
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
    $(document).ready(function() {
        // Increase quantity
        $(document).on('click', '.increase-quantity', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            updateQuantity(id, 1);
        });

        // Decrease quantity
        $(document).on('click', '.decrease-quantity', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            updateQuantity(id, -1);
        });

        // Remove item
        $(document).on('click', '.remove-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            removeItem(id);
        });

        // Clear cart
        $('.clear-cart').click(function(e) {
            e.preventDefault();
            clearCart();
        });

        function updateQuantity(id, change) {
            $.ajax({
                url: '{{ route("cart.update") }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: change
                },
                success: function(response) {
                    if(response.success) {
                        window.location.reload();
                    } else {
                        alert(response.message || 'Error updating quantity');
                    }
                },
                error: function(xhr) {
                    console.log('Error:', xhr);
                    alert('Error: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            });
        }

        function removeItem(id) {
            if(confirm('Are you sure you want to remove this item?')) {
                $.ajax({
                    url: '{{ route("cart.remove") }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        if(response.success) {
                            $('#cart-item-' + id).remove();
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        alert('Error: ' + (xhr.responseJSON?.message || 'Unknown error'));
                    }
                });
            }
        }

        function clearCart() {
            if(confirm('Are you sure you want to clear your cart?')) {
                $.ajax({
                    url: '{{ route("cart.clear") }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success) {
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        alert('Error: ' + (xhr.responseJSON?.message || 'Unknown error'));
                    }
                });
            }
        }
    });
</script>
</x-front-layout>