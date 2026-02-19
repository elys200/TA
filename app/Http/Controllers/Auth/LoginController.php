<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
    'nim'      => 'required|string',
    'password' => 'required|string',
]);


        $credentials['status'] = '1';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // 4️⃣ GAGAL LOGIN
        throw ValidationException::withMessages([
            'email' => 'Email / password salah atau akun non-aktif.',
        ]);

    }
}
