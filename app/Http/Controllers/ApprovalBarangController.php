<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanBarang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApprovalBarangController extends Controller
{
    public function index() {
        $peminjaman = PeminjamanBarang::paginate(10);

        $totalSeluruh = PeminjamanBarang::all()->count();
        $totalReview = PeminjamanBarang::where('status_peminjaman', 0)->count();
        $totalApprove = PeminjamanBarang::where('status_peminjaman', 1)->count();
        $totalRejected = PeminjamanBarang::where('status_peminjaman', 2)->count();
        return view ('approval.approvalbarang', compact('peminjaman', 'totalApprove', 'totalRejected', 'totalReview', 'totalSeluruh'));
    }

    public function detail($id){
        $peminjaman = PeminjamanBarang::findOrFail($id);
        return view('approval.detailapprovalbarang', compact('peminjaman'));
    }

    public function approval(Request $request, $id)
{
    $request->validate([
        'password' => 'required'
    ]);

    if(!Hash::check($request->password, Auth::user()->password)){
        return redirect()->route('approvalbarang')
        ->with('error', 'Password Salah');
    }

    $peminjaman = PeminjamanBarang::findOrFail($id);
    $peminjaman->status_peminjaman = 1;
    $peminjaman->approved_by = auth()->id();
    $peminjaman->save();

    return redirect()->route('approvalbarang')
        ->with('success', 'Status peminjaman barang berhasil diperbarui.');
}

public function rejected(Request $request, $id){
    $request->validate([
       'password' => 'required',
       'rejected_reason' => 'required'
    ]);

     if(!Hash::check($request->password, Auth::user()->password)){
        return redirect()->route('approvalbarang')
        ->with('error', 'Password Salah');
    }

    $peminjaman = PeminjamanBarang::findOrFail($id);
    $peminjaman->status_peminjaman = 2;
    $peminjaman->rejected_by = auth()->id();
    $peminjaman->rejected_reason = $request->rejected_reason;
    $peminjaman->save();
   return redirect()->route('approvalbarang')
        ->with('success', 'Status peminjaman barang berhasil diperbarui.');
}

 public function given(Request $request, $id)
{
    $request->validate([
        'password' => 'required',
        'foto_pemberian' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if (!Hash::check($request->password, Auth::user()->password)) {
        return redirect()->route('kunci')
            ->with('error', 'Password Salah');
    }

    $peminjaman = PeminjamanBarang::findOrFail($id);

    // Simpan file ke storage
    $file = $request->file('foto_pemberian');
    $path = $file->store('foto_pemberian', 'public');

    $peminjaman->given_by = auth()->id();
    $peminjaman->foto_pemberian = $path;
    $peminjaman->waktu_pemberian = now();
    $peminjaman->save();

    return redirect()->route('approvalbarang.detail', $id)
        ->with('success', 'Data berhasil diperbaharui');
}

public function return(Request $request, $id){
    $request->validate([
        'password' => 'required',
        'foto_pengembalian' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

     if (!Hash::check($request->password, Auth::user()->password)) {
        return redirect()->route('kunci')
            ->with('error', 'Password Salah');
    }

    $peminjaman = PeminjamanBarang::findOrFail($id);
    $file = $request->file('foto_pengembalian');
    $path = $file->store('foto_pengembalian', 'public');

    $peminjaman->returned_by = auth()->id();
    $peminjaman->foto_pengembalian = $path;
    $peminjaman->waktu_pengembalian = now();
    $peminjaman->save();

    return redirect()->route('approvalbarang.detail', $id)
        ->with('success', 'Data berhasil diperbaharui');

}
}
