<x-admin-layout>
    <!-- Orders Content -->
    <div class="orders-content py-4">
        <div class="container-fluid">
            <!-- Order Stats -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-icon bg-primary">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-number">{{ $totalOrders }}</h3>
                            <p class="stat-label">Total Orders</p>
                            <span class="stat-period text-white">Last 30 days</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-number">{{ $completedOrders }}</h3>
                            <p class="stat-label">Completed </p>
                            <span class="stat-period text-white">Last 30 days</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-icon bg-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-number">{{ $pendingOrders }}</h3>
                            <p class="stat-label">Pending</p>
                            <span class="stat-period text-white"> Attention</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-icon bg-danger">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-number">{{ $cancelledOrders }}</h3>
                            <p class="stat-label">Cancelled</p>
                            <span class="stat-period text-white">Last 30 days</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-outline-light" id="bulkActionBtn" disabled>
                            <i class="fas fa-cog me-2"></i>Bulk Actions
                        </button>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('orders') }}">All Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders', ['status' => 'pending']) }}">Processing</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders', ['status' => 'paid']) }}">Completed</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders', ['status' => 'cancelled']) }}">Cancelled</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders', ['status' => 'failed']) }}">Failed</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-light ms-2" data-bs-toggle="collapse" data-bs-target="#advancedFilters">
                            <i class="fas fa-sliders-h me-2"></i>Advanced
                        </button>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('orders') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search orders..." name="search" value="{{ request('search') }}">
                                <button class="btn btn-outline-light" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Advanced Filters (Collapsed by default) -->
            <div class="collapse mb-4" id="advancedFilters">
                <form action="{{ route('orders') }}" method="GET">
                    <div class="filter-card">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Date Range</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="from_date" value="{{ request('from_date') }}">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" name="to_date" value="{{ request('to_date') }}">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Customer</label>
                                <select class="form-select" name="customer_id">
                                    <option value="">All Customers</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Payment Method</label>
                                <select class="form-select" name="payment_method">
                                    <option value="">All Methods</option>
                                    <option value="credit-card" {{ request('payment_method') == 'credit-card' ? 'selected' : '' }}>Credit Card</option>
                                    <option value="paypal" {{ request('payment_method') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                                    <option value="bank-transfer" {{ request('payment_method') == 'bank-transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Order Total</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" placeholder="Min" name="min_amount" value="{{ request('min_amount') }}">
                                    <span class="input-group-text">-</span>
                                    <input type="number" class="form-control" placeholder="Max" name="max_amount" value="{{ request('max_amount') }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('orders') }}" class="btn btn-outline-light me-2">Reset</a>
                            <button class="btn btn-orange" type="submit">Apply Filters</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Orders Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                        <tr data-order-id="{{ $order->id }}">
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="{{ route('orders.show', $order->id) }}">#ORD-00{{$key + 1}}</a></td>
                            <td>{{ $order->customer->name ?? 'Guest' }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
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
                            <td>{{ $order->orderItems->count() }}</td>
                            <td>${{ number_format($order->amount, 2) }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($order->status == 'paid')
                                    <button class="btn btn-sm btn-success" title="Fulfill" onclick="fulfillOrder({{ $order->id }})">
                                        <i class="fas fa-box"></i>
                                    </button>
                                    @endif
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Print Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Send Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Cancel Order</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="mt-4">
                {{ $orders->links() }}
            </nav>
        </div>
    </div>


     <!-- Fulfill Order Modal -->
     <div class="modal fade" id="fulfillModal" tabindex="-1" aria-labelledby="fulfillModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fulfillModalLabel">Fulfill Order #<span id="fulfillOrderId"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="fulfillOrderForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body" id="fulfillModalBody">
                        <!-- Dynamic content will be loaded here via JavaScript -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="confirmFulfillBtn">Fulfill Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Order Fulfilled</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle text-success fa-4x"></i>
                        <h4 class="mt-3">Order Successfully Fulfilled!</h4>
                        <p>The order has been marked as fulfilled and the customer has been notified.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="successModalOrderLink" class="btn btn-orange">View Order Details</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Order Modal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Cancel Order #<span id="cancelOrderId"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cancelOrderForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="cancelReason" class="form-label">Reason for Cancellation</label>
                            <select class="form-select" id="cancelReason" name="reason" required>
                                <option value="">Select a reason</option>
                                <option value="out_of_stock">Out of Stock</option>
                                <option value="customer_request">Customer Request</option>
                                <option value="payment_issue">Payment Issue</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cancelNotes" class="form-label">Notes</label>
                            <textarea class="form-control" id="cancelNotes" name="notes" rows="3"></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="notifyCustomerCancel" name="notify_customer" checked>
                            <label class="form-check-label" for="notifyCustomerCancel">
                                Send notification email to customer
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm Cancellation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <script>
        // Handle select all checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.order-select');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActionButton();
        });

        // Handle individual checkboxes
        document.querySelectorAll('.order-select').forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActionButton);
        });

        // Update bulk action button state
        function updateBulkActionButton() {
            const checkboxes = document.querySelectorAll('.order-select:checked');
            const bulkActionBtn = document.getElementById('bulkActionBtn');
            bulkActionBtn.disabled = checkboxes.length === 0;
        }

        // Handle fulfill order
        function fulfillOrder(orderId) {
            // Set the order ID in the modal title
            document.getElementById('fulfillOrderId').textContent = orderId;
            
            // Set the form action
            document.getElementById('fulfillOrderForm').action = `/orders/${orderId}/fulfill`;
            
            // Load order details via AJAX
            fetch(`/admin/orders/${orderId}/fulfill-modal`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('fulfillModalBody').innerHTML = html;
                    const fulfillModal = new bootstrap.Modal(document.getElementById('fulfillModal'));
                    fulfillModal.show();
                });
        }

        // Handle cancel order
        function cancelOrder(orderId) {
            // Set the order ID in the modal title and form
            document.getElementById('cancelOrderId').textContent = orderId;
            document.getElementById('cancelOrderForm').action = `/admin/orders/${orderId}/cancel`;
            
            const cancelModal = new bootstrap.Modal(document.getElementById('cancelModal'));
            cancelModal.show();
        }

        // Handle form submission for fulfill order
        document.getElementById('fulfillOrderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close the fulfill modal
                    const fulfillModal = bootstrap.Modal.getInstance(document.getElementById('fulfillModal'));
                    fulfillModal.hide();
                    
                    // Update the order status in the table
                    const orderRow = document.querySelector(`tr[data-order-id="${data.order.id}"]`);
                    if (orderRow) {
                        const statusBadge = orderRow.querySelector('.badge');
                        statusBadge.className = 'badge bg-success';
                        statusBadge.textContent = 'Completed';
                        
                        // Remove the fulfill button
                        const fulfillButton = orderRow.querySelector('.btn-success[title="Fulfill"]');
                        if (fulfillButton) {
                            fulfillButton.remove();
                        }
                    }
                    
                    // Set the success modal link
                    document.getElementById('successModalOrderLink').href = `/admin/orders/${data.order.id}`;
                    
                    // Show success notification
                    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        // Handle form submission for cancel order
        document.getElementById('cancelOrderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close the cancel modal
                    const cancelModal = bootstrap.Modal.getInstance(document.getElementById('cancelModal'));
                    cancelModal.hide();
                    
                    // Update the order status in the table
                    const orderRow = document.querySelector(`tr[data-order-id="${data.order.id}"]`);
                    if (orderRow) {
                        const statusBadge = orderRow.querySelector('.badge');
                        statusBadge.className = 'badge bg-danger';
                        statusBadge.textContent = 'Cancelled';
                        
                        // Remove action buttons
                        const actionButtons = orderRow.querySelectorAll('.btn-success, .dropdown');
                        actionButtons.forEach(button => button.remove());
                    }
                    
                    // Show success notification (you could create a specific cancel success modal)
                    alert('Order has been cancelled successfully');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        // Search functionality
        document.getElementById('orderSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const orderId = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const customerName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                
                if (orderId.includes(searchTerm) || customerName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Initialize dropdown menus
        document.querySelectorAll('.dropdown-toggle').forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                e.preventDefault();
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.matches('.dropdown-toggle')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>
</x-admin-layout>