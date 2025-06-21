<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id_order';
    protected $fillable = ['id_customer', 'order_date', 'status_pengiriman', 'status_pembayaran', 'payment_date', 'total_amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
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

