<div class="col-md-3 mb-4">
    <!-- Sidebar Navigation -->
    <div class="card fade-in">
        <div class="card-header">
            <h5 class="mb-0 text-white">
                <i class="fas fa-user-circle me-2"></i>My Account
            </h5>
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('customer.dashboard') }}" class="list-group-item list-group-item-action active">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="{{ route('customer.orders') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-shopping-bag me-2"></i>My Orders
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-user me-2"></i>Account Details
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-map-marker-alt me-2"></i>Addresses
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-heart me-2"></i>Wishlist
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action text-danger">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>
    </div>
</div>