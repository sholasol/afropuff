<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id',
        'reference',
        'amount',
        'email',
        'shipping_address',
        'state',
        'zip',
        'phone',
        'status',
        'payment_reference',
        'gateway_response'
    ];


    // In your Order model (app/Models/Order.php)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // In your OrderItem model (app/Models/OrderItem.php)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
