<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCoupen extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'coupen_id',
        'count'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function coupen()
    {
        return $this->belongsTo(Coupen::class);
    }

}
