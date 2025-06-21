<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['id_order', 'id_product', 'quantity', 'subtotal'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

