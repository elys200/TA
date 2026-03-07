<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ormawa;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class OrmawaController extends Controller {
    public function index() {
        if(auth()->user()->can('view_ormawa')){
        $ormawa=Ormawa::all();
        $users=Users::all();
        return view('ormawa/ormawa', compact('ormawa', 'users'));
        }
        else{
            abort(403, 'Unauthorized');
        }
    }

    // FORM TAMBAH
    public function create() {
        if(auth()->user()->can('ormawa_all')){
        $users=Users::all();
        return view('ormawa.form', compact('users'));
        }
        else{
          abort(403, 'Unathorized');
        }
    }

    // SIMPAN DATA
    public function store(Request $request) {
        if(auth()->user()->can('ormawa_all')){
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
            $validated['foto_organisasi']=$request->file('foto_organisasi')->store('ormawa', 'public');
        }

        // upload logo
        if ($request->hasFile('logo')) {
            $validated['logo']=$request->file('logo')->store('ormawa', 'public');
        }

        Ormawa::create($validated);

        return redirect() ->route('ormawa') ->with('success', 'Ormawa berhasil ditambahkan.');
        }
        else{
            abort(403, 'Unathorized');
        }
    }

    public function detail($id) {
        if(auth()->user()->can('view_detail_ormawa')){
        $ormawa=Ormawa::with('barang')->findOrFail($id);
        return view('ormawa.detail', compact('ormawa'));
        }
        else{
            abort(403, 'Unathprized');
        }
    }

    public function edit($id) {
        if(auth()->user()->can('ormawa_all')){
        $ormawa=Ormawa::findOrFail($id);
        $users=Users::all();
        return view('ormawa.edit', compact('ormawa', 'users'));
        }
        else{
            abort(403, 'Unauthorized');
        }
    }

    public function update(Request $request, $id) {
        if(auth()->user()->can('ormawa_all')){
        $ormawa=Ormawa::findOrFail($id);

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

            // hapus foto lama jika ada
            if ($ormawa->foto_organisasi) {
                Storage::disk('public')->delete($ormawa->foto_organisasi);
            }

            $validated['foto_organisasi']=$request->file('foto_organisasi')->store('ormawa', 'public');
        }

        // upload logo
        if ($request->hasFile('logo')) {

            // hapus logo lama jika ada
            if ($ormawa->logo) {
                Storage::disk('public')->delete($ormawa->logo);
            }

            $validated['logo']=$request->file('logo')->store('ormawa', 'public');
        }

        $ormawa->update($validated);

        return redirect() ->route('ormawa') ->with('success', 'Ormawa berhasil diperbarui.');
        }
        else{
            abort(403, 'Unathorized');
        }
    }

    public function destroy($id) {
        if(auth()->user()->can('ormawa_all')){
        $ormawa=Ormawa::findOrFail($id);

        // hapus foto organisasi jika ada
        if ($ormawa->foto_organisasi) {
            Storage::disk('public')->delete($ormawa->foto_organisasi);
        }

        // hapus logo jika ada
        if ($ormawa->logo) {
            Storage::disk('public')->delete($ormawa->logo);
        }

        $ormawa->delete();

        return redirect() ->route('ormawa') ->with('success', 'Ormawa berhasil dihapus.');
        }
        else{
            abort(403, 'Unathorized');
        }
    }


    public function storeBarang(Request $request, $ormawa_id) {
        if(auth()->user()->can('barang_all')){
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
            $path=$file->store('barang', 'public'); // storage/app/public/barang
            $validated['foto_barang']=$path;
        }

        try {
            $barang=Barang::create($validated);
            return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
        }

        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan barang: '. $e->getMessage());
        }
        }
        else{
            abort(403, 'Unathorized');
        }
    }


    public function destroyBarang($id, $barangId) {
        if(auth()->user()->can('barang_all')){
        $ormawa=Ormawa::findOrFail($id);
        $barang=Barang::where('ormawa_id', $id)->findOrFail($barangId);

        // hapus foto barang jika ada
        if ($barang->foto_barang) {
            Storage::disk('public')->delete($barang->foto_barang);
        }

        $barang->delete();

        return redirect() ->route('ormawa.detail', $ormawa->id) ->with('success', 'Barang berhasil dihapus dari Ormawa.');
        }
        else{
            abort(403, 'Unathorized');
        }
    }

    public function detailBarang($id, $barangId) {
        if(auth()->user()->can('barang_all')){
        $ormawa=Ormawa::findOrFail($id);
        $barang=Barang::where('ormawa_id', $id)->findOrFail($barangId);

        return view('ormawa.detailbarang', compact('ormawa', 'barang'));
        }
        else {
            abort(403, 'Unathorized');
        }
    }

    public function updateBarang(Request $request, $id, $barangId) {
        if(auth()->user()->can('barang_all')){
        $validated=$request->validate([
            'nama_barang'=> 'required|string|max:255',
            'kode_barang'=> 'required|string|max:50|unique:barang,kode_barang,'. $barangId,
            'deskripsi_barang'=> 'nullable|string',
            'jumlah_barang'=> 'required|integer|min:1',
            'kondisi_barang'=> 'required|string|max:50',
            'status_barang'=> 'required|boolean',
            'foto_barang'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $ormawa=Ormawa::findOrFail($id);
        $barang=Barang::where('ormawa_id', $id)->findOrFail($barangId);

        if ($request->hasFile('foto_barang')) {
            // hapus foto lama jika ada
            if ($barang->foto_barang) {
                Storage::disk('public')->delete($barang->foto_barang);
            }

            $file=$request->file('foto_barang');
            $path=$file->store('barang', 'public');
            $validated['foto_barang']=$path;
        }

        $validated['jumlah_barang']=(int) $validated['jumlah_barang'];
        $validated['status_barang']=(int) $validated['status_barang'];  

        $barang->update($validated);

        return redirect()->route('ormawa.detail', $id)->with('success', 'Barang berhasil diperbarui.');
        }
        else{
            abort(403, 'Unathorized');
        }
    }

}

