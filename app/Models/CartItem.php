<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'cart_id',
        'customer_id',
        'product_id',
        'roamer_id',
        'vendor_id',
        'variant_id',
        'qty',
        'price',
        'sub_total',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function roamer(){
        return $this->belongsTo(User::class, 'roamer_id');
    }

}
