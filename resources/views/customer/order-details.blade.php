<x-front-layout>
    <link href="{{ asset('assets/css/customer.css') }}" rel="stylesheet">
    
    <div class="container-fluid top">
        <div class="row">
            @include('layouts.customerSidebar')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white">
                        <h5 class="mb-0 text-white">Order #{{ $order->id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h6>Order Details</h6>
                                <p>
                                    <strong>Date:</strong> {{ $order->created_at->format('M d, Y h:i A') }}<br>
                                    <strong>Status:</strong> 
                                    <span class="badge 
                                        @if($order->status == 'paid') bg-success 
                                        @elseif($order->status == 'pending') bg-warning text-dark 
                                        @else bg-danger @endif">
                                        {{ ucfirst($order->status) }}
                                    </span><br>
                                    <strong>Reference:</strong> {{ $order->reference }}<br>
                                    @if($order->payment_reference)
                                        <strong>Payment Ref:</strong> {{ $order->payment_reference }}<br>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h6>Customer Details</h6>
                                <p>
                                    <strong>Name:</strong> {{ $user->name }}<br>
                                    <strong>Email:</strong> {{ $order->email }}<br>
                                    <strong>Phone:</strong> {{ $order->phone }}<br>
                                </p>
                            </div>
                        </div>
    
                        <div class="mb-4">
                            <h6>Shipping Address</h6>
                            <p>
                                {{ $order->shipping_address }}<br>
                                {{ $order->city }}, {{ $order->state }}<br>
                                {{ $order->zip }}<br>
                            </p>
                        </div>
    
                        <div class="table-responsive mb-4">
                            <h6>Order Items</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($item->product->featuredImage)
                                                    <img 
                                                    src="{{ $item->product->featuredImage ? asset('storage/' . $item->product->featuredImage)  : 'https://cdn.pixabay.com/photo/2018/12/03/03/20/uwell-3852654_1280.jpg'}}"
                                                     alt="{{ $item->product->name }}" width="50" class="me-3">
                                                @endif
                                                <div>
                                                    <strong>{{ $item->product->name }}</strong><br>
                                                    @if($item->variant_id)
                                                        <small class="text-muted">Variant: {{ $item->variant->name ?? 'N/A' }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>₦{{ number_format($item->price, 2) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>₦{{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                        <td>₦{{ number_format($order->amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Shipping:</strong></td>
                                        <td>₦0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                        <td>₦{{ number_format($order->amount, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
    
                        @if($order->status == 'pending')
                            <div class="alert alert-warning">
                                <p class="mb-0">Your payment is pending. Please complete the payment to process your order.</p>
                            </div>
                        @elseif($order->status == 'paid')
                            <div class="alert alert-success">
                                <p class="mb-0">Your payment was successful. Your order is being processed.</p>
                            </div>
                        @endif
    
                        <a href="{{ route('customer.orders') }}" class="btn btn-orange">
                            <i class="fas fa-arrow-left me-2"></i>Back to Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('layouts.script')
</x-front-layout>



































