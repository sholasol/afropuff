<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id', 
        'quantity', 
        'amount',
        'reference', 
        'status',
        'shipping_address',
        'phone',
        'email',
        'payment_reference'
    ];


    public function customer(){
        return $this->belongsTo(User::class, 'customer_id');
    }
}
