<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListPeminjamanController extends Controller
{
    public function index()
    {
        return view('listpeminjaman/listpeminjaman');
    }
}
