<x-front-layout>
     <!-- Page Header -->
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="products.html">Shop</a></li>
                            <li class="breadcrumb-item active">Dark Menthol</li>
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
                            <img src="/placeholder.svg?height=500&width=500" alt="Dark Menthol" class="img-fluid rounded">
                        </div>
                        <div class="thumbnail-images">
                            <div class="row g-2">
                                <div class="col-3">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Thumbnail 1" class="img-fluid rounded thumbnail active">
                                </div>
                                <div class="col-3">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Thumbnail 2" class="img-fluid rounded thumbnail">
                                </div>
                                <div class="col-3">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Thumbnail 3" class="img-fluid rounded thumbnail">
                                </div>
                                <div class="col-3">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Thumbnail 4" class="img-fluid rounded thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-info">
                        <h1 class="product-title">Dark Menthol</h1>
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
                            <span class="current-price">$12.99</span>
                            <span class="original-price">$15.99</span>
                        </div>
                        
                        <div class="product-variants mb-4">
                            <h6>Available Variants:</h6>
                            <div class="variant-options">
                                <button class="btn btn-outline-light me-2 mb-2 active">Single Pack</button>
                                <button class="btn btn-outline-light me-2 mb-2">3-Pack Bundle</button>
                                <button class="btn btn-outline-light me-2 mb-2">5-Pack Bundle</button>
                            </div>
                        </div>

                        <div class="product-description mb-4">
                            <h6>Description:</h6>
                            <p>Experience the refreshing coolness of our Dark Menthol e-cigarette. Crafted with premium ingredients for a smooth, satisfying vaping experience. Perfect for those who enjoy a crisp, minty flavor with every puff.</p>
                        </div>

                        <div class="product-ingredients mb-4">
                            <h6>Ingredients:</h6>
                            <p>Propylene Glycol, Vegetable Glycerin, Natural Menthol Extract, Natural Flavoring</p>
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
                                <button class="btn btn-orange btn-lg me-3">
                                    <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                </button>
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
                                        <span>Free Shipping</span>
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
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="/placeholder.svg?height=200&width=200" alt="Mixed Fruits" class="product-img">
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Mixed Fruits</h5>
                            <span class="product-flavor">Fruity</span>
                            <div class="product-price">$14.99</div>
                            <button class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="/placeholder.svg?height=200&width=200" alt="Blushed Mango" class="product-img">
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Blushed Mango</h5>
                            <span class="product-flavor">Tropical</span>
                            <div class="product-price">$13.99</div>
                            <button class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="/placeholder.svg?height=200&width=200" alt="Vanilla Dream" class="product-img">
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Vanilla Dream</h5>
                            <span class="product-flavor">Dessert</span>
                            <div class="product-price">$16.99</div>
                            <button class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="/placeholder.svg?height=200&width=200" alt="Berry Blast" class="product-img">
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Berry Blast</h5>
                            <span class="product-flavor">Fruity</span>
                            <div class="product-price">$15.99</div>
                            <button class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>