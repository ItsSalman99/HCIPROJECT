<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    protected $fillable=[
        'compaign_name', 'compaign_start', 'compaign_end', 'registeration_start', 'registeration_end', 'off_percent', 'fix_amount', 'banner_img1', 'banner_img2'
    ];

    public function compaigncategory(){
        return $this->hasMany(CompaignCategory::class);
    }


     public function compaignproduct(){
        return $this->hasMany(CompaignProduct::class);
    }
}
