<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller {
    public function login(Request $request) {
        
        $credentials=$request->validate([ 'nim'=> 'required|string',
            'password'=> 'required|string',
            ]);

        $user = Users::where('nim', $credentials['nim'])->first();

        if ( !$user) {
            return back()->with('error', 'NIM tidak terdaftar');
        }

        if ($user->status !=1) {
            return back()->with('error', 'Akun belum aktif, Harap Kontak Admin');
        }

        if ( !Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'Password Salah');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
    }
}
