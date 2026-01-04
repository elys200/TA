<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListPeminjamanRuanganController extends Controller
{
    public function index(){
        return view('listpeminjaman/ruangan/ruangan');
    }
}
