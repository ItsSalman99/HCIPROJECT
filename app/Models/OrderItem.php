<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'variant_id', 'name', 'image', 'price', 'quantity', 'roamer_id', 'vendor_id', 'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function roamer()
    {
        return $this->belongsTo(User::class, 'roamer_id', 'id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function variants()
    {
        return $this->belongsTo(ProductVariation::class, 'variant_id', 'id');
    }

}
