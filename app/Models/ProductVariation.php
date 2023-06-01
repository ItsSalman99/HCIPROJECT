<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $fillable =['product_id','options','in_stock','price','s_price','p_price','qty','seller_sku'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
