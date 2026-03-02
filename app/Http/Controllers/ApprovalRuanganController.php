<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use App\Models\Ormawa;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ApprovalRuanganController extends Controller
{
    public function index() {
        $peminjamanRuangan = PeminjamanRuangan::all();
        $ormawa = Ormawa::all();

        $totalReview = PeminjamanRuangan::where('status_peminjaman', 0)->count();
        $totalApprove = PeminjamanRuangan::where('status_peminjaman', 1)->count();
        $totalRejected = PeminjamanRuangan::where('status_peminjaman', 2)->count();
        return view ('approval.approvalruangan', compact('peminjamanRuangan', 'ormawa', 'totalReview', 'totalRejected', 'totalApprove'));
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
        'password' => 'required'
    ]);

    if(!Hash::check($request->password, Auth::user()->password)){
        return redirect()->route('approvalruangan')
        ->with('error', 'Password Salah');
    }

    $peminjaman = PeminjamanRuangan::findOrFail($id);
    $peminjaman->status_peminjaman = 1;
    $peminjaman->approved_by = auth()->id();
    $peminjaman->save();

    return redirect()->route('approvalruangan')
        ->with('success', 'Status peminjaman ruangan berhasil diperbarui.');
}

public function rejected(Request $request, $id){
    $request->validate([
        'status_peminjaman' => 'required|in:2',
        'rejected_reason' => 'required|string'
    ]);

    $peminjaman = PeminjamanRuangan::findOrFail($id);

    $peminjaman->update([
        'status_peminjaman' => $request->status_peminjaman,
        'rejected_reason' => $request->rejected_reason
    ]);

   return redirect()->route('approvalruangan')
        ->with('success', 'Status peminjaman ruangan berhasil diperbarui.');
}
}
