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
                            <h3 class="stat-number">124</h3>
                            <p class="stat-label">Total Orders</p>
                            <span class="stat-period">Last 30 days</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-number">98</h3>
                            <p class="stat-label">Completed Orders</p>
                            <span class="stat-period">Last 30 days</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-icon bg-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-number">18</h3>
                            <p class="stat-label">Pending Orders</p>
                            <span class="stat-period">Needs attention</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-icon bg-danger">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-number">8</h3>
                            <p class="stat-label">Cancelled Orders</p>
                            <span class="stat-period">Last 30 days</span>
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
                                <li><a class="dropdown-item" href="#">All Orders</a></li>
                                <li><a class="dropdown-item" href="#">Processing</a></li>
                                <li><a class="dropdown-item" href="#">Completed</a></li>
                                <li><a class="dropdown-item" href="#">Cancelled</a></li>
                                <li><a class="dropdown-item" href="#">Refunded</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-light ms-2" data-bs-toggle="collapse" data-bs-target="#advancedFilters">
                            <i class="fas fa-sliders-h me-2"></i>Advanced
                        </button>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search orders..." id="orderSearch">
                            <button class="btn btn-outline-light" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced Filters (Collapsed by default) -->
            <div class="collapse mb-4" id="advancedFilters">
                <div class="filter-card">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Date Range</label>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="From">
                                <span class="input-group-text">to</span>
                                <input type="date" class="form-control" placeholder="To">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Customer</label>
                            <select class="form-select">
                                <option value="">All Customers</option>
                                <option value="1">John Doe</option>
                                <option value="2">Jane Smith</option>
                                <option value="3">Robert Johnson</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select">
                                <option value="">All Methods</option>
                                <option value="credit-card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank-transfer">Bank Transfer</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Order Total</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" placeholder="Min">
                                <span class="input-group-text">-</span>
                                <input type="number" class="form-control" placeholder="Max">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-outline-light me-2">Reset</button>
                        <button class="btn btn-orange">Apply Filters</button>
                    </div>
                </div>
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
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1001</a></td>
                            <td>John Doe</td>
                            <td>2024-01-15</td>
                            <td><span class="badge bg-warning">Processing</span></td>
                            <td>3</td>
                            <td>$45.97</td>
                            <td>Credit Card</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-success" title="Fulfill" onclick="fulfillOrder(1001)">
                                        <i class="fas fa-box"></i>
                                    </button>
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
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1002</a></td>
                            <td>Jane Smith</td>
                            <td>2024-01-14</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>2</td>
                            <td>$29.98</td>
                            <td>PayPal</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Print Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Send Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Refund Order</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1003</a></td>
                            <td>Robert Johnson</td>
                            <td>2024-01-14</td>
                            <td><span class="badge bg-warning">Processing</span></td>
                            <td>1</td>
                            <td>$16.99</td>
                            <td>Credit Card</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-success" title="Fulfill" onclick="fulfillOrder(1003)">
                                        <i class="fas fa-box"></i>
                                    </button>
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
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1004</a></td>
                            <td>Emily Davis</td>
                            <td>2024-01-13</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>4</td>
                            <td>$59.96</td>
                            <td>Credit Card</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Print Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Send Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Refund Order</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1005</a></td>
                            <td>Michael Wilson</td>
                            <td>2024-01-12</td>
                            <td><span class="badge bg-danger">Cancelled</span></td>
                            <td>2</td>
                            <td>$27.98</td>
                            <td>PayPal</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Print Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Send Email</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1006</a></td>
                            <td>Sarah Brown</td>
                            <td>2024-01-12</td>
                            <td><span class="badge bg-info">Shipped</span></td>
                            <td>3</td>
                            <td>$42.97</td>
                            <td>Credit Card</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Print Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Send Email</a></li>
                                            <li><a class="dropdown-item" href="#">Track Shipment</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1007</a></td>
                            <td>David Miller</td>
                            <td>2024-01-11</td>
                            <td><span class="badge bg-warning">Processing</span></td>
                            <td>2</td>
                            <td>$25.98</td>
                            <td>Bank Transfer</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-success" title="Fulfill" onclick="fulfillOrder(1007)">
                                        <i class="fas fa-box"></i>
                                    </button>
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
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input order-select" type="checkbox">
                                </div>
                            </td>
                            <td><a href="order-detail.html">#ORD-1008</a></td>
                            <td>Jennifer Taylor</td>
                            <td>2024-01-10</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>1</td>
                            <td>$13.99</td>
                            <td>PayPal</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="order-detail.html" class="btn btn-sm btn-outline-light" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Print Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Send Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Refund Order</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
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
        <div class="modal-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6>Shipping Address</h6>
                    <address>
                        <strong>John Doe</strong><br>
                        123 Main Street<br>
                        Apt 4B<br>
                        Los Angeles, CA 90001<br>
                        United States<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-md-6">
                    <h6>Order Details</h6>
                    <p><strong>Order Date:</strong> January 15, 2024</p>
                    <p><strong>Payment Method:</strong> Credit Card</p>
                    <p><strong>Order Total:</strong> $45.97</p>
                </div>
            </div>

            <h6>Items to Fulfill</h6>
            <div class="table-responsive mb-4">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dark Menthol</td>
                            <td>VP-001</td>
                            <td>2</td>
                            <td>$12.99</td>
                            <td>$25.98</td>
                        </tr>
                        <tr>
                            <td>Mixed Fruits</td>
                            <td>VP-002</td>
                            <td>1</td>
                            <td>$14.99</td>
                            <td>$14.99</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Subtotal:</strong></td>
                            <td>$40.97</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Shipping:</strong></td>
                            <td>$5.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total:</strong></td>
                            <td>$45.97</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="shippingMethod" class="form-label">Shipping Method</label>
                    <select class="form-select" id="shippingMethod">
                        <option value="standard">Standard Shipping</option>
                        <option value="express">Express Shipping</option>
                        <option value="overnight">Overnight Shipping</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="trackingNumber" class="form-label">Tracking Number (Optional)</label>
                    <input type="text" class="form-control" id="trackingNumber">
                </div>
            </div>

            <div class="mb-3">
                <label for="fulfillmentNotes" class="form-label">Notes (Optional)</label>
                <textarea class="form-control" id="fulfillmentNotes" rows="3"></textarea>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="notifyCustomer" checked>
                <label class="form-check-label" for="notifyCustomer">
                    Send notification email to customer
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" id="confirmFulfillBtn">Fulfill Order</button>
        </div>
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
            <a href="order-detail.html" class="btn btn-orange">View Order Details</a>
        </div>
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
        let orderIdToFulfill = null;

        function fulfillOrder(orderId) {
            orderIdToFulfill = orderId;
            document.getElementById('fulfillOrderId').textContent = orderId;
            const fulfillModal = new bootstrap.Modal(document.getElementById('fulfillModal'));
            fulfillModal.show();
        }

        document.getElementById('confirmFulfillBtn').addEventListener('click', function() {
            if (orderIdToFulfill) {
                // Here you would typically make an API call to fulfill the order
                console.log(`Fulfilling order with ID: ${orderIdToFulfill}`);
                
                // Close the fulfill modal
                const fulfillModal = bootstrap.Modal.getInstance(document.getElementById('fulfillModal'));
                fulfillModal.hide();
                
                // Show success notification
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                
                // Update the order status in the table
                const orderRow = document.querySelector(`tr[data-order-id="${orderIdToFulfill}"]`);
                if (orderRow) {
                    const statusBadge = orderRow.querySelector('.badge');
                    statusBadge.className = 'badge bg-info';
                    statusBadge.textContent = 'Shipped';
                    
                    // Remove the fulfill button
                    const fulfillButton = orderRow.querySelector('.btn-success');
                    if (fulfillButton) {
                        fulfillButton.remove();
                    }
                }
                
                // Reset the order ID
                orderIdToFulfill = null;
            }
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
    </script>
</x-admin-layout>