<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=['cover_image','image','name','roamer_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
