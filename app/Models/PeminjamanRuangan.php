<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeminjamanRuangan extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_ruangan';
    protected $fillable = [
        'nama_penanggung_jawab',
        'nim',
        'tanggal_peminjaman',
        'jam_mulai',
        'jam_selesai',
        'alasan_peminjaman',
        'status_peminjaman',
        'ruangan_id',
        'user_id',
        'ormawa_id',
        'approved_by',
        'approved_at',
        'rejected_reason',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class);
    }

    public function approver()
    {
        return $this->belongsTo(Users::class,);
    }
}
