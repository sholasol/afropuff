<x-front-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-times-circle text-danger" style="font-size: 4rem;"></i>
                        </div>
                        <h2 class="text-danger">Payment Failed!</h2>
                        <p class="lead">Sorry, your payment could not be processed.</p>
                        
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        
                        <div class="mt-4">
                            <a href="{{ route('cart') }}" class="btn btn-primary me-2">Try Again</a>
                            <a href="{{ route('shop') }}" class="btn btn-outline-primary">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </x-front-layout>
    