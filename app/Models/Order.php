<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'NIK',
        'nama',
        'alamat',
        'nomer_whatsapp',
        'email',
        'price_range',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
