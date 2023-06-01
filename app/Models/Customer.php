<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'address',
        'country',
        'is_active',
        'province',
        'city',
        'phone',
        'password_otp',
        'provider_name',
        'provider_id'
    ];

    public function address(){
        return $this->hasMany(CustomerAddress::class);
    }

    public function order(){
        return $this->hasMany(Order::class, 'customer_id');
    }

}
