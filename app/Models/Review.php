<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'table_reviews';
    protected $fillable = ['user_id', 'id_product', 'rating', 'comment', 'review_date'];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

