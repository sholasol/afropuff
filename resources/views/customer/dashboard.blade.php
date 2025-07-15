<x-front-layout>
    <link href="{{ asset('assets/css/customer.css') }}" rel="stylesheet">
    
    <div class="container-fluid top">
        <div class="row">
            @include('layouts.customerSidebar')

            <div class="col-md-9">
                <div class="card fade-in">
                    <div class="card-header">
                        <h5 class="mb-0 text-white">
                            <i class="fas fa-chart-line me-2"></i>Dashboard Overview
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="welcome-section">
                            <h4 class="mb-3">
                                <i class="fas fa-hand-wave me-2 text-accent"></i>
                                Welcome back, {{ $user->name }}!
                            </h4>
                            <p class="mb-0 text-muted">From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                        </div>

                        <!-- Quick Stats -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-number">{{ $recentOrders->count() }}</div>
                                    <div class="text-muted">Recent Orders</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-number">₦{{ number_format($recentOrders->sum('amount'), 2) }}</div>
                                    <div class="text-muted">Recent Total</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-number">{{ $recentOrders->where('status', 'pending')->count() }}</div>
                                    <div class="text-muted">Pending Orders</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h5 class="mb-4">
                                <i class="fas fa-clock me-2 text-accent"></i>
                                Recent Orders
                            </h5>
                            @if ($recentOrders->count() > 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-hashtag me-1"></i>Order #</th>
                                                <th><i class="fas fa-calendar me-1"></i>Date</th>
                                                <th><i class="fas fa-info-circle me-1"></i>Status</th>
                                                <th><i class="fas fa-money-bill me-1"></i>Total</th>
                                                <th><i class="fas fa-cog me-1"></i>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recentOrders as $order)
                                                <tr>
                                                    <td><strong>#{{ $order->id }}</strong></td>
                                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <span class="badge order-status-{{ $order->status }}">
                                                            @if ($order->status == 'paid')
                                                                <i class="fas fa-check-circle me-1"></i>
                                                            @elseif($order->status == 'pending')
                                                                <i class="fas fa-clock me-1"></i>
                                                            @else
                                                                <i class="fas fa-times-circle me-1"></i>
                                                            @endif
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                    <td><strong>₦{{ number_format($order->amount, 2) }}</strong></td>
                                                    <td>
                                                        <a href="{{ route('customer.order.details', $order) }}" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-eye me-1"></i>View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    You haven't placed any orders yet.
                                </div>
                            @endif
                            <div class="text-end mt-4">
                                <a href="{{ route('customer.orders') }}" class="btn btn-primary">
                                    <i class="fas fa-list me-2"></i>View All Orders
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('layouts.script')
</x-front-layout>