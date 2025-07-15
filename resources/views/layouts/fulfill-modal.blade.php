<div class="row mb-4">
    <div class="col-md-6">
        <h6>Shipping Address</h6>
        <address>
            <strong>{{ $order->shipping_name ?? $order->customer->name }}</strong><br>
            {{ $order->shipping_address }}<br>
            @if($order->shipping_address2)
                {{ $order->shipping_address2 }}<br>
            @endif
            {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}<br>
            {{ $order->shipping_country }}<br>
            @if($order->phone)
                <abbr title="Phone">P:</abbr> {{ $order->phone }}
            @endif
        </address>
    </div>
    <div class="col-md-6">
        <h6>Order Details</h6>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment_method ?: 'N/A' }}</p>
        <p><strong>Order Total:</strong> ${{ number_format($order->amount, 2) }}</p>
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
            @foreach($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->sku }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-end"><strong>Subtotal:</strong></td>
                <td>${{ number_format($order->subtotal, 2) }}</td>
            </tr>
            @if($order->shipping_cost > 0)
            <tr>
                <td colspan="4" class="text-end"><strong>Shipping:</strong></td>
                <td>${{ number_format($order->shipping_cost, 2) }}</td>
            </tr>
            @endif
            @if($order->tax_amount > 0)
            <tr>
                <td colspan="4" class="text-end"><strong>Tax:</strong></td>
                <td>${{ number_format($order->tax_amount, 2) }}</td>
            </tr>
            @endif
            <tr>
                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                <td>${{ number_format($order->amount, 2) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="shippingMethod" class="form-label">Shipping Method</label>
        <select class="form-select" id="shippingMethod" name="shipping_method" required>
            <option value="standard">Standard Shipping</option>
            <option value="express">Express Shipping</option>
            <option value="overnight">Overnight Shipping</option>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="trackingNumber" class="form-label">Tracking Number (Optional)</label>
        <input type="text" class="form-control" id="trackingNumber" name="tracking_number">
    </div>
</div>

<div class="mb-3">
    <label for="fulfillmentNotes" class="form-label">Notes (Optional)</label>
    <textarea class="form-control" id="fulfillmentNotes" name="fulfillment_notes" rows="3"></textarea>
</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" id="notifyCustomer" name="notify_customer" checked>
    <label class="form-check-label" for="notifyCustomer">
        Send notification email to customer
    </label>
</div>