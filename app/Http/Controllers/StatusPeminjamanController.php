<?php

namespace App\Http\Controllers;
use App\Models\PeminjamanRuangan;

use Illuminate\Http\Request;

class StatusPeminjamanController extends Controller
{
    public function index() {
        return view ('statuspeminjaman.statuspeminjamanbarang.statuspeminjamanbarang');
    }

    public function indexRuangan() {
        $peminjamanRuangan = PeminjamanRuangan::all();
        return view ('statuspeminjaman.statuspeminjamanruangan.statuspeminjamanruangan');
    }

}
