<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;

class KunciController extends Controller
{
    public function index (){
       $peminjamanRuangan = PeminjamanRuangan::with('ruangan')
    ->where('status_peminjaman', 1)
    ->get();

    $totalApproved = PeminjamanRuangan::where('status_peminjaman', 1)->count();
    $totalGiven = PeminjamanRuangan::whereNotNull('time_given')->count();
    $totalReturn = PeminjamanRuangan::whereNotNull('time_returned')->count();
        return view ('kunci/kunci', compact('peminjamanRuangan', 'totalApproved', 'totalGiven', 'totalReturn'));
    }

    public function detail($id){
        $PeminjamanRuangan = PeminjamanRuangan::findOrFail($id);
        return view('kunci.detail', compact('PeminjamanRuangan'));
    }
}
