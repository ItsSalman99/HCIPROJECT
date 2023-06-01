<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaignCategory extends Model
{
    protected $fillable=[
        'compaign_id','category_id'
    ];

    public function compaign(){
        return $this->belongsTo(Compaign::class,'compaign_id');
    }

      public function cateogry(){
        return $this->belongsTo(Category::class,'compaign_id');
    }
}
