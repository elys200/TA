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
}
