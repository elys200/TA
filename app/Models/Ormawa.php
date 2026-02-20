<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Ormawa extends Model
{
    use HasFactory;
    
    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '0';

    protected $table = 'ormawa';
    protected $fillable = [
        'nama_ormawa',
        'singkatan',
        'jenis_ormawa',
        'status_ormawa',
        'tahun_berdiri',
        'foto_organisasi',
        'logo',
        'ketua',
        'email',
        'kontak',
        'pic_id',
        'deskripsi'
    ];

    public function barang()
    {
        return $this->hasMany(barang::class, 'ormawa_id');
    }
}
