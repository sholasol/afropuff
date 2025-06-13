<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afropuff - Premium E-cigarettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">
                Afro<span class="text-orange">Puff</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#support">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#refer">Refer a Smoker</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <button class="btn btn-green me-2">Let's Talk</button>
                    <a href="#" class="text-white me-3"><i class="fas fa-search"></i></a>
                    <a href="cart.html" class="text-white position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-orange position-absolute top-0 start-100 translate-middle">3</span>
                    </a>
                    <a href="login.html" class="btn btn-outline-light ms-3">Login</a>
                </div>
            </div>
        </div>
    </nav>
    
     <!-- Hero Section -->
     <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">E-cigarettes are significantly less harmful than smoking</h1>
                        <p class="hero-subtitle">The aim is to provide the sensation of inhaling tobacco smoke, without the smoke.</p>
                        <button class="btn btn-orange btn-lg">
                            Shop Collection <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-container">
                        <img src="https://cdn.pixabay.com/photo/2018/05/23/08/48/vape-3423483_1280.jpg" alt="Person vaping" class="hero-image">
                        <div class="product-showcase">
                            <div class="product-circle">
                                <img src="https://cdn.pixabay.com/photo/2021/08/21/07/53/blotto-6562078_1280.jpg" alt="Vape pack" class="product-image">
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
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg" alt="Dark Menthol" class="product-img">
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Dark Menthol</h5>
                            <span class="product-flavor">Menthol</span>
                            <div class="product-price">$12.99</div>
                            <button class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://cdn.pixabay.com/photo/2018/05/21/04/40/vape-3417374_1280.jpg" alt="Mixed Fruits" class="product-img">
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
                            <img src="https://cdn.pixabay.com/photo/2020/02/01/18/13/vape-4811030_1280.jpg" alt="Blushed Mango" class="product-img">
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
                            <img src="https://cdn.pixabay.com/photo/2016/04/01/21/39/e-cigarette-1301664_1280.jpg" alt="Fruit Fields" class="product-img">
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Fruit Fields</h5>
                            <span class="product-flavor">Mixed</span>
                            <div class="product-price">$15.99</div>
                            <button class="btn btn-orange btn-sm w-100 mt-2">Add to Cart</button>
                        </div>
                    </div>
                </div>
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

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">VapeXperience</h5>
                    <p>Premium e-cigarettes for a better smoking alternative. Quality products, exceptional service.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#careers">Careers</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#blog">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="#help">Help Center</a></li>
                        <li><a href="#shipping">Shipping Info</a></li>
                        <li><a href="#returns">Returns</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Legal</h6>
                    <ul class="list-unstyled">
                        <li><a href="#terms">Terms of Service</a></li>
                        <li><a href="#privacy">Privacy Policy</a></li>
                        <li><a href="#cookies">Cookie Policy</a></li>
                        <li><a href="#age">Age Verification</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Account</h6>
                    <ul class="list-unstyled">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="orders.html">My Orders</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 VapeXperience. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Must be 21+ to purchase. Please vape responsibly.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
