<?php

namespace App\Http\Controllers;
use App\Models\PeminjamanRuangan;
use App\Models\Users;
use App\Models\Ormawa;
use Illuminate\Http\Request;


class StatusPeminjamanController extends Controller
{
    //barang//
    public function index() {
        
        return view ('statuspeminjaman.statuspeminjamanbarang.statuspeminjamanbarang');
    }

    //ruangan//
    public function indexRuangan() {
        $peminjamanRuangan = PeminjamanRuangan::where('user_id', auth()->id())->get();
        return view ('statuspeminjaman.statuspeminjamanruangan.statuspeminjamanruangan', compact('peminjamanRuangan'));
    }

    public function detail($id) {
        $peminjaman = PeminjamanRuangan::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();
        $user = Users::all();
        return view('statuspeminjaman.statuspeminjamanruangan.detailpeminjamanruangan', compact('peminjaman'));
    }

    public function edit($id){
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $ruangan = $peminjaman->ruangan;
        $ormawa = Ormawa::all();
        if($peminjaman->status_peminjaman == '0') {
            return view('statuspeminjaman.statuspeminjamanruangan.editstatuspeminjamanruangan', compact('peminjaman', 'ruangan', 'ormawa'));
        } else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat diedit karena sudah disetujui.');
        }
    }

    public function update(Request $request, $id) {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
       $peminjaman->update([
       'nama_penanggung_jawab' => $request->nama_penanggung_jawab,
       'nim' => $request->nim,
       'ormawa_id' => $request->ormawa_id,
       'tanggal_peminjaman' => $request->tanggal_peminjaman,
       'jam_mulai' => $request->jam_mulai,
       'jam_selesai' => $request->jam_selesai,
    'alasan_peminjaman' => $request->alasan_peminjaman,
]);
        $peminjaman->save();

        return redirect()->route('statuspeminjamanruangan')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id) {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        if($peminjaman->status_peminjaman == '0') {
            $peminjaman->delete();
            return redirect()->route('statuspeminjamanruangan')->with('success', 'Peminjaman berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat dihapus karena sudah disetujui.'); 

        }
}
}
