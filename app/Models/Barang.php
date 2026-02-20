<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table ='barang';
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'foto_barang',
        'deskripsi_barang',
        'jumlah_barang',
        'kondisi_barang',
        'status_barang',
        'ormawa_id',
    ];

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'ormawa_id');
    }
}
