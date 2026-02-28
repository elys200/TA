<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use App\Models\Ormawa;
use App\Models\Users;

class ApprovalRuanganController extends Controller
{
    public function index() {
        $peminjamanRuangan = PeminjamanRuangan::all();
        $ormawa = Ormawa::all();
        return view ('approval.approvalruangan', compact('peminjamanRuangan', 'ormawa'));
    }

    public function detail($id){
        $peminjamanRuangan = PeminjamanRuangan::find($id);
        $peminjamanRuangan = PeminjamanRuangan::with('approver')->findOrFail($id);
        $ormawa = Ormawa::all();
        $user = $peminjamanRuangan->user; // Mengambil data user yang melakukan peminjaman
        return view('approval.detailapprovalruangan', compact('peminjamanRuangan', 'ormawa', 'user'));
    }

  public function approval(Request $request, $id)
{
    $request->validate([
        'status_peminjaman' => 'required|in:1,2'
    ]);

    $peminjaman = PeminjamanRuangan::findOrFail($id);

    $peminjaman->update([
        'status_peminjaman' => $request->status_peminjaman,
        'approved_by' => auth()->id(),
    ]);

    return redirect()->route('approvalruangan')
        ->with('success', 'Status peminjaman ruangan berhasil diperbarui.');
}
}
