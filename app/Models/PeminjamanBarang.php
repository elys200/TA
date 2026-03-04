<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Barang;
use App\Models\Ormawa;
use App\Models\Users;

class PeminjamanBarang extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_barang';

    protected $fillable = [
        'nama_penanggung_jawab',
        'nim',
        'code_peminjaman',
        'tanggal_mulai_peminjaman',
        'tanggal_selesai_peminjaman',
        'alasan_peminjaman',
        'status_peminjaman',
        'ormawa_id',
        'user_id',
        'barang_id',
        'approved_by',
        'approve_at',
        'rejected_by',
        'rejected_at',
        'reason_rejected',
        'foto_pemberian',
        'waktu_pemberian',
        'given_by',
        'returned_by',
        'foto_pengembalian',
        'waktu_pengembalian',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function ormawa(){
        return $this->belongsTo(Ormawa::class);
    }

    public function barang(){
        return $this->belongsTo(Barang::class);
    }

     public function approver()
    {
        return $this->belongsTo(Users::class, 'approved_by',);
    }

    public function rejector()
    {
        return $this->belongsTo(Users::class, 'rejected_by',);
    }

    public function given()
    {
        return $this->belongsTo(Users::class, 'given_by');
    }

     public function returned()
    {
        return $this->belongsTo(Users::class, 'returned_by');
    }
}
