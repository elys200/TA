<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Users as Authenticatable;


class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'jurusan',
        'program_studi',
        'email',
        'ormawa',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
