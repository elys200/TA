<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function index() {
        $users = Users::all();
        return view('user.user', compact('users'));
    }

    public function edit($id)
    {
        $users = Users::findOrFail($id);
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
{
    $users = Users::findOrFail($id);

    $request->validate([
        'nama_lengkap' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'jurusan' => 'required',
        'program_studi' => 'required',
        'nim' => 'required|unique:users,nim,' . $id,
        'ormawa' => 'required',
        'role' => 'nullable',
        'status' => 'nullable',
    ]);

    $data = array_filter(
        $request->only([
            'nama_lengkap',
            'email',
            'nim',
            'jurusan',
            'program_studi',
            'ormawa',
            'role',
            'status',
        ]),
        fn ($value) => $value !== null
    );

    dd($data); // 👈 TARUH DI SINI

    $users->update($data);

    return redirect()->route('user.index')->with('success', 'Data berhasil diupdate');
}

}
