<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function __construct() {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index() {
        $users = Users::paginate(10);
        $roles = Role::all();
        return view('user.user', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        return view('user.form', compact('roles'));;
    }

    public function store(Request $request)
{
    Validator::make($request->all(), [
        'nim'           => 'required|unique:users,nim',
        'nama_lengkap'  => 'required',
        'no_tlp'        => 'nullable|unique:users,no_tlp',
        'password'      => 'required|min:6',
        'role'          => 'required|exists:roles,name',
        'status'        => 'required|in:0,1',
        'jurusan'       => 'nullable',
        'program_studi' => 'nullable',
        'ormawa_id'     => 'nullable',
    ])->validate();

    $user = Users::create([
        'nim'           => $request->nim,
        'nama_lengkap'  => $request->nama_lengkap,
        'no_tlp'        => $request->no_tlp,
        'jurusan'       => $request->jurusan ?? null,
        'program_studi' => $request->program_studi ?? null,
        'ormawa_id'     => $request->ormawa_id ?? null,
        'password'      => Hash::make($request->password),
        'status'        => $request->status,
    ]);

    // Assign role Spatie
    $user->assignRole($request->role);

    return redirect()->route('user')
                     ->with('success', 'User berhasil ditambahkan!');
}

    public function edit($id) {
        $users = Users::findOrFail($id);
        $roles = Role::all();
        return view('user.edit', compact('users', 'roles'));
    }

    public function update(Request $request, $id) {
        $users = Users::findOrFail($id);

        $validate=$request->validate([ 'nim'=> 'nullable|string|max:255|unique:users,nim,'. $users->id,
            'nama_lengkap'=> 'nullable|string|max:255',
            'jurusan'=> 'nullable|string|max:255',
            'program_studi'=> 'nullable|string|max:255',
            'email'=> 'nullable|email|max:255|unique:users,email,'. $users->id,
            'ormawa'=> 'nullable|string|max:255',
            'role'=> 'nullable|exists:roles,name',
            'status'=> 'nullable|in:0,1',
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

        return redirect() ->route('user') ->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id) {
        $users = Users::findOrFail($id);
        $users->delete();
        return redirect()->route('user')->with('success', 'Data user berhasil dihapus.');
    }

}
