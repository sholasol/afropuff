<x-admin-layout>
   

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
</x-admin-layout>