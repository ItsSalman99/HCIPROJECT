<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'total',
        'shipping'
    ];

    public function cart_items(){
        return $this->hasMany(CartItem::class);
    }

}
