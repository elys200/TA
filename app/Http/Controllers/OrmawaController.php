<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ormawa;
use App\Models\Barang;
use App\Models\PeminjamanBarang;
use Illuminate\Support\Facades\File;

class OrmawaController extends Controller {
    public function __construct() {
        $this->middleware(['auth', 'role:admin|pic_barang']);
    }

    public function index() {
    $query = Ormawa::query();

    if (auth()->user()->hasRole('pic_barang')) {
        $query->where('pic_id', auth()->id());
    }

    if(auth()->user()->can('view_ormawa')) {
        $ormawa = $query->with('user')->get();
        $users = Users::all();

        return view('ormawa/ormawa', compact('ormawa', 'users'));
    } else {
        abort(403);
    }
}

    // FORM TAMBAH
    public function create() {
        if(auth()->user()->can('ormawa_all')) {
            $users = Users::role('pic_barang')->get();
            return view('ormawa.form', compact('users'));
        }

        else {
            abort(403);
        }
    }

    // SIMPAN DATA
    public function store(Request $request) {
        if(auth()->user()->can('ormawa_all')) {
            $validated=$request->validate([ 'nama_ormawa'=> 'required|string|unique:ormawa,nama_ormawa|max:255',
                'singkatan'=> 'required|string|unique:ormawa,singkatan|max:50',
                'jenis_ormawa'=> 'required|in:bem,himpunan,ukm',
                'status_ormawa'=> 'required|in:0,1',
                'tahun_berdiri'=> 'required|date',
                'foto_organisasi'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'logo'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'ketua'=> 'required|string|max:255',
                'email'=> 'required|email|unique:ormawa,email|max:255',
                'kontak'=> 'required|string|max:20',
                'pic_id'=> 'nullable|exists:users,id',
                'deskripsi'=> 'nullable|string',
                ]);

            // upload foto organisasi
            if ($request->hasFile('foto_organisasi')) {
                $file = $request->file('foto_organisasi');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/ormawa'), $filename);
                $validated['foto_organisasi'] = 'ormawa/' . $filename;
            }

            // upload logo
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/ormawa'), $filename);
                $validated['logo'] = 'ormawa/' . $filename;
            }

            Ormawa::create($validated);

            return redirect() ->route('ormawa') ->with('success', 'Ormawa berhasil ditambahkan.');
        }

        else {
            abort(401);
        }
    }

    public function detail($id) {
        if(auth()->user()->can('view_detail_ormawa')) {
            $ormawa = Ormawa::with('barang')->findOrFail($id);
            return view('ormawa.detail', compact('ormawa'));
        }

        else {
            abort(401);
        }
    }

    public function edit($id) {
        if(auth()->user()->can('ormawa_all')) {
            $ormawa = Ormawa::findOrFail($id);
            $users = Users::role('pic_barang')->get();
            return view('ormawa.edit', compact('ormawa', 'users'));
        }

        else {
            abort(401);
        }
    }

    public function update(Request $request, $id) {
        if(auth()->user()->can('ormawa_all')) {
            $ormawa = Ormawa::findOrFail($id);

            $validated=$request->validate([ 'nama_ormawa'=> 'required|string|unique:ormawa,nama_ormawa,'. $ormawa->id . '|max:255',
                'singkatan'=> 'required|string|unique:ormawa,singkatan,'. $ormawa->id . '|max:50',
                'jenis_ormawa'=> 'required|in:bem,himpunan,ukm',
                'status_ormawa'=> 'required|in:0,1',
                'tahun_berdiri'=> 'required|date',
                'foto_organisasi'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'logo'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'ketua'=> 'required|string|max:255',
                'email'=> 'required|email|unique:ormawa,email,'. $ormawa->id . '|max:255',
                'kontak'=> 'required|string|max:20',
                'pic_id'=> 'nullable|exists:users,id',
                'deskripsi'=> 'nullable|string',
                ]);

            // upload foto organisasi
            if ($request->hasFile('foto_organisasi')) {
                if ($ormawa->foto_organisasi) {
                    File::delete(public_path($ormawa->foto_organisasi));
                }
                $file = $request->file('foto_organisasi');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/ormawa'), $filename);
                $validated['foto_organisasi'] = 'ormawa/' . $filename;
            }

            // upload logo
            if ($request->hasFile('logo')) {
                if ($ormawa->logo) {
                    File::delete(public_path($ormawa->logo));
                }
                $file = $request->file('logo');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/ormawa'), $filename);
                $validated['logo'] = 'ormawa/' . $filename;
            }

            $ormawa->update($validated);

            return redirect() ->route('ormawa') ->with('success', 'Ormawa berhasil diperbarui.');
        }

        else {
            abort(401);
        }
    }

    public function destroy($id) {
        if(auth()->user()->can('ormawa_all')) {
            $ormawa = Ormawa::findOrFail($id);

            // hapus foto organisasi jika ada
            if ($ormawa->foto_organisasi) {
                File::delete(public_path($ormawa->foto_organisasi));
            }

            // hapus logo jika ada
            if ($ormawa->logo) {
                File::delete(public_path($ormawa->logo));
            }

            $ormawa->delete();

            return redirect() ->route('ormawa') ->with('success', 'Ormawa berhasil dihapus.');
        }

        else {
            abort(401);
        }
    }


    public function storeBarang(Request $request, $ormawa_id) {
        if(auth()->user()->can('barang_all')) {
            $validated=$request->validate([ 'nama_barang'=> 'required|string|max:255',
                'kode_barang'=> 'required|string|max:50|unique:barang,kode_barang',
                'deskripsi_barang'=> 'nullable|string',
                'jumlah_barang'=> 'required|integer|min:1',
                'kondisi_barang'=> 'required|string|max:50',
                'status_barang'=> 'required|boolean',
                'foto_barang'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                ]);

            $validated['ormawa_id']=$ormawa_id; // ambil dari route
            $validated['jumlah_barang']=(int) $validated['jumlah_barang'];
            $validated['status_barang']=(int) $validated['status_barang'];

            if ($request->hasFile('foto_barang')) {
                $file=$request->file('foto_barang');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/barang'), $filename);
                $validated['foto_barang'] = 'barang/' . $filename;
            }

            try {
                $barang = Barang::create($validated);
                return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
            }

            catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal menambahkan barang: '. $e->getMessage());
            }
        }

        else {
            abort(403);
        }
    }


    public function destroyBarang($id, $barangId) {
        if(auth()->user()->can('barang_all')) {
            $ormawa = Ormawa::findOrFail($id);
            $barang = Barang::where('ormawa_id', $id)->findOrFail($barangId);

            // hapus foto barang jika ada
            if ($barang->foto_barang) {
                Storage::disk('public')->delete($barang->foto_barang);
            }

            $barang->delete();

            return redirect() ->route('ormawa.detail', $ormawa->id) ->with('success', 'Barang berhasil dihapus dari Ormawa.');
        }

        else {
            abort(403);
        }
    }

    public function detailBarang($id, $barangId) {
        if(auth()->user()->can('barang_all')) {
            $ormawa = Ormawa::findOrFail($id);
            $barang = Barang::where('ormawa_id', $id)->findOrFail($barangId);
            $peminjaman = PeminjamanBarang::where('barang_id', $barangId) ->where('status_peminjaman', 1) ->paginate(10);

            return view('ormawa.detailbarang', compact('ormawa', 'barang', 'peminjaman'));
        }

        else {
            abort(403);
        }
    }

    public function updateBarang(Request $request, $id, $barangId) {
        if(auth()->user()->can('barang_all')) {
            $validated=$request->validate([ 'nama_barang'=> 'required|string|max:255',
                'kode_barang'=> 'required|string|max:50|unique:barang,kode_barang,'. $barangId,
                'deskripsi_barang'=> 'nullable|string',
                'jumlah_barang'=> 'required|integer|min:1',
                'kondisi_barang'=> 'required|string|max:50',
                'status_barang'=> 'required|boolean',
                'foto_barang'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                ]);

            $ormawa = Ormawa::findOrFail($id);
            $barang = Barang:: where('ormawa_id', $id)->findOrFail($barangId);

            if ($request->hasFile('foto_barang')) {
                if ($barang->foto_barang) {
                    File::delete(public_path($barang->foto_barang));
                }
                $file=$request->file('foto_barang');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/barang'), $filename);
                $validated['foto_barang'] = 'barang/' . $filename;
            }

            $validated['jumlah_barang']=(int) $validated['jumlah_barang'];
            $validated['status_barang']=(int) $validated['status_barang'];

            $barang->update($validated);

            return redirect()->route('ormawa.detail', $id)->with('success', 'Barang berhasil diperbarui.');
        }

        else {
            abort(403);
        }
    }

}