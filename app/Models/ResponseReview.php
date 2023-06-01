<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'response',
        'rating_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->belongsTo(Rating::class);
    }

}
