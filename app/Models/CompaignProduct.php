<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaignProduct extends Model
{
    protected $fillable = [
        'user_id', 'compaign_id', 'product_id', 'product_status', 'compaign_price'
    ];

    public function compaign()
    {
        return $this->belongsTo(Compaign::class, 'compaign_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
