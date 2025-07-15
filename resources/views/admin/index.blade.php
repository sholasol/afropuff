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
                            <h3 class="stat-number">{{$totalOrders}}</h3>
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
                            <h3 class="stat-number">${{$revenue}}</h3>
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
                        <h3 class="stat-number">{{$products}}</h3>
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
                            <h3 class="stat-number">{{$customers}}</h3>
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
                            <a href="{{route('orders')}}" class="btn btn-outline-light btn-sm">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-dark table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Items</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order )
                                        <tr>
                                            <td>#ORD-00{{$key + 1}}</td>
                                            <td>{{ $order->customer->name ?? 'Guest' }}</td>
                                            <td>{{ $order->orderItems->count() }}</td>
                                            <td>${{$order->amount}}</td>
                                            <td>
                                                @php
                                                    $badgeClass = [
                                                        'pending' => 'bg-warning',
                                                        'paid' => 'bg-success',
                                                        'cancelled' => 'bg-danger',
                                                        'failed' => 'bg-info',
                                                    ][$order->status] ?? 'bg-secondary';
                                                @endphp
                                                <span class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                                            </td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-light">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
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