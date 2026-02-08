<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Spatie\Permission\Models\Role;


class UserController extends Controller {
    public function index() {
        $users=Users::all();
        $roles=Role::all();
        return view('user.user', compact('users'));
    }

    public function edit($id) {
        $users=Users::findOrFail($id);
        $roles=Role::all();
        return view('user.edit', compact('users', 'roles'));
    }

    public function update(Request $request, $id) {
        $users=Users::findOrFail($id);

        $validate=$request->validate([ 'nim'=> 'nullable|string|max:255|unique:users,nim,'. $users->id,
            'nama_lengkap'=> 'nullable|string|max:255',
            'jurusan'=> 'nullable|string|max:255',
            'program_studi'=> 'nullable|string|max:255',
            'email'=> 'nullable|email|max:255|unique:users,email,'. $users->id,
            'ormawa'=> 'nullable|string|max:255',
            'role'=> 'nullable|exists:roles,name',
            'status'=> 'nullable|string|max:50',
            ]);

        $userData=collect($validate)->except('role')->toArray();
        $users->update($userData);

        // ✅ handle role pakai Spatie
        if ($request->filled('role')) {
            $users->syncRoles([$request->role]);
        }

        else {
            $users->syncRoles([]); // hapus semua role kalau kosong
        }

        return redirect() ->route('user') ->with('success', 'Data user & role berhasil diperbarui.');
    }

    public function destroy($id) {
        $users=Users::findOrFail($id);
        $users->delete();
        return redirect()->route('user')->with('success', 'Data user berhasil dihapus.');
    }

}
