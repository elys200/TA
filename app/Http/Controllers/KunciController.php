<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\PeminjamanRuangan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class KunciController extends Controller {
    public function __construct() {
        $this->middleware(['auth', 'permission:view_kunci']);
    }

    public function index () {
        $peminjamanRuangan = PeminjamanRuangan::with('ruangan') ->where('status_peminjaman', 1) ->paginate(10);

        $totalApproved = PeminjamanRuangan::where('status_peminjaman', 1)->count();
        $totalGiven = PeminjamanRuangan::whereNotNull('time_given')->count();
        $totalReturn = PeminjamanRuangan::whereNotNull('time_returned')->count();
        return view ('kunci/kunci', compact('peminjamanRuangan', 'totalApproved', 'totalGiven', 'totalReturn'));
    }

    public function detail($id) {
        $PeminjamanRuangan = PeminjamanRuangan::findOrFail($id);
        return view('kunci.detail', compact('PeminjamanRuangan'));
    }

    public function given(Request $request, $id) {
        if(auth()->user()->can('give_kunci')) {
            $request->validate([ 'password'=> 'required',
                'foto_pemberian'=> 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]);

            if ( !Hash::check($request->password, Auth::user()->password)) {
                return redirect()->route('kunci') ->with('error', 'Password Salah');
            }

            $peminjaman=PeminjamanRuangan::findOrFail($id)

            // Simpan file ke storage
            $file=$request->file('foto_pemberian');
            $path=$file->store('foto_pemberian', 'public');

            $peminjaman->given_by=auth()->id();
            $peminjaman->foto_pemberian=$path;
            $peminjaman->time_given=now();
            $peminjaman->save();

            return redirect()->route('kunci.detail', $id) ->with('success', 'Data berhasil diperbaharui');
        }

        else {
            abort(403);
        }
    }

    public function return(Request $request, $id) {
        if(auth()->user->can('return_kunci')) {
            $request->validate([ 'password'=> 'required',
                'foto_pengembalian'=> 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]);

            if ( !Hash::check($request->password, Auth::user()->password)) {
                return redirect()->route('kunci') ->with('error', 'Password Salah');
            }

            $peminjaman=PeminjamanRuangan::findOrFail($id);
            $file=$request->file('foto_pengembalian');
            $path=$file->store('foto_pengembalian', 'public');

            $peminjaman->returned_by=auth()->id();
            $peminjaman->foto_pengembalian=$path;
            $peminjaman->time_returned=now();
            $peminjaman->save();

            return redirect()->route('kunci.detail', $id) ->with('success', 'Data berhasil diperbaharui');
        }

        else {
            abort(403);
        }

    }
}
