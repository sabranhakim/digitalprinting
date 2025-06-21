<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'id_admin';
    protected $fillable = ['name', 'username', 'password'];
}

