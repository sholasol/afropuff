<x-front-layout>
    <!-- Page Header -->
    <section class="page-header">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="/">Home</a></li>
                           <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                           <li class="breadcrumb-item active">{{$product->name}}</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
   </section>

   <!-- Product Detail Section -->
   <section class="product-detail-section py-5">
       <div class="container">
           <div class="row">
               <div class="col-lg-6 mb-4">
                   <div class="product-image-gallery">
                       <div class="main-image mb-3">
                           <img src="{{ $product->featuredImage ? asset('storage/' . $product->featuredImage)  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                 alt="{{$product->name}}" class="img-fluid rounded">
                       </div>
                       <div class="thumbnail-images">
                           <div class="row g-2">
                            @foreach ($product->images as $img )
                               <div class="col-3">
                                   <img src="{{ $img ? asset('storage/' . $img->image_path)  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                        alt="{{$product->name}}" class="img-fluid rounded thumbnail active">
                               </div>
                            @endforeach
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-6">
                   <div class="product-info">
                       <h1 class="product-title">{{$product->name}}</h1>
                       <div class="product-rating mb-3">
                           <div class="stars">
                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>
                           </div>
                           <span class="ms-2">(24 reviews)</span>
                       </div>
                       <div class="product-price mb-4">
                           <span class="current-price">${{$product->regular_price}}</span>
                       </div>
                       
                       <div class="product-variants mb-4">
                            @if ($product->variants)
                            <h6>Available Variants:</h6>
                            <div class="variant-options">
                                @foreach ($product->variants as $var)
                                    <button class="btn btn-outline-light me-2 mb-2 active">{{$var->name}}</button>
                                @endforeach
                            </div>
                           @endif
                       </div>

                       <div class="product-description mb-4">
                           <h6>Description:</h6>
                           <p>
                             {{$product->description}}
                           </p>
                       </div>

                       <div class="product-ingredients mb-4">
                           @if ($product->tags)
                           <h6>Tags:</h6>
                           <p>
                                @foreach ($product->tags as $tag)
                                   {{$tag->name.', '}} 
                                @endforeach
                           </p>
                           @endif
                       </div>

                       <div class="product-actions">
                           <div class="quantity-selector mb-3">
                               <label for="quantity" class="form-label">Quantity:</label>
                               <div class="input-group w-auto">
                                   <button class="btn btn-outline-light" type="button" onclick="decreaseQuantity()">-</button>
                                   <input type="number" class="form-control text-center" id="quantity" value="1" min="1">
                                   <button class="btn btn-outline-light" type="button" onclick="increaseQuantity()">+</button>
                               </div>
                           </div>
                           <div class="action-buttons">
                               <a href="{{ route('storeCart', $product->id)}}" class="btn btn-orange btn-lg me-3">
                                   <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                               </a>
                               <button class="btn btn-outline-light btn-lg">
                                   <i class="far fa-heart me-2"></i>Add to Wishlist
                               </button>
                           </div>
                       </div>

                       <div class="product-features mt-4">
                           <div class="row">
                               <div class="col-6">
                                   <div class="feature-item">
                                       <i class="fas fa-shipping-fast text-orange"></i>
                                       <span>
                                            {{$product->shipping_class}}
                                       </span>
                                   </div>
                               </div>
                               <div class="col-6">
                                   <div class="feature-item">
                                       <i class="fas fa-undo text-orange"></i>
                                       <span>30-Day Returns</span>
                                   </div>
                               </div>
                               <div class="col-6">
                                   <div class="feature-item">
                                       <i class="fas fa-shield-alt text-orange"></i>
                                       <span>Quality Guaranteed</span>
                                   </div>
                               </div>
                               <div class="col-6">
                                   <div class="feature-item">
                                       <i class="fas fa-headset text-orange"></i>
                                       <span>24/7 Support</span>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!-- Recommended Products -->
   <section class="recommended-products py-5">
       <div class="container">
           <h3 class="section-title text-center mb-5">Recommended Products</h3>
           <div class="row g-4">
                @foreach ($prods as $prod)
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <a href="{{ route('singleProduct', ['product' => $prod])}}">
                            <img src="{{ $prod->featuredImage ? asset('storage/' . $prod->featuredImage)  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                 alt="{{$prod->name}}" class="product-img">
                            </a>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">
                                <a href="{{ route('singleProduct', ['product' => $prod])}}" class="singlePord">
                                {{$prod->name}}
                                </a>
                            </h5>
                            <div class="product-price">${{$prod->regular_price}}</div>
                            <a href="{{ route('storeCart', $prod->id)}}" class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</a>
                        </div>
                    </div>
                </div>
               @endforeach
           </div>
       </div>
   </section>
</x-front-layout>