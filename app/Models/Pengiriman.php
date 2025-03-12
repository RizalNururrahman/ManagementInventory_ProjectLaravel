<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'device_id',
        'user_name',
        'divisi',
        'kapal',
        'cabang',
        'status_pengiriman',
    ];

    // Relasi ke Device (satu pengiriman memiliki satu perangkat)
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
