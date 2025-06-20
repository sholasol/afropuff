<x-front-layout>
    <!-- Include CSRF token for AJAX requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom CSS -->
    <style>
        .singlePord {
            text-decoration: none;
            color: #f3f3f3;
        }

        .product-image-gallery .main-image {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background: #2a2a2a;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image-gallery .main-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .thumbnail-images .thumbnail {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            border-radius: 8px;
            height: 80px;
            object-fit: cover;
            background: #2a2a2a;
        }

        .thumbnail-images .thumbnail:hover,
        .thumbnail-images .thumbnail.active {
            border-color: var(--orange-color, #ff6b35);
            transform: scale(1.05);
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid var(--orange-color, #ff6b35);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            min-width: 300px;
        }

        .variant-options .btn.active {
            background-color: var(--orange-color, #ff6b35);
            border-color: var(--orange-color, #ff6b35);
            color: white;
        }
    </style>

    <!-- Alert Container -->
    <div id="alertContainer"></div>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                            <li class="breadcrumb-item active">{{ $product->name }}</li>
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
                            @php
                                $mainImage = $product->featuredImage
                                    ? asset('storage/' . $product->featuredImage)
                                    : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg';
                            @endphp
                            <img id="mainImage" src="{{ $mainImage }}" alt="{{ $product->name }}"
                                class="img-fluid rounded">
                        </div>
                        <div class="thumbnail-images">
                            <div class="row g-2">
                                @if ($product->featuredImage)
                                    <div class="col-3">
                                        <img src="{{ asset('storage/' . $product->featuredImage) }}"
                                            alt="{{ $product->name }}" class="img-fluid rounded thumbnail active"
                                            onclick="changeMainImage(this)">
                                    </div>
                                @endif
                                @foreach ($product->images as $img)
                                    <div class="col-3">
                                        <img src="{{ $img ? asset('storage/' . $img->image_path) : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg' }}"
                                            alt="{{ $product->name }}"
                                            class="img-fluid rounded thumbnail {{ $loop->first && !$product->featuredImage ? 'active' : '' }}"
                                            onclick="changeMainImage(this)">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-info">
                        <h1 class="product-title">{{ $product->name }}</h1>
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
                            <span class="current-price">${{ $product->regular_price }}</span>
                        </div>

                        <div class="product-variants mb-4">
                            @if ($product->variants)
                                <h6>Available Variants:</h6>
                                <div class="variant-options">
                                    @foreach ($product->variants as $index => $var)
                                        <button
                                            class="btn btn-outline-light me-2 mb-2 {{ $index == 0 ? 'active' : '' }}"
                                            onclick="selectVariant(this)" data-variant="{{ $var->name }}"
                                            data-variant-id="{{ $var->id }}">{{ $var->name }}</button>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="product-description mb-4">
                            <h6>Description:</h6>
                            <p>{{ $product->description }}</p>
                        </div>

                        <div class="product-ingredients mb-4">
                            @if ($product->tags)
                                <h6>Tags:</h6>
                                <p>
                                    @foreach ($product->tags as $tag)
                                        {{ $tag->name }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </p>
                            @endif
                        </div>

                        <div class="product-actions">
                            <div class="quantity-selector mb-3">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <div class="input-group w-auto">
                                    <button class="btn btn-outline-light" type="button"
                                        onclick="decreaseQuantity()">-</button>
                                    <input type="number" class="form-control text-center" name="quantity"
                                        id="quantity" value="1" min="1">
                                    <button class="btn btn-outline-light" type="button"
                                        onclick="increaseQuantity()">+</button>
                                </div>
                            </div>
                            <div class="action-buttons">
                                <button class="btn btn-orange btn-lg me-3" onclick="addToCart({{ $product->id }})">
                                    <i class="fas fa-shopping-cart me-2"></i>
                                    <span class="loading-spinner me-2"></span>
                                    Add to Cart
                                </button>
                                <button class="btn btn-outline-light btn-lg"
                                    onclick="addToWishlist({{ $product->id }})">
                                    <i class="far fa-heart me-2"></i>
                                    <span class="loading-spinner me-2"></span>
                                    Add to Wishlist
                                </button>
                            </div>
                        </div>

                        <div class="product-features mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="feature-item">
                                        <i class="fas fa-shipping-fast text-orange"></i>
                                        <span>{{ $product->shipping_class ?? 'Free Shipping' }}</span>
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
                                <a href="{{ route('singleProduct', ['product' => $prod]) }}">
                                    <img src="{{ $prod->featuredImage ? asset('storage/' . $prod->featuredImage) : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg' }}"
                                        alt="{{ $prod->name }}" class="product-img">
                                </a>
                                <button class="wishlist-btn" onclick="toggleWishlist(this, {{ $prod->id }})">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name">
                                    <a href="{{ route('singleProduct', ['product' => $prod]) }}" class="singlePord">
                                        {{ $prod->name }}
                                    </a>
                                </h5>
                                <div class="product-price">${{ $prod->regular_price }}</div>
                                <button class="btn btn-orange btn-sm w-100 mt-2"
                                    onclick="quickAddToCart({{ $prod->id }})">
                                    <span class="loading-spinner me-2"></span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        // Image Gallery Functions
        function changeMainImage(thumbnail) {
            const mainImage = document.getElementById('mainImage');
            const allThumbnails = document.querySelectorAll('.thumbnail');

            // Remove active class from all thumbnails
            allThumbnails.forEach(thumb => thumb.classList.remove('active'));

            // Add active class to clicked thumbnail
            thumbnail.classList.add('active');

            // Change main image with fade effect
            mainImage.style.opacity = '0.5';
            setTimeout(() => {
                mainImage.src = thumbnail.src;
                mainImage.style.opacity = '1';
            }, 200);
        }

        // Quantity Functions
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }

        // Variant Selection
        function selectVariant(button) {
            const allVariants = document.querySelectorAll('.variant-options .btn');
            allVariants.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        }

        // Alert Functions
        function showAlert(message, type = 'success') {
            const alertContainer = document.getElementById('alertContainer');
            const alertId = 'alert-' + Date.now();

            const alertHTML = `
                <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show" role="alert">
                    <strong>${type === 'success' ? 'Success!' : type === 'error' ? 'Error!' : 'Info!'}</strong> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;

            alertContainer.innerHTML = alertHTML;

            // Auto dismiss after 4 seconds
            setTimeout(() => {
                const alert = document.getElementById(alertId);
                if (alert) {
                    alert.classList.remove('show');
                    setTimeout(() => alert.remove(), 150);
                }
            }, 4000);
        }

        // Loading Functions
        function showLoading(button) {
            const spinner = button.querySelector('.loading-spinner');
            const icon = button.querySelector('i:not(.loading-spinner)');

            if (spinner) {
                spinner.style.display = 'inline-block';
                if (icon) icon.style.display = 'none';
                button.disabled = true;
            }
        }

        function hideLoading(button) {
            const spinner = button.querySelector('.loading-spinner');
            const icon = button.querySelector('i:not(.loading-spinner)');

            if (spinner) {
                spinner.style.display = 'none';
                if (icon) icon.style.display = 'inline';
                button.disabled = false;
            }
        }



        function addToCart(productId) {
            const button = event.target.closest('button');
            const quantity = document.getElementById('quantity').value;
            const selectedVariantBtn = document.querySelector('.variant-options .btn.active');
            const variantId = selectedVariantBtn ? selectedVariantBtn.dataset.variantId : null;

            showLoading(button);

            // Build URL with query parameters
            let url = `/store-cart/${productId}?quantity=${quantity}`;
            if (variantId) {
                url += `&variant_id=${variantId}`;
            }

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) {
                        // If the response status is not 2xx, treat it as an error
                        throw new Error(data.message || 'Failed to add item to cart');
                    }
                    return data;
                })
                .then(data => {
                    hideLoading(button);
                    if (data.success) {
                        showAlert(`Added ${quantity} item(s) to cart successfully!`);
                        updateCartCount(data.cart_count);
                    } else {
                        showAlert(data.message || 'Failed to add item to cart', 'error');
                    }
                })
                .catch(error => {
                    hideLoading(button);
                    console.error('Error:', error);
                    // Check if the item was actually added despite the error
                    fetch('/cart', {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(cartData => {
                            // If the item is in the cart, show success with a note
                            const cartKey = variantId ? `${productId}_${variantId}` : productId;
                            if (cartData.cart && cartData.cart[cartKey]) {
                                showAlert(`Item was added to cart (${error.message})`, 'warning');
                                updateCartCount(Object.keys(cartData.cart).length);
                            } else {
                                // showAlert(error.message || 'An error occurred while adding to cart', 'error');
                            }
                        })
                        .catch(() => {
                            // showAlert(error.message || 'An error occurred while adding to cart', 'error');
                        });
                });
        }


     

        function addToCart(productId) {
            const button = event.target.closest('button');
            const quantity = document.getElementById('quantity').value;
            const selectedVariantBtn = document.querySelector('.variant-options .btn.active');
            const variantId = selectedVariantBtn ? selectedVariantBtn.dataset.variantId : null;

            showLoading(button);

            // Build URL with query parameters
            let url = `/store-cart/${productId}?quantity=${quantity}`;
            if (variantId) {
                url += `&variant_id=${variantId}`;
            }

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest' // This helps Laravel identify AJAX requests
                    }
                })
                .then(async response => {
                    // Check if response is JSON
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        const data = await response.json();
                        return {
                            data,
                            isJson: true,
                            ok: response.ok
                        };
                    } else {
                        // Response is HTML (redirect), which means success for non-AJAX requests
                        return {
                            data: null,
                            isJson: false,
                            ok: response.ok
                        };
                    }
                })
                .then(result => {
                    hideLoading(button);

                    if (result.isJson) {
                        // JSON response - handle normally
                        if (result.data.success) {
                            showAlert(`Added ${quantity} item(s) to cart successfully!`);
                            updateCartCount(result.data.cart_count);
                        } else {
                            showAlert(result.data.message || 'Failed to add item to cart', 'error');
                        }
                    } else if (result.ok) {
                        // HTML response but successful - item was added
                        showAlert(`Added ${quantity} item(s) to cart successfully!`);
                        // You might want to refresh cart count here by making another request
                    } else {
                        showAlert('Failed to add item to cart', 'error');
                    }
                })
                .catch(error => {
                    hideLoading(button);
                    console.error('Error:', error);
                    showAlert('An error occurred while adding to cart', 'error');
                });
        }



        // Wishlist Functions
        function addToWishlist(productId) {
            const button = event.target.closest('button');
            const icon = button.querySelector('i:not(.loading-spinner)');

            showLoading(button);

            fetch('/wishlist/toggle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    hideLoading(button);
                    if (data.success) {
                        if (data.added) {
                            icon.classList.remove('far');
                            icon.classList.add('fas');
                            button.classList.add('active');
                            showAlert('Added to wishlist!');
                        } else {
                            icon.classList.remove('fas');
                            icon.classList.add('far');
                            button.classList.remove('active');
                            showAlert('Removed from wishlist!', 'info');
                        }
                    } else {
                        showAlert(data.message || 'Failed to update wishlist', 'error');
                    }
                })
                .catch(error => {
                    hideLoading(button);
                    console.error('Error:', error);
                    showAlert('An error occurred while updating wishlist', 'error');
                });
        }

        function toggleWishlist(button, productId) {
            const icon = button.querySelector('i');

            fetch('/wishlist/toggle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.added) {
                            icon.classList.remove('far');
                            icon.classList.add('fas');
                            button.classList.add('active');
                            showAlert('Added to wishlist!');
                        } else {
                            icon.classList.remove('fas');
                            icon.classList.add('far');
                            button.classList.remove('active');
                            showAlert('Removed from wishlist!', 'info');
                        }
                    } else {
                        showAlert(data.message || 'Failed to update wishlist', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred while updating wishlist', 'error');
                });
        }

        // Helper function to update cart count display
        function updateCartCount(count) {
            const cartCountElements = document.querySelectorAll('.cart-count');
            cartCountElements.forEach(element => {
                element.textContent = count;
            });
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Product page initialized');

            // Set first thumbnail as active if no featured image
            const thumbnails = document.querySelectorAll('.thumbnail');
            if (thumbnails.length > 0 && !document.querySelector('.thumbnail.active')) {
                thumbnails[0].classList.add('active');
            }
        });
    </script>
</x-front-layout>
