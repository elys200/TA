<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Users extends Authenticatable
{
    use HasFactory, HasRoles;

    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '0';

    protected $guard_name = 'web';
    protected $table = 'users';

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'jurusan',
        'program_studi',
        'email',
        'ormawa',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
