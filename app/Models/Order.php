<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'table_orders';
    protected $primaryKey = 'id_order';
    protected $fillable = ['user_id', 'order_date', 'status_pengiriman', 'status_pembayaran', 'payment_date', 'total_amount'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_order');
    }
}

