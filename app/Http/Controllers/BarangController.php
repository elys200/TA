<?php namespace App\Http\Controllers;

use App\Notifications\PeminjamanBarangNotification;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Ormawa;
use App\Models\PeminjamanBarang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;


class BarangController extends Controller {
    public function index() {
        if(auth()->user()->can('view_barang')) {
            $barang = Barang::all();
            return view ('barang/barang', compact('barang'));
        }

        else {
            abort(403);
        }
    }

    public function detail($id) {
        if(auth()->user()->can('view_barang')) {
            $barang = Barang::findOrFail($id);
            $ormawa_id = Ormawa::all();
            return view('barang.detail', compact('barang'));
        }

        else {
            abort(403);
        }
    }

    public function form($id) {
        if(auth()->user()->can('borang_barang')) {
            $barang = Barang::findOrFail($id);
            $ormawa = Ormawa::all();
            $user = Auth::user();
            return view('barang.form', compact('barang', 'ormawa', 'user'));
        }

        else {
            abort(403);
        }
    }

    public function generateKode($barang_id, $tanggal) {
        $barang = Barang::findOrFail($barang_id);

        // Ambil user login
        $user = Auth::user();
        $namaUser=strtoupper(str_replace(' ', '', $user->nama_lengkap));

        // Format tanggal
        $tanggalFormat = Carbon::parse($tanggal)->format('Ymd');

        // Hitung jumlah peminjaman di tanggal yang sama
        $count = PeminjamanBarang::where('barang_id', $barang_id) ->whereDate('tanggal_mulai_peminjaman', $tanggal) ->count();

        $urutan=str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        $kodeBarang=strtoupper(str_replace(' ', '', $barang->kode_barang));

        return $kodeBarang . '_'. $namaUser . '_'. $tanggalFormat . '_'. $urutan;
    }

    public function store(Request $request, $id) {
        if(auth()->user()->can('borang_barang')) {
            $barang = Barang::findOrFail($id);

            $validateData=$request->validate([ 'nama_penanggung_jawab'=> 'required|string',
                'nim'=> 'required|string',
                'ormawa_id'=> 'required|exists:ormawa,id',
                'tanggal_mulai_peminjaman' => [
                'required',
                'date',
                'after_or_equal:' . now()->addDays(2)->format('Y-m-d')
                ],
                'tanggal_selesai_peminjaman'=> 'required|date|after:tanggal_mulai_peminjaman',
                'alasan_peminjaman'=> 'required|string',
                'jumlah_barang'=> 'required|integer|min:1'
                ],
                 [
                'tanggal_mulai_peminjaman.after_or_equal' => 'Tanggal mulai peminjaman harus minimal 2 hari dari sekarang.',
                'tanggal_selesai_peminjaman.after' => 'Tanggal selesai peminjaman harus lebih besar dari tanggal mulai peminjaman.'
]
                );

            if ($validateData['jumlah_barang'] > $barang->jumlah_barang) {
                return back()->withErrors([ 'jumlah_barang'=> 'Stok tidak mencukupi'
                    ])->withInput();
            }

            DB::transaction(function () use ($validateData, $barang) {

                    $kode=$this->generateKode($barang->id,
                        $validateData['tanggal_mulai_peminjaman']);

                    PeminjamanBarang::create([ 'nama_penanggung_jawab'=> $validateData['nama_penanggung_jawab'],
                        'nim'=> $validateData['nim'],
                        'code_peminjaman'=> $kode,
                        'tanggal_mulai_peminjaman'=> $validateData['tanggal_mulai_peminjaman'],
                        'tanggal_selesai_peminjaman'=> $validateData['tanggal_selesai_peminjaman'],
                        'alasan_peminjaman'=> $validateData['alasan_peminjaman'],
                        'status_peminjaman'=> 0,
                        'ormawa_id'=> $validateData['ormawa_id'],
                        'user_id'=> auth()->id(),
                        'barang_id'=> $barang->id,
                        'jumlah_barang'=> $validateData['jumlah_barang']]);
                }

            );

            $pic=Users::find($barang->ormawa->pic_id);

            if ($pic) {
                $nama=auth()->user()->nama_lengkap;
                $namaBarang=$barang->nama_barang;

                $pic->notify(new PeminjamanBarangNotification("🔔 $nama meminjam barang $namaBarang",
                        route('approvalbarang')));
            }


            return redirect()->route('statuspeminjamanbarang') ->with('success', 'Peminjaman Barang berhasil dilakukan');
        }

        else {
            abort(403);
        }
    }

}
