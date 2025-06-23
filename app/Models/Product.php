<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'table_products';
    protected $fillable = ['name', 'image', 'description', 'price', 'stock'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_product');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_product');
    }
}

