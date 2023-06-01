<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=[
        'province_id','name'
    ];

    public function province(){
        return $this->belongsTo(Province::class,'province_id','id');
    }
}
