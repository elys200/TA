<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ruangan;

class RuanganController extends Controller {
    public function index() {
        return view ('ruangan/ruangan');
    }

    public function create() {
        $users=Users::all();
        return view('tambahruangan.form', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([ 'nama_ruangan'=> 'required|string|max:255',
            'kode_ruangan'=> 'required|string|max:50|unique:ruangan,kode_ruangan',
            'lokasi'=> 'required|string|max:255',
            'deskripsi'=> 'nullable|string',
            'kapasitas'=> 'required|integer|min:1',
            'foto'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jam_operasional'=> 'required',
            'pic_id'=> 'nullable|exists:users,id',
            ]);

        if ($request->hasFile('foto')) {
            $file=$request->file('foto');
            $filename=time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/ruangan', $filename);
            $request->merge(['foto'=> $filename]);
        }

        Ruangan::create($request->all());
        return redirect()->route('ruangan')->with('success', 'Ruangan berhasil ditambahkan.');
    }
}
