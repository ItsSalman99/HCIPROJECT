<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable=[
        'name'
    ];

     public function province(){
        return $this->hasMany(City::class);
    }
}
