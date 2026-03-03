<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Ruangan;

class DashboardController extends Controller
{
    public function index()
    {
        // if(auth()->user()->can('view_dashboard')){
        //    return view('dashboard');
        // }else{
        //     abort(403, 'Unauthorized');
        // }

        $ruangan = Ruangan::all();
        $barang = Barang::all();
        return view('dashboard', compact('ruangan', 'barang'));
    }
}
