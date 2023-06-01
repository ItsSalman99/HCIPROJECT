<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=['category_id','slug','name','image','active','bottom'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
