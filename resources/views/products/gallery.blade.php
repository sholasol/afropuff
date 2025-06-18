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
                    <!-- Swiper Gallery -->
                    <div class="product-gallery">
                        <div class="swiper-container gallery-main">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=600&width=600" alt="Dark Menthol - Main" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=600&width=600" alt="Dark Menthol - Side" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=600&width=600" alt="Dark Menthol - Package" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=600&width=600" alt="Dark Menthol - In Use" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=600&width=600" alt="Dark Menthol - Close Up" class="img-fluid rounded">
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs mt-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Thumbnail 1" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Thumbnail 2" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Thumbnail 3" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Thumbnail 4" class="img-fluid rounded">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Thumbnail 5" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-info">
                        <div class="d-flex justify-content-between align-items-start">
                            <h1 class="product-title">{{$product->name}}</h1>
                            <span class="badge bg-success">In Stock</span>
                        </div>
                        
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
                            <span class="discount-badge">-19%</span>
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
                            <p>Our Dark Menthol flavor delivers an intense cooling sensation with a balanced sweetness that makes it perfect for all-day vaping. The premium quality ensures consistent flavor from the first puff to the last.</p>
                        </div>

                        <div class="product-specs mb-4">
                            <h6>Specifications:</h6>
                            <ul class="specs-list">
                                <li><strong>Nicotine Strength:</strong> 3mg, 6mg, 12mg</li>
                                <li><strong>PG/VG Ratio:</strong> 30/70</li>
                                <li><strong>Volume:</strong> 60ml</li>
                                <li><strong>Made in:</strong> USA</li>
                            </ul>
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
                                <button class="btn btn-green btn-lg">
                                    <i class="fas fa-bolt me-2"></i>Buy Now
                                </button>
                                <button class="btn btn-outline-light btn-lg ms-3">
                                    <i class="far fa-heart"></i>
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
                        
                        <div class="share-product mt-4">
                            <h6>Share:</h6>
                            <div class="social-share">
                                <a href="#" class="me-2"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="me-2"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product Tabs -->
            <div class="row mt-5">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients" aria-selected="false">Ingredients</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews (24)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false">FAQ</button>
                        </li>
                    </ul>
                    <div class="tab-content p-4 border border-top-0 rounded-bottom" id="productTabsContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <h5>Product Details</h5>
                            <p>Our Dark Menthol vape juice offers a premium vaping experience with its intense cooling sensation and subtle sweetness. The carefully balanced formula provides a smooth throat hit and satisfying cloud production.</p>
                            <p>Each bottle is crafted in our state-of-the-art facility using only the highest quality ingredients. The 60ml bottle comes with a child-resistant cap and precise dropper for easy filling.</p>
                            <h6>Features:</h6>
                            <ul>
                                <li>Premium menthol flavor with a dark twist</li>
                                <li>Smooth throat hit</li>
                                <li>Excellent cloud production</li>
                                <li>Available in multiple nicotine strengths</li>
                                <li>Made in the USA</li>
                                <li>Rigorously tested for quality and consistency</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
                            <h5>Ingredients</h5>
                            <p>Our Dark Menthol e-liquid contains the following ingredients:</p>
                            <ul>
                                <li>Propylene Glycol (PG)</li>
                                <li>Vegetable Glycerin (VG)</li>
                                <li>Natural and Artificial Flavors</li>
                                <li>Nicotine (in specified strengths)</li>
                            </ul>
                            <p><strong>Note:</strong> All ingredients are food-grade and sourced from reputable suppliers. Our products are manufactured in a clean, controlled environment.</p>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5>Customer Reviews</h5>
                                <button class="btn btn-orange">Write a Review</button>
                            </div>
                            
                            <!-- Review Item -->
                            <div class="review-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="stars me-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <h6 class="mb-0">Best menthol flavor ever!</h6>
                                </div>
                                <p class="review-meta">By John D. on January 15, 2024</p>
                                <p>This is hands down the best menthol flavor I've tried. The cooling effect is perfect - not too strong but definitely noticeable. Will definitely buy again!</p>
                            </div>
                            
                            <!-- Review Item -->
                            <div class="review-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="stars me-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="far fa-star text-warning"></i>
                                    </div>
                                    <h6 class="mb-0">Great flavor, fast shipping</h6>
                                </div>
                                <p class="review-meta">By Sarah M. on January 10, 2024</p>
                                <p>I really enjoy this flavor. It's refreshing and not too overpowering. The shipping was super fast too. Only giving 4 stars because I wish it came in a larger bottle size.</p>
                            </div>
                            
                            <!-- Review Item -->
                            <div class="review-item">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="stars me-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <h6 class="mb-0">My new all-day vape</h6>
                                </div>
                                <p class="review-meta">By Mike T. on January 5, 2024</p>
                                <p>This has become my new all-day vape. The flavor is consistent and the cooling effect is just right. Highly recommend to menthol lovers!</p>
                            </div>
                            
                            <div class="text-center mt-4">
                                <button class="btn btn-outline-light">Load More Reviews</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <h5>Frequently Asked Questions</h5>
                            
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            How long does a bottle last?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            A 60ml bottle typically lasts 2-3 weeks for an average vaper. This can vary depending on your vaping habits and device settings.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What devices is this e-liquid compatible with?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Our Dark Menthol e-liquid is compatible with all standard vaping devices including pod systems, tanks, and RDAs. The 30/70 PG/VG ratio makes it versatile for most devices.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How should I store this e-liquid?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Store your e-liquid in a cool, dark place away from direct sunlight. Keep the cap tightly closed when not in use. Proper storage will maintain flavor quality for up to 2 years.
                                        </div>
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
            <h3 class="section-title text-center mb-5">You May Also Like</h3>
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

    <!-- Recently Viewed -->
    <section class="recently-viewed py-5 bg-dark">
        <div class="container">
            <h3 class="section-title text-center mb-5">Recently Viewed</h3>
            <div class="row g-4">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="product-card-sm">
                        <img src="/placeholder.svg?height=120&width=120" alt="Cool Mint" class="product-img-sm">
                        <h6 class="product-name-sm">Cool Mint</h6>
                        <div class="product-price-sm">$11.99</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="product-card-sm">
                        <img src="/placeholder.svg?height=120&width=120" alt="Berry Blast" class="product-img-sm">
                        <h6 class="product-name-sm">Berry Blast</h6>
                        <div class="product-price-sm">$15.99</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="product-card-sm">
                        <img src="/placeholder.svg?height=120&width=120" alt="Vanilla Dream" class="product-img-sm">
                        <h6 class="product-name-sm">Vanilla Dream</h6>
                        <div class="product-price-sm">$16.99</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="product-card-sm">
                        <img src="/placeholder.svg?height=120&width=120" alt="Blushed Mango" class="product-img-sm">
                        <h6 class="product-name-sm">Blushed Mango</h6>
                        <div class="product-price-sm">$13.99</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="product-card-sm">
                        <img src="/placeholder.svg?height=120&width=120" alt="Mixed Fruits" class="product-img-sm">
                        <h6 class="product-name-sm">Mixed Fruits</h6>
                        <div class="product-price-sm">$14.99</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="product-card-sm">
                        <img src="/placeholder.svg?height=120&width=120" alt="Dark Menthol" class="product-img-sm">
                        <h6 class="product-name-sm">Dark Menthol</h6>
                        <div class="product-price-sm">$12.99</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-front-layout>