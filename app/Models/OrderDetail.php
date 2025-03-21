<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'course_id', 'course_name', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
