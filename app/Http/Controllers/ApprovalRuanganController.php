<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use App\Models\Ormawa;

class ApprovalRuanganController extends Controller
{
    public function index() {
        $peminjamanRuangan = PeminjamanRuangan::all();
        $ormawa = Ormawa::all();
        return view ('approval.approvalruangan', compact('peminjamanRuangan', 'ormawa'));
    }

    public function detail($id){
        $peminjamanRuangan = PeminjamanRuangan::find($id);
        $ormawa = Ormawa::all();
        $user = $peminjamanRuangan->user; // Mengambil data user yang melakukan peminjaman
        return view('approval.detailapprovalruangan', compact('peminjamanRuangan', 'ormawa', 'user'));
    }
}
