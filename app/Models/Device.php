<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'merk',
        'metode_pembelian',
        'quantity',
    ];

    // Relasi ke Pengiriman (satu perangkat bisa dikirim berkali-kali)
    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }
}
