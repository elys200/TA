<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ormawa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    public function register(Request $request) {
        $ormawa=Ormawa::all();
        Validator::make($request->all(), [ 
                'nim' => 'required|unique:users,nim',
                'nama_lengkap'=> 'required',
                'jurusan'=> 'required',
                'program_studi'=> 'required',
                'no_tlp' => 'required|unique:users,no_tlp',
                'password'=> 'required|min:6',
                'ormawa_id'=> 'required|exists:ormawa,id',
                ],
                [ 'nim.unique'=> 'NIM sudah digunakan!',
                   'no_tlp.unique' => 'Nomor Telpehone sudah digunakan!'
                ])->validate();
    
                Users::create([ 'nim'=> $request->nim,
                'nama_lengkap'=> $request->nama_lengkap,
                'jurusan'=> $request->jurusan,
                'program_studi'=> $request->program_studi,
                'no_tlp'=> $request->no_tlp,
                'ormawa_id'=> $request->ormawa_id,
                'password'=> Hash::make($request->password),
                ]);

        return redirect()->back() ->with('success', 'Registrasi berhasil! Tunggu Persetujuan dari Admin.');
    }
}
