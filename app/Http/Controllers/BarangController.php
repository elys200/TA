<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Ormawa;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view ('barang/barang', compact('barang'));
    }

    public function detail($id){
        $barang = Barang::findOrFail($id);
        $ormawa_id = Ormawa::all();
        return view('barang.detail', compact('barang'));
    }

    public function form($id){
        $barang = Barang::findOrFail($id);
        $ormawa = Ormawa::all();
        return view('barang.form', compact('barang', 'ormawa'));
    }

}
