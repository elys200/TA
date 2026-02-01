<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusPeminjamanController extends Controller
{
    public function index() {
        return view ('statuspeminjaman.statuspeminjamanbarang.statuspeminjamanbarang');
    }
}
