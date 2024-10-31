<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'price_range',
        'gender',
        'name',
        'alamat',
        'nomer_whatsapp',
        'email',
    ];
}
