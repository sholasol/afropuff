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


    public function customer(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
