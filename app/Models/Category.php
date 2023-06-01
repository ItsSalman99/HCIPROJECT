<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seq_no',
        'slug',
        'image',
        'percentage',
        'active',
    ];


    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }

      public function compaigncategory(){
        return $this->hasMany(CompaignCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
