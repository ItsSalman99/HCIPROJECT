<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'shop_name', 'address', 'nearby_market', 'profits', 'contact1', 'contact2', 'contact3', 'contact4', 'holiday_mode', 'roamer_id'];


    public function roamer()
    {
        return $this->belongsTo(User::class);
    }
}
