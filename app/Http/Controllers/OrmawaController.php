<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ormawa;

class OrmawaController extends Controller
{
    public function index(){
        $ormawa = Ormawa::all();
        $users = Users::all();
        return view('ormawa/ormawa', compact('ormawa', 'users'));
    }
    // FORM TAMBAH
    public function create()
    {
        $users = Users::all();
        return view('ormawa.form', compact('users'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ormawa' => 'required|string|unique:ormawa,nama_ormawa|max:255',
            'singkatan' => 'required|string|unique:ormawa,singkatan|max:50',
            'jenis_ormawa' => 'required|in:bem,himpunan,ukm',
            'status_ormawa' => 'required|in:0,1',
            'tahun_berdiri' => 'required|date',
            'foto_organisasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ketua' => 'required|string|max:255',
            'email' => 'required|email|unique:ormawa,email|max:255',
            'kontak' => 'required|string|max:20',
            'pic_id' => 'nullable|exists:users,id',
            'deskripsi' => 'nullable|string',
        ]);

        // upload foto organisasi
        if ($request->hasFile('foto_organisasi')) {
            $validated['foto_organisasi'] =
                $request->file('foto_organisasi')->store('ormawa', 'public');
        }

        // upload logo
        if ($request->hasFile('logo')) {
            $validated['logo'] =
                $request->file('logo')->store('ormawa', 'public');
        }

        Ormawa::create($validated);

        return redirect()
            ->route('ormawa')
            ->with('success', 'Ormawa berhasil ditambahkan.');
    }
}
