<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['id_customer', 'id_product', 'rating', 'comment', 'review_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

