<x-front-layout>
     <!-- Page Header -->
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">Shop Collection</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    <a href="{{ route('singleProduct', ['product' => $product])}}">
                                    <img src="{{ $product->featuredImage ? asset('storage/' . $product->featuredImage)  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                            alt="{{$product->name}}" class="product-img">
                                    </a>
                                    <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                    {{-- <span class="product-tag">{{$product->name}}</span> --}}
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">
                                        <a class="singlePord" href="{{ route('singleProduct', ['product' => $product])}}">
                                            {{$product->name}}
                                        </a>
                                    </h5>
                                    <div class="product-price">${{$product->regular_price}}</div>
                                    <div class="product-actions">
                                        <a href="{{ route('storeCart', $product->id)}}" class="btn btn-orange btn-sm">Add to Cart</a>
                                        <button class="btn btn-outline-light btn-sm">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </section>

    <script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </script>
</x-front-layout>