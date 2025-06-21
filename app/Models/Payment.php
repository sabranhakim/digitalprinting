<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'id_payment';
    protected $fillable = ['id_order', 'jenis_pembayaran', 'status_pembayaran', 'bukti_pembayaran', 'tanggal_pembayaran', 'amount'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}

