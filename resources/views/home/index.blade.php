<x-front-layout>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">E-cigarettes are significantly less harmful than smoking</h1>
                        <p class="hero-subtitle">The aim is to provide the sensation of inhaling tobacco smoke, without
                            the smoke.</p>
                        <button class="btn btn-orange btn-lg">
                            Shop Collection <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-container">
                        <img src="https://cdn.pixabay.com/photo/2018/05/23/08/48/vape-3423483_1280.jpg"
                            alt="Person vaping" class="hero-image">
                        <div class="product-showcase">
                            <div class="product-circle">
                                <img src="https://cdn.pixabay.com/photo/2021/08/21/07/53/blotto-6562078_1280.jpg"
                                    alt="Vape pack" class="product-image">
                                <div class="product-info">
                                    <span class="product-name">Pack of 3 vape</span>
                                    <span class="product-price">$17</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cannabis-leaf">
            <i class="fas fa-cannabis"></i>
        </div>
    </section>

    <!-- Most Popular Flavours -->
    <section class="popular-flavours py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Most Popular Flavours</h2>
            </div>
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <a href="{{ route('singleProduct', ['product' => $product])}}">
                                <img src="{{ $product->featuredImage ? asset('storage/' . $product->featuredImage)  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                    alt="{{$product->name}}" class="product-img">
                                </a>
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">
                                    <a class="singlePord" href="{{ route('singleProduct', ['product' => $product])}}">
                                        {{$product->name}}
                                    </a>
                                </h5>
                                <span class="product-flavor">
                                    @foreach ($product->tags as $tag)
                                        {{$tag->name.', '}}
                                    @endforeach
                                </span>
                                <div class="product-price">${{$product->regular_price}}</div>
                                <button class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="mb-3">Stay Updated</h3>
                    <p class="mb-4">Get the latest news about new flavors and exclusive offers</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button class="btn btn-orange">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>