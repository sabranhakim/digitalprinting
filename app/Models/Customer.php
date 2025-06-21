<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id_customer';
    protected $fillable = ['username', 'password', 'name', 'email', 'phone'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_customer');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_customer');
    }
}

