<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AfroPuff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
    <!-- Quill stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <nav class="admin-sidebar">
            <div class="sidebar-header">
                <h4 class="fw-bold">
                    <i class="fas fa-shopping-bag text-white"></i>
                    <a href="{{route('dashboard')}}" class="text-white">AfroPuff</a>
                </h4>
                <span class="text-white">Admin Panel</span>
            </div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories')}}" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tags')}}" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Tags</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products')}}" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('orders')}}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('customers')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="analytics.html" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="settings.html" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../index.html" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-external-link-alt me-2"></i>View Store
                </a>
            </div>
        </nav>
         <!-- Main Content -->
    <div class="admin-content">
        <!-- Top Bar -->
        <header class="admin-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="page-title">Page Title</h1>
                <div class="header-actions">
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>{{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#profile">Profile</a></li>
                            <li><a class="dropdown-item" href="#settings">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        {{$slot}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="../assets/js/admin.js"></script> --}}
</body>
</html>
