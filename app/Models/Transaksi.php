<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Barang;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id', 'user_id', 'barang_id', 'waktu_sewa_mulai', 'waktu_sewa_selesai', 'status'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
