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
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <nav class="admin-sidebar">
            <div class="sidebar-header">
                <h4 class="fw-bold">AfroPuff</h4>
                <span class="text-muted">Admin Panel</span>
            </div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a href="dashboard.html" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="products.html" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="orders.html" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="customers.html" class="nav-link">
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
                    <h1 class="page-title">Dashboard</h1>
                    <div class="header-actions">
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-2"></i>Admin
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#profile">Profile</a></li>
                                <li><a class="dropdown-item" href="#settings">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../login.html">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Stats Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon bg-orange">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number">1,234</h3>
                                <p class="stat-label">Total Orders</p>
                                <span class="stat-change text-success">
                                    <i class="fas fa-arrow-up"></i> 12%
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon bg-green">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number">$45,678</h3>
                                <p class="stat-label">Sales Revenue</p>
                                <span class="stat-change text-success">
                                    <i class="fas fa-arrow-up"></i> 8%
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon bg-purple">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number">156</h3>
                                <p class="stat-label">Products</p>
                                <span class="stat-change text-warning">
                                    <i class="fas fa-exclamation-triangle"></i> 12 Low Stock
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon bg-blue">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number">2,456</h3>
                                <p class="stat-label">Customers</p>
                                <span class="stat-change text-success">
                                    <i class="fas fa-arrow-up"></i> 15%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row g-4 mb-4">
                    <div class="col-lg-8">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5 class="card-title">Sales Overview</h5>
                                <div class="card-actions">
                                    <select class="form-select form-select-sm">
                                        <option>Last 7 days</option>
                                        <option>Last 30 days</option>
                                        <option>Last 3 months</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-placeholder">
                                    <i class="fas fa-chart-line"></i>
                                    <p>Sales Chart Placeholder</p>
                                    <small class="text-muted">Chart will be rendered here with actual data</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5 class="card-title">Top Products</h5>
                            </div>
                            <div class="card-body">
                                <div class="top-product">
                                    <div class="d-flex align-items-center">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Dark Menthol" class="product-thumb me-3">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Dark Menthol</h6>
                                            <small class="text-muted">234 sold</small>
                                        </div>
                                        <span class="badge bg-orange">$2,988</span>
                                    </div>
                                </div>
                                <div class="top-product">
                                    <div class="d-flex align-items-center">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Mixed Fruits" class="product-thumb me-3">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Mixed Fruits</h6>
                                            <small class="text-muted">189 sold</small>
                                        </div>
                                        <span class="badge bg-green">$2,834</span>
                                    </div>
                                </div>
                                <div class="top-product">
                                    <div class="d-flex align-items-center">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Blushed Mango" class="product-thumb me-3">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Blushed Mango</h6>
                                            <small class="text-muted">156 sold</small>
                                        </div>
                                        <span class="badge bg-purple">$2,182</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5 class="card-title">Recent Orders</h5>
                                <a href="orders.html" class="btn btn-outline-light btn-sm">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Products</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#ORD-001</td>
                                                <td>John Doe</td>
                                                <td>Dark Menthol, Mixed Fruits</td>
                                                <td>$27.98</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>2024-01-15</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-light">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#ORD-002</td>
                                                <td>Jane Smith</td>
                                                <td>Blushed Mango</td>
                                                <td>$13.99</td>
                                                <td><span class="badge bg-warning">Processing</span></td>
                                                <td>2024-01-15</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-light">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#ORD-003</td>
                                                <td>Mike Johnson</td>
                                                <td>Vanilla Dream, Berry Blast</td>
                                                <td>$32.98</td>
                                                <td><span class="badge bg-info">Shipped</span></td>
                                                <td>2024-01-14</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-light">View</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/admin.js"></script>
</body>
</html>
