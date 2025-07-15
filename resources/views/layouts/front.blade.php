<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Afropuff - Premium E-cigarettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{route('home')}}">
                Afro<span class="text-orange">Puff</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item {{request()->is('/shop') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('shop')}}">Shop</a>
                    </li>
                    <li class="nav-item {{request()->is('/about') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item {{ request()->is('/support') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('support')}}">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/refer') ? 'active' : ''}}" href="{{route('refer')}}">Refer a Smoker</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a  href="{{route('talk')}}" class="btn btn-green me-2">Let's Talk</a>
                    <a href="{{ route('search')}}" class="text-white me-3"><i class="fas fa-search"></i></a>
                    <a href="{{ route('cart')}}" class="text-white position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-orange position-absolute top-0 start-100 translate-middle">
                            {{ count((array) session('cart')) }}
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                    @if (Auth::user() && Auth::user()->role === 'CUS')
                        <a href="{{route('customer.dashboard')}}" class="btn btn-outline-warning ms-3 text-white">{{auth()->user()->name}}</a>
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger ms-3">Sign Out</a>
                    @else
                    <a href="{{ route('login')}}" class="btn btn-outline-warning ms-3 text-white">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    {{ $slot}}

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
