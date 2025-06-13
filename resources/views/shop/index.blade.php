<x-front-layout>
     <!-- Page Header -->
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">Shop Collection</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section py-5">
        <div class="container">
            <div class="row">
                <!-- Filters Sidebar -->
                <div class="col-lg-3 mb-4">
                    <div class="filters-sidebar">
                        <h5 class="mb-3">Filters</h5>
                        
                        <!-- Brand Filter -->
                        <div class="filter-group mb-4">
                            <h6 class="filter-title">Brand</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="brand1">
                                <label class="form-check-label" for="brand1">VapeXperience</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="brand2">
                                <label class="form-check-label" for="brand2">CloudMaster</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="brand3">
                                <label class="form-check-label" for="brand3">FlavorPro</label>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-group mb-4">
                            <h6 class="filter-title">Price Range</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price1">
                                <label class="form-check-label" for="price1">$0 - $15</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price2">
                                <label class="form-check-label" for="price2">$15 - $30</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price3">
                                <label class="form-check-label" for="price3">$30+</label>
                            </div>
                        </div>

                        <!-- Flavors -->
                        <div class="filter-group mb-4">
                            <h6 class="filter-title">Flavors</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flavor1">
                                <label class="form-check-label" for="flavor1">Menthol</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flavor2">
                                <label class="form-check-label" for="flavor2">Fruity</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flavor3">
                                <label class="form-check-label" for="flavor3">Tropical</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flavor4">
                                <label class="form-check-label" for="flavor4">Dessert</label>
                            </div>
                        </div>

                        <button class="btn btn-orange w-100">Apply Filters</button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <!-- Sort Options -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="mb-0">Showing 1-12 of 48 products</p>
                        <select class="form-select w-auto">
                            <option>Sort by Newest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Most Popular</option>
                        </select>
                    </div>

                    <!-- Products Grid -->
                    <div class="row g-4">
                        <!-- Product 1 -->
                        <div class="col-lg-4 col-md-6">
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
                        <div class="col-lg-4 col-md-6">
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
                        <div class="col-lg-4 col-md-6">
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
                        <div class="col-lg-4 col-md-6">
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
                        <div class="col-lg-4 col-md-6">
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
                        <div class="col-lg-4 col-md-6">
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
            </div>
        </div>
    </section>

    <script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </script>
</x-front-layout>