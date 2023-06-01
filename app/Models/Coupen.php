<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupen extends Model
{
    protected $fillable = [
        'coupen_name',
        'coupen_code',
        'discount',
        'total_users',
        'coupen_users_used',
        'total_uses',
        'expiry',
        'status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
