<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ruangan;

class RuanganController extends Controller {
    public function index() {
        $ruangan = Ruangan::all();
        return view ('ruangan/ruangan', compact('ruangan'));
    }

    public function detail($id){
        $ruangan = Ruangan::with('pic')->findOrFail($id);
        return view('ruangan.detail', compact('ruangan'));
    }

    public function form($id){
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.formruangan', compact('ruangan'));
    }
}
