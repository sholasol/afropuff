<x-front-layout>
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
                       <h4 class="mb-4">Cart Items ({{ count((array) session('cart')) }})</h4>
                       @php
                           $total = 0;
                           $gtotal = 0;
                           $taxRate = 0.08;
                           $subtotal = 0;
                           $qty = 0;
                           $taxRate = 0.08;
                           $tax=0;
                           $cartItems = session('cart', []);
                       @endphp

                       @if(session('cart'))
                       
                       <!-- Cart Item 1 -->
                       @foreach (session('cart') as $id => $details)
                           @php
                               $total += $details['price'] * $details['quantity'];
                               $qty += $details['quantity'];

                               $tax = $taxRate * $total;
                               $gtotal = $total + $tax;
                           @endphp
                           <div data-id="{{$id}}" class="cart-item">
                               <div class="row align-items-center">
                                   <div class="col-md-2">
                                       <img src="{{ $details['image'] ? asset('storage/' . $details['image'])  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                         alt="{{ $details['name']}}" class="img-fluid rounded">
                                   </div>
                                   <div class="col-md-3">
                                       <h6 class="mb-1">{{ $details['name'] }}</h6>
                                       <p class="text-muted mb-0">Menthol Flavor</p>
                                   </div>
                                   <div class="col-md-2">
                                    <input style="padding: 5px;"  id="form1" min="0" name="quantity" value="{{ $details['quantity'] }}" 
                                        type="number" class="form-control form-control-sm update-quantity" 
                                        data-id="{{ $id }}" />
                                   </div>
                                   <div class="col-md-2">
                                       <span class="item-price">${{$details['price']}}</span>
                                   </div>
                                   <div class="col-md-3">
                                       <span class="item-total fw-bold">${{$details['price'] * $details['quantity'] }}</span>
                                       <a href="{{ route('deleteItem', ['id' => $id]) }}" class="btn btn-sm text-danger ms-2" onclick="return confirm('Delete this item?')">
                                           <i class="fas fa-trash"></i>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       @endforeach
                       @endif

                       <div class="cart-actions mt-4">
                           <a href="{{route('shop')}}" class="btn btn-outline-light">Continue Shopping</a>
                           <a href="{{ route('clearCart') }}" class="btn btn-outline-danger text-white ms-2">Clear Cart</a>
                       </div>
                   </div>
               </div>

               <div class="col-lg-4">
                   <div class="order-summary">
                       <h4 class="mb-4">Order Summary</h4>
                       <div class="summary-total">
                            <span>Items</span>
                            <span class="text-orange">{{ count((array) session('cart')) }}</span>
                        </div>
                        <div class="summary-total">
                            <span>Quantity</span>
                            <span class="text-orange">{{ $qty}} </span>
                        </div>
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
                       
                       <div class="promo-code mt-4">
                           <div class="input-group">
                               <input type="text" class="form-control" placeholder="Promo code">
                               <button class="btn btn-outline-light">Apply</button>
                           </div>
                       </div>

                       @if(session('cart'))
                        <a href="{{route('checkout')}}" class="btn btn-orange btn-lg w-100 mt-4">
                            Proceed to Checkout
                        </a>
                        @else
                        <a href="{{route('shop')}}" class="btn btn-orange btn-lg w-100 mt-4">
                            Add An Item
                        </a>
                       @endif

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

  

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


   <script>
       $(document).ready(function () {
           $('.update-quantity').on('change', function(e) {
               e.preventDefault();
               var id = $(this).data('id');
               var quantity = $(this).val();
               var url = "{{ route('updateCartQuantity', ':id') }}".replace(':id', id);
   
               $.ajax({
                   url: url,
                   type: 'POST',
                   data: {
                       _token: $('meta[name="csrf-token"]').attr('content'),
                       quantity: quantity
                   },
                   success: function(response) {
                       if (response.success) {
                           alert(response.message);
                           location.reload();
                       } else {
                           alert(response.message);
                       }
                   },
                   error: function(xhr) {
                       console.log(xhr.responseText);
                       alert('Failed to update quantity.');
                   }
               });
           });
       });
   </script>
</x-front-layout>