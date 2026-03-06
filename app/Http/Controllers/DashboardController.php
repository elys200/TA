<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Users;
use App\Models\Ruangan;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('view_dashboard')){
        $ruangan = Ruangan::all();
        $barang = Barang::all();
        return view('dashboard', compact('ruangan', 'barang'));
        }else{
            abort(403, 'Unauthorized');
        }
    }
}
