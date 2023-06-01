<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
   protected $fillable=[
    'user_id','product_id','total_amount','type'
   ];

   public function customer(){
    return $this->belongsTo(Customer::class,'user_id','id');
   }
}
