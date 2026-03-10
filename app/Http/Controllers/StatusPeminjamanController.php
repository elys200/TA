<?php namespace App\Http\Controllers;
use App\Models\PeminjamanRuangan;
use App\Models\Users;
use App\Models\Ormawa;
use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;



class StatusPeminjamanController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'permission:status_peminjaman_all']);
    }

    //barang//
    public function index(Request $request) {
        $query = PeminjamanBarang::query();
        if (!auth()->user()->hasRole('admin')) {
        $query->where('user_id', auth()->id());
        }

        if ($request->filled('status')) {
            $query->where('status_peminjaman', $request->status);
        }

        $peminjaman=$query->paginate(10)->withQueryString();
        $totalReview=PeminjamanBarang::where('status_peminjaman', 0)->count();
        $totalApprove=PeminjamanBarang::where('status_peminjaman', 1)->count();
        $totalRejected=PeminjamanBarang::where('status_peminjaman', 2)->count();
        return view ('statuspeminjaman.statuspeminjamanbarang.statuspeminjamanbarang', compact('peminjaman', 'totalReview',
                'totalApprove',
                'totalRejected'));
    }

    public function detailbarang($id) {
        $peminjaman = PeminjamanBarang::where('id', $id) ->where('user_id', auth()->id()) ->firstOrFail();
        return view('statuspeminjaman.statuspeminjamanbarang.detailpeminjamanbarang', compact('peminjaman'));
    }

    public function editbarang($id) {
        $peminjaman = PeminjamanBarang::findOrFail(($id));
        $barang=$peminjaman->barang;
        $ormawa = Ormawa::all();

        if($peminjaman->status_peminjaman=='0') {
            return view('statuspeminjaman.statuspeminjamanbarang.editstatuspeminjamanbarang', compact('peminjaman', 'barang', 'ormawa'));
        }

        else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat diedit karena sudah disetujui.');
        }
    }

    public function updatepeminjaman(Request $request, $id) {
        $peminjaman = PeminjamanBarang::findOrFail($id);
        $peminjaman->update([ 'nama_penanggung_jawab'=> $request->nama_penanggung_jawab,
            'nim'=> $request->nim,
            'ormawa_id'=> $request->ormawa_id,
            'tanggal_mulai_peminjaman'=> $request->tanggal_mulai_peminjaman,
            'tanggal_selesai_peminjaman'=> $request->tanggal_selesai_peminjaman,
            'alasan_peminjaman'=> $request->alasan_peminjaman,
            'jumlah_barang'=> $request->jumlah_barang]);
        $peminjaman->save();

        return redirect()->route('statuspeminjamanbarang')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroybarang($id) {
        $peminjaman = PeminjamanBarang::findOrFail($id);

        if($peminjaman->status_peminjaman=='0') {
            $peminjaman->delete();
            return redirect()->route('statuspeminjamanbarang')->with('success', 'Peminjaman berhasil dihapus.');
        }

        else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat dihapus karena sudah disetujui.');

        }
    }

    //ruangan//
    public function indexRuangan(Request $request) {
        $query = PeminjamanRuangan::query();
        if (!auth()->user()->hasRole('admin')) {
        $query->where('user_id', auth()->id());
        }
        
        if ($request->filled('status')) {
            $query->where('status_peminjaman', $request->status);
        }

        $peminjamanRuangan=$query->paginate(10)->withQueryString();
        $totalReview=PeminjamanBarang::where('status_peminjaman', 0)->count();
        $totalApprove=PeminjamanBarang::where('status_peminjaman', 1)->count();
        $totalRejected=PeminjamanBarang::where('status_peminjaman', 2)->count();
        return view ('statuspeminjaman.statuspeminjamanruangan.statuspeminjamanruangan', compact('peminjamanRuangan', 'totalReview',
                'totalApprove',
                'totalRejected'));
    }

    public function detail($id) {
        $peminjaman = PeminjamanRuangan::where('id', $id) ->where('user_id', auth()->id()) ->firstOrFail();
        $user = Users::all();
        return view('statuspeminjaman.statuspeminjamanruangan.detailpeminjamanruangan', compact('peminjaman'));
    }

    public function edit($id) {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $barang=$peminjaman->barang;
        $ormawa = Ormawa::all();

        if($peminjaman->status_peminjaman=='0') {
            return view('statuspeminjaman.statuspeminjamanruangan.editstatuspeminjamanruangan', compact('peminjaman', 'barang', 'ormawa'));
        }

        else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat diedit karena sudah disetujui.');
        }
    }

    public function update(Request $request, $id) {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $peminjaman->update([ 'nama_penanggung_jawab'=> $request->nama_penanggung_jawab,
            'nim'=> $request->nim,
            'ormawa_id'=> $request->ormawa_id,
            'tanggal_peminjaman'=> $request->tanggal_peminjaman,
            'jam_mulai'=> $request->jam_mulai,
            'jam_selesai'=> $request->jam_selesai,
            'alasan_peminjaman'=> $request->alasan_peminjaman,
            ]);
        $peminjaman->save();

        return redirect()->route('statuspeminjamanruangan')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id) {
        $peminjaman = PeminjamanRuangan::findOrFail($id);

        if($peminjaman->status_peminjaman=='0') {
            $peminjaman->delete();
            return redirect()->route('statuspeminjamanruangan')->with('success', 'Peminjaman berhasil dihapus.');
        }

        else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat dihapus karena sudah disetujui.');

        }
    }
}
