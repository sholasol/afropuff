<x-front-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h2 class="text-success">Payment Successful!</h2>
                        <p class="lead">Thank you for your purchase. Your order has been confirmed.</p>
                        
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary me-2">View Orders</a>
                            <a href="{{ route('shop') }}" class="btn btn-outline-primary">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
