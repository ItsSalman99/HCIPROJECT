<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRefund extends Model
{
    use HasFactory;

    protected $table = 'order_refunds';

    protected $fillable = [
        'order_id',
        'order_item_id',
        'customer_id',
        'image1',
        'image2',
        'type',
        'amount',
        'status',
        'description'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }


}
