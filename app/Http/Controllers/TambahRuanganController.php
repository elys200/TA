<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ruangan;

class TambahRuanganController extends Controller {
    public function index() {
        $users=Users::all();
        $ruangan=Ruangan::all();
        return view('tambahruangan.tambahruangan', compact('users', 'ruangan'));
    }

    public function create() {
        $users=Users::all();
        return view('tambahruangan.form', compact('users'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'nama_ruangan'    => 'required|string|max:255',
        'kode_ruangan'    => 'required|string|max:50|unique:ruangan,kode_ruangan',
        'lokasi'          => 'required|string|max:255',
        'deskripsi'       => 'nullable|string',
        'kapasitas'       => 'required|integer|min:1',
        'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'jam_operasional' => 'required',
        'pic_id'          => 'nullable|exists:users,id',
    ]);

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('ruangan', 'public');
    }

    Ruangan::create($data);

    return redirect()->route('tambahruangan')->with('success', 'Ruangan berhasil ditambahkan.');
}

}
