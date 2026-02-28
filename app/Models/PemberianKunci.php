<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemberianKunci extends Model
{
    use HasFactory;
    protected $table = 'pemberian_kunci';
    protected $fillable = [
        'peminjaman_ruangan_id',
        'diserahkan_oleh',
        'dikembalikan_oleh',
        'waktu_diambil',
        'waktu_dikembalikan',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanRuangan::class, 'peminjaman_ruangan_id');
    }

    public function penyerah()
    {
        return $this->belongsTo(User::class, 'diserahkan_oleh');
    }

    // Pamdal yang menerima kembali
    public function penerima()
    {
        return $this->belongsTo(User::class, 'dikembalikan_oleh');
    }
}
