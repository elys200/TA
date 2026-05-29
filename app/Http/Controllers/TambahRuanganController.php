<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ruangan;

class TambahRuanganController extends Controller {
    public function  __construct(){
        $this->middleware(['auth', 'permission:kelola_ruangan_all']);
    }

    public function index() {
        $users = Users::all();
        $ruangan = Ruangan::all();
        return view('tambahruangan.tambahruangan', compact('users', 'ruangan'));
    }

    public function create() {
        $users = Users::role('pic_ruangan')->get();
        return view('tambahruangan.form', compact('users'));
    }

    public function store(Request $request) {
        $data=$request->validate([ 'nama_ruangan'=> 'required|string|max:255',
            'kode_ruangan'=> 'required|string|max:50|unique:ruangan,kode_ruangan',
            'lokasi'=> 'required|string|max:255',
            'deskripsi'=> 'nullable|string',
            'kapasitas'=> 'required|integer|min:1',
            'foto'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jam_operasional'=> 'required',
            'pic_id'=> 'nullable|exists:users,id',
            ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ruangan'), $filename);
            $data['foto'] = 'ruangan/' . $filename;
        }

        Ruangan::create($data);

        return redirect()->route('tambahruangan')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    public function detail($id) {
        $ruangan = Ruangan::findOrFail($id);
        return view('tambahruangan.detail', compact('ruangan'));
    }

    public function edit($id) {
        $ruangan = Ruangan::findOrfail($id);
        $users = Users::role('pic_ruangan')->get();
        return view('tambahruangan.edit', compact('ruangan', 'users'));
    }

    public function update(Request $request, $id) {
        $ruangan = Ruangan::findOrFail($id);

        $validate=$request->validate([ 'nama_ruangan'=> 'required|string|max:255',
            'kode_ruangan'=> 'required|string|max:50|unique:ruangan,kode_ruangan,'. $ruangan->id,
            'lokasi'=> 'required|string|max:255',
            'deskripsi'=> 'nullable|string',
            'kapasitas'=> 'required|integer|min:1',
            'foto'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jam_operasional'=> 'required',
            'pic_id'=> 'nullable|exists:users,id',
            ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ruangan'), $filename);
            $validate['foto'] = 'ruangan/' . $filename;
        }

        $ruangan->update($validate);

        return redirect()->route('tambahruangan')->with('success', 'Data ruangan berhasil diperbarui.');
    }

    public function destroy($id) {
        $ruangan  = Ruangan::findOrFail($id);
        $ruangan->delete();

        return redirect()->route('tambahruangan')->with('success', 'Data ruangan berhasil dihapus.');
    }
}
