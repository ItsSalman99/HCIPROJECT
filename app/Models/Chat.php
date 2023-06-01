<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'sender_name',
        'receiver_id',
        'receiver_name',
        'msg',
        'is_read',
        'type'
    ];

}
