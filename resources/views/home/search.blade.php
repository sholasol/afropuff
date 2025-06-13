<x-front-layout>
     <!-- Search Header -->
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">Search Products</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section py-5">
        <div class="container">
            <!-- Search Form -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <form class="search-form">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Search for products..." id="searchInput" autofocus>
                            <button class="btn btn-orange btn-lg" type="submit">
                                <i class="fas fa-search me-2"></i>Search
                            </button>
                        </div>
                        <div class="search-options mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-select" id="categoryFilter">
                                        <option value="">All Categories</option>
                                        <option value="menthol">Menthol</option>
                                        <option value="fruity">Fruity</option>
                                        <option value="tropical">Tropical</option>
                                        <option value="dessert">Dessert</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="sortOrder">
                                        <option value="relevance">Sort by Relevance</option>
                                        <option value="price-low">Price: Low to High</option>
                                        <option value="price-high">Price: High to Low</option>
                                        <option value="newest">Newest First</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Search Results -->
            <div class="search-results">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Search Results <span id="resultCount">(12 products)</span></h4>
                    <div class="view-options">
                        <button class="btn btn-outline-light btn-sm me-2 active" id="gridView">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="btn btn-outline-light btn-sm" id="listView">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>

                <!-- Grid View (Default) -->
                <div class="row g-4" id="gridViewResults">
                    <!-- Product 1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Dark Menthol" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Menthol</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Dark Menthol</h5>
                                <div class="product-price">$12.99</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Mixed Fruits" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Fruity</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Mixed Fruits</h5>
                                <div class="product-price">$14.99</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Blushed Mango" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Tropical</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Blushed Mango</h5>
                                <div class="product-price">$13.99</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Vanilla Dream" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Dessert</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Vanilla Dream</h5>
                                <div class="product-price">$16.99</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Berry Blast" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Fruity</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Berry Blast</h5>
                                <div class="product-price">$15.99</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Cool Mint" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Menthol</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Cool Mint</h5>
                                <div class="product-price">$11.99</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 7 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Strawberry Cream" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Dessert</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Strawberry Cream</h5>
                                <div class="product-price">$14.49</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 8 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="/placeholder.svg?height=200&width=200" alt="Watermelon Ice" class="product-img">
                                <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                <span class="product-tag">Fruity</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">Watermelon Ice</h5>
                                <div class="product-price">$13.49</div>
                                <div class="product-actions">
                                    <button class="btn btn-orange btn-sm">Add to Cart</button>
                                    <button class="btn btn-outline-light btn-sm">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- List View (Hidden by default) -->
                <div class="list-view-results d-none" id="listViewResults">
                    <!-- Product 1 -->
                    <div class="list-product-card">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="/placeholder.svg?height=150&width=150" alt="Dark Menthol" class="img-fluid rounded">
                            </div>
                            <div class="col-md-7">
                                <h5 class="product-name">Dark Menthol</h5>
                                <span class="product-tag-list">Menthol</span>
                                <p class="product-description">Experience the refreshing coolness of our Dark Menthol e-cigarette. Crafted with premium ingredients for a smooth, satisfying vaping experience.</p>
                                <div class="product-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <span class="ms-2">(24 reviews)</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="product-price mb-3">$12.99</div>
                                <button class="btn btn-orange btn-sm mb-2 w-100">Add to Cart</button>
                                <button class="btn btn-outline-light btn-sm w-100">
                                    <i class="far fa-heart me-2"></i>Add to Wishlist
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="list-product-card">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="/placeholder.svg?height=150&width=150" alt="Mixed Fruits" class="img-fluid rounded">
                            </div>
                            <div class="col-md-7">
                                <h5 class="product-name">Mixed Fruits</h5>
                                <span class="product-tag-list">Fruity</span>
                                <p class="product-description">A delightful blend of various fruits creating a sweet and tangy flavor profile. Perfect for those who enjoy fruity vapes.</p>
                                <div class="product-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <span class="ms-2">(18 reviews)</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="product-price mb-3">$14.99</div>
                                <button class="btn btn-orange btn-sm mb-2 w-100">Add to Cart</button>
                                <button class="btn btn-outline-light btn-sm w-100">
                                    <i class="far fa-heart me-2"></i>Add to Wishlist
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="list-product-card">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="/placeholder.svg?height=150&width=150" alt="Blushed Mango" class="img-fluid rounded">
                            </div>
                            <div class="col-md-7">
                                <h5 class="product-name">Blushed Mango</h5>
                                <span class="product-tag-list">Tropical</span>
                                <p class="product-description">Sweet, juicy mango flavor with a hint of tropical paradise. A refreshing vape for mango lovers.</p>
                                <div class="product-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                    <span class="ms-2">(21 reviews)</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="product-price mb-3">$13.99</div>
                                <button class="btn btn-orange btn-sm mb-2 w-100">Add to Cart</button>
                                <button class="btn btn-outline-light btn-sm w-100">
                                    <i class="far fa-heart me-2"></i>Add to Wishlist
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="list-product-card">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="/placeholder.svg?height=150&width=150" alt="Vanilla Dream" class="img-fluid rounded">
                            </div>
                            <div class="col-md-7">
                                <h5 class="product-name">Vanilla Dream</h5>
                                <span class="product-tag-list">Dessert</span>
                                <p class="product-description">Rich, creamy vanilla flavor reminiscent of premium vanilla ice cream. A smooth and satisfying dessert vape.</p>
                                <div class="product-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <span class="ms-2">(16 reviews)</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="product-price mb-3">$16.99</div>
                                <button class="btn btn-orange btn-sm mb-2 w-100">Add to Cart</button>
                                <button class="btn btn-outline-light btn-sm w-100">
                                    <i class="far fa-heart me-2"></i>Add to Wishlist
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- No Results (Hidden by default) -->
            <div class="no-results text-center py-5 d-none">
                <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                <h4>No products found</h4>
                <p class="text-muted">Try adjusting your search or filter to find what you're looking for.</p>
                <button class="btn btn-orange mt-3" onclick="resetSearch()">Reset Search</button>
            </div>
        </div>
    </section>

    <!-- Popular Searches -->
    <section class="popular-searches py-5 bg-dark">
        <div class="container">
            <h3 class="section-title text-center mb-4">Popular Searches</h3>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="popular-search-tags text-center">
                        <a href="#" class="search-tag">Menthol</a>
                        <a href="#" class="search-tag">Fruity</a>
                        <a href="#" class="search-tag">Tropical</a>
                        <a href="#" class="search-tag">Dessert</a>
                        <a href="#" class="search-tag">Mango</a>
                        <a href="#" class="search-tag">Vanilla</a>
                        <a href="#" class="search-tag">Berry</a>
                        <a href="#" class="search-tag">Mint</a>
                        <a href="#" class="search-tag">Watermelon</a>
                        <a href="#" class="search-tag">Strawberry</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>