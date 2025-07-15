<x-front-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Receipt Header -->
                <div class="card shadow-sm mb-4 mt-5">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h2 class="text-success mb-3">Payment Successful!</h2>
                        <p class="text-muted mb-4">Thank you for your order. Your payment has been processed successfully.</p>
                        
                        <!-- Order Reference -->
                        <div class="alert alert-success">
                            <strong>Order Reference:</strong> {{ $order->reference }}
                        </div>
                    </div>
                </div>

                <!-- Order Details -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-muted">Order Information</h6>
                                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                                <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
                                <p><strong>Status:</strong> 
                                    <span class="badge bg-success">{{ ucfirst($order->status) }}</span>
                                </p>
                                <p><strong>Payment Method:</strong> Paystack</p>
                                @if($order->payment_reference)
                                    <p><strong>Payment Reference:</strong> {{ $order->payment_reference }}</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted">Customer Information</h6>
                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                
                                <h6 class="text-muted mt-3">Delivery Address</h6>
                                <address>
                                    {{ $order->shipping_address }}<br>
                                    {{ $order->city }}, {{ $order->state }}<br>
                                    @if($order->zip)
                                        {{ $order->zip }}
                                    @endif
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-box me-2"></i>Order Items</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grandTotal = 0; @endphp
                                    @foreach($order->orderItems as $item)
                                        @php 
                                            $itemTotal = $item->price * $item->quantity;
                                            $grandTotal += $itemTotal;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->product && $item->product->featuredImage)
                                                        <img src="{{ asset('storage/' . $item->product->featuredImage) }}" 
                                                             alt="{{ $item->product->name }}" 
                                                             class="me-3 rounded" 
                                                             style="width: 50px; height: 50px; object-fit: cover;">
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-0">{{ $item->product->name ?? 'Product not found' }}</h6>
                                                        @if($item->variant_id)
                                                            <small class="text-muted">Variant ID: {{ $item->variant_id }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-secondary">{{ $item->quantity }}</span>
                                            </td>
                                            <td class="text-end">₦{{ number_format($item->price, 2) }}</td>
                                            <td class="text-end"><strong>₦{{ number_format($itemTotal, 2) }}</strong></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <th colspan="3" class="text-end">Grand Total:</th>
                                        <th class="text-end text-success">₦{{ number_format($grandTotal, 2) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <a href="{{ route('shop') }}" class="btn btn-outline-primary btn-lg w-100">
                                    <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <button onclick="window.print()" class="btn btn-outline-secondary btn-lg w-100">
                                    <i class="fas fa-print me-2"></i>Print Receipt
                                </button>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('support') }}" class="btn btn-outline-info btn-lg w-100">
                                    <i class="fas fa-headset me-2"></i>Contact Support
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="mt-4 text-center text-muted">
                    <p class="mb-1"><small>Questions about your order? Contact our support team.</small></p>
                    <p class="mb-0"><small>This receipt was generated on {{ now()->format('M d, Y \a\t h:i A') }}</small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Styles -->
    <style>
        @media print {
            .btn, .card-shadow, nav, footer {
                display: none !important;
            }
            
            .card {
                border: 1px solid #ddd !important;
                box-shadow: none !important;
            }
            
            .container {
                max-width: 100% !important;
                padding: 0 !important;
            }
            
            body {
                background: white !important;
            }
        }
    </style>
</x-front-layout>