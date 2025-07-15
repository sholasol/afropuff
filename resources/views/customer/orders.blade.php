<x-front-layout>
    <link href="{{ asset('assets/css/customer.css') }}" rel="stylesheet">
    
    <div class="container-fluid top">
        <div class="row">
            @include('layouts.customerSidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-white">
                        <h5 class="mb-0 text-white"><i class="fas fa-list me-2"></i> My Orders</h5>
                    </div>
                    <div class="card-body">
                        @if($orders->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $key => $order)
                                        <tr>
                                            <td>#{{ $key + 1  }}</td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <span class="badge 
                                                    @if($order->status == 'paid') bg-success 
                                                    @elseif($order->status == 'pending') bg-warning text-dark 
                                                    @else bg-danger @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>₦{{ number_format($order->amount, 2) }}</td>
                                            <td>
                                                <a href="{{ route('customer.order.details', $order) }}" class="btn btn-sm btn-outline-orange">
                                                    View Details
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $orders->links() }}
                            </div>
                        @else
                            <div class="alert alert-info">
                                You haven't placed any orders yet. <a href="{{ route('shop') }}" class="alert-link">Start shopping</a>.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('layouts.script')
</x-front-layout>














