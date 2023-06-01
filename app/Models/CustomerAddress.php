<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = [
        'customer_id', 'address'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
