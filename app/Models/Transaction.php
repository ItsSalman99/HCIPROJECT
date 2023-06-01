<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['order_id', 'product_id', 'user_id', 'debit','credit', 'reason'];


    public function roamer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
