<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;

    protected $table ='ruangan';
    protected $fillable = [
        'nama_ruangan',
        'kode_ruangan',
        'lokasi',
        'deskripsi',
        'kapasitas',
        'foto',
        'jam_operasional', 
        'pic_id',   
    ];

    public function pic()
    {
        return $this->belongsTo(Users::class, 'pic_id');
    }
}
