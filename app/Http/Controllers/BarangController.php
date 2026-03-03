<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view ('barang/barang', compact('barang'));
    }

    public function detail($id){
        $barang = Barang::findOrFail($id);
        return view('barang.detail');
    }
}
