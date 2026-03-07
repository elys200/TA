<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
   
    public function login(Request $request)
{
    $credentials = $request->validate([
        'nim' => 'required|string',
        'password' => 'required|string',
    ]);

    // cari user berdasarkan NIM
    $user = Users::where('nim', $credentials['nim'])->first();

    // 1️⃣ NIM tidak ditemukan
    if (!$user) {
        return back()->with('error', 'NIM tidak terdaftar');
    }

    // 2️⃣ Status akun belum aktif
    if ($user->status != 1) {
        return back()->with('error', 'Akun belum aktif, Harap Kontak Admin');
    }

    // 3️⃣ Password salah
    if (!Hash::check($credentials['password'], $user->password)) {
        return back()->with('error', 'Password Salah');
    }

    // 4️⃣ Login berhasil
    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
}
}
