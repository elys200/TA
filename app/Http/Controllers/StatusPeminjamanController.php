<?php namespace App\Http\Controllers;
use App\Models\PeminjamanRuangan;
use App\Models\Users;
use App\Models\Ormawa;
use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;
use Carbon\Carbon;



class StatusPeminjamanController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'permission:status_peminjaman_all']);
    }

    //barang//
    public function index(Request $request) {
        $query = PeminjamanBarang::query();

        if ( !auth()->user()->hasRole('admin')) {
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
        $user = $peminjaman->user;
        return view('statuspeminjaman.statuspeminjamanbarang.detailpeminjamanbarang', compact('peminjaman', 'user'));
    }

    public function editbarang($id) {
        $peminjaman = PeminjamanBarang::findOrFail(($id));
        $barang=$peminjaman->barang;
        $ormawa = Ormawa::all();
        $user = $peminjaman->user;

        if($peminjaman->status_peminjaman=='0') {
            return view('statuspeminjaman.statuspeminjamanbarang.editstatuspeminjamanbarang', compact('peminjaman', 'barang', 'ormawa', 'user'));
        }

        else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat diedit karena sudah disetujui.');
        }
    }

    public function updatepeminjaman(Request $request, $id) {
        $peminjaman = PeminjamanBarang::findOrFail($id);
          $request->validate([
        'nama_penanggung_jawab' => 'required|string',
        'nim' => 'required|string',
        'ormawa_id' => 'required|exists:ormawa,id',
        'tanggal_mulai_peminjaman' => 'required|date',
        'tanggal_selesai_peminjaman' => 'required|date|after:tanggal_mulai_peminjaman',
        'alasan_peminjaman' => 'required|string',
        'jumlah_barang' => 'required|integer|min:1'
        ], [
        'tanggal_selesai_peminjaman.after' => 'Tanggal selesai harus lebih besar dari tanggal mulai.'
        ]);
        
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

        if ( !auth()->user()->hasRole('admin')) {
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
        $users = $peminjaman->user;
        return view('statuspeminjaman.statuspeminjamanruangan.detailpeminjamanruangan', compact('peminjaman', 'users'));
    }

    public function edit($id) {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $barang=$peminjaman->barang;
        $user=$peminjaman->user;
        $ormawa = Ormawa::all();

        if($peminjaman->status_peminjaman=='0') {
            return view('statuspeminjaman.statuspeminjamanruangan.editstatuspeminjamanruangan', compact('peminjaman', 'barang', 'ormawa', 'user'));
        }

        else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat diedit karena sudah disetujui.');
        }
    }

    public function update(Request $request, $id)
{
    $peminjaman = PeminjamanRuangan::findOrFail($id);

    $tanggal = Carbon::parse($request->tanggal_peminjaman);
    $hari = $tanggal->dayOfWeek;

    $jamMulai = $request->jam_mulai;
    $jamSelesai = $request->jam_selesai;

    // ❌ Minggu tidak boleh
    if ($hari == 0) {
        return back()->withErrors([
            'jam_mulai' => 'Hari Minggu tidak boleh melakukan peminjaman'
        ])->withInput();
    }

    // 🟡 Sabtu
    if ($hari == 6) {
        if ($jamMulai < '08:00' || $jamSelesai > '17:00') {
            return back()->withErrors([
                'jam_mulai' => 'Hari Sabtu hanya boleh jam 08:00 - 17:00'
            ])->withInput();
        }
    }

    // 🟢 Senin - Jumat
    if ($hari >= 1 && $hari <= 5) {
        if ($jamMulai < '08:00' || $jamSelesai > '21:00') {
            return back()->withErrors([
                'jam_mulai' => 'Senin - Jumat hanya boleh jam 08:00 - 21:00'
            ])->withInput();
        }
    }

    // 🔍 Cek bentrok
    $exists = PeminjamanRuangan::where('id', '!=', $id)
        ->where('ruangan_id', $peminjaman->ruangan_id)
        ->where('tanggal_peminjaman', $request->tanggal_peminjaman)
        ->where('status_peminjaman', '!=', 2)
        ->where(function ($query) use ($jamMulai, $jamSelesai) {
            $query->whereBetween('jam_mulai', [$jamMulai, $jamSelesai])
                ->orWhereBetween('jam_selesai', [$jamMulai, $jamSelesai])
                ->orWhere(function ($q) use ($jamMulai, $jamSelesai) {
                    $q->where('jam_mulai', '<=', $jamMulai)
                      ->where('jam_selesai', '>=', $jamSelesai);
                });
        })
        ->exists();

    if ($exists) {
        return back()->withErrors([
            'jam_mulai' => 'Tanggal dan jam tersebut sudah digunakan'
        ])->withInput();
    }

    // ✅ baru update
    $peminjaman->update([
        'nama_penanggung_jawab'=> $request->nama_penanggung_jawab,
        'nim'=> $request->nim,
        'ormawa_id'=> $request->ormawa_id,
        'tanggal_peminjaman'=> $request->tanggal_peminjaman,
        'jam_mulai'=> $request->jam_mulai,
        'jam_selesai'=> $request->jam_selesai,
        'alasan_peminjaman'=> $request->alasan_peminjaman
    ]);

    return redirect()->route('statuspeminjamanruangan')
        ->with('success', 'Peminjaman berhasil diperbarui.');
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
