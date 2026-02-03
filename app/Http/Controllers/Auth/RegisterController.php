<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'nim' => 'required|unique:users,nim',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'program_studi' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'ormawa' => 'required',
        ])->validateWithBag('register');

        Users::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan' => $request->jurusan,
            'program_studi' => $request->program_studi,
            'email' => $request->email,
            'ormawa' => $request->ormawa,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()
            ->with('success', 'Registrasi berhasil! Tunggu Persetujuan dari Admin.');
    }
}
