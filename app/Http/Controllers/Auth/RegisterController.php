<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register(request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'program_studi' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'ormawa' => 'required',
        ]);
    

    Users::create([
        'nim' => $request->nim,
        'nama_lengkap' => $request->nama_lengkap,
        'jurusan' => $request->jurusan,
        'program_studi' => $request->program_studi,
        'email' => $request->email,
        'ormawa' => $request->ormawa,
        'password' => Hash::make($request->password),
    ]);

    return back()->with('success', 'Registrasi berhasil, tunggu persetujuan admin.');

    }
}
