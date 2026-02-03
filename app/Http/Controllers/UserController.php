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

        $validate = $request->validate([
            'nim' => 'nullable|string|max:255|unique:users,nim,' . $users->id,
            'nama_lengkap' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'program_studi' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $users->id,
            'ormawa' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
        ]);

        $data = array_filter($validate, function ($value) {
            return !is_null($value);
        });

        $users->update($data);
        return redirect()->route('user')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $users = Users::findOrFail($id);
        $users->delete();
        return redirect()->route('user')->with('success', 'Data user berhasil dihapus.');
    }
}