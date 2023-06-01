<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no',
        'first_name', 'last_name', 'email', 'contact', 'city', 'state', 'country',
        'postal_code',
        'order_status',
        'payment_status',
        'amount',
        'customer_id ',
        'roamer_id ',
        'shipment_address',
        'shipping_method',
        'shipping_price',
        'subTotal',
        'payment_method',
        'discount'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function orderitem(){
        return $this->hasMany(OrderItem::class);
    }

    public function orderimage(){
        return $this->hasMany(OrderImage::class);
    }
}
