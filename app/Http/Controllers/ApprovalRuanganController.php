<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use App\Models\Ormawa;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class ApprovalRuanganController extends Controller
{
    public function index() {
        $peminjamanRuangan = PeminjamanRuangan::paginate(10);
        $ormawa = Ormawa::all();

        $totalSeluruh = PeminjamanRuangan::all()->count();
        $totalReview = PeminjamanRuangan::where('status_peminjaman', 0)->count();
        $totalApprove = PeminjamanRuangan::where('status_peminjaman', 1)->count();
        $totalRejected = PeminjamanRuangan::where('status_peminjaman', 2)->count();
        return view ('approval.approvalruangan', compact('peminjamanRuangan', 'ormawa', 'totalReview', 'totalRejected', 'totalApprove', 'totalSeluruh'));
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
       'password' => 'required',
       'rejected_reason' => 'required'
    ]);

     if(!Hash::check($request->password, Auth::user()->password)){
        return redirect()->route('approvalruangan')
        ->with('error', 'Password Salah');
    }

    $peminjaman = PeminjamanRuangan::findOrFail($id);
    $peminjaman->status_peminjaman = 2;
    $peminjaman->rejected_by = auth()->id();
    $peminjaman->rejected_reason = $request->rejected_reason;
    $peminjaman->save();
   return redirect()->route('approvalruangan')
        ->with('success', 'Status peminjaman ruangan berhasil diperbarui.');
}
}
