<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Ruangan;
use App\Models\Ormawa;
use App\Models\PeminjamanRuangan;
use Carbon\Carbon;

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
        $ormawa = Ormawa::all();
        return view('ruangan.formruangan', compact('ruangan', 'ormawa'));
    }


   public function store(Request $request, $id)
{
    $ruangan = Ruangan::findOrFail($id);

    $validatedData = $request->validate([
        'nama_penanggung_jawab' => 'required|string',
        'nim' => 'required|string',
        'ormawa_id' => 'required|exists:ormawa,id',
        'tanggal_peminjaman' => 'required|date|after_or_equal:' . now()->addDays(2)->toDateString(),
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        'alasan_peminjaman' => 'required|string',
    ]);

    // Ambil tanggal & jam
    $tanggal = Carbon::parse($validatedData['tanggal_peminjaman']);
    $hari = $tanggal->dayOfWeek;

    $jamMulai = $validatedData['jam_mulai'];
    $jamSelesai = $validatedData['jam_selesai'];

    // 🔴 Minggu tidak boleh
    if ($hari == 0) {
        return back()
            ->withErrors(['tanggal_peminjaman' => 'Hari Minggu tidak tersedia untuk peminjaman'])
            ->withInput();
    }

    // 🟡 Sabtu (08:00 - 12:00)
    if ($hari == 6) {
        if ($jamMulai < '08:00' || $jamSelesai > '12:00') {
            return back()
                ->withErrors(['jam_mulai' => 'Hari Sabtu hanya boleh jam 08:00 - 12:00'])
                ->withInput();
        }
    }

    // 🟢 Senin - Jumat (08:00 - 17:00)
    if ($hari >= 1 && $hari <= 5) {
        if ($jamMulai < '08:00' || $jamSelesai > '17:00') {
            return back()
                ->withErrors(['jam_mulai' => 'Senin - Jumat hanya boleh jam 08:00 - 17:00'])
                ->withInput();
        }
    }

    if ($jamMulai >= $jamSelesai) {
        return back()
            ->withErrors(['jam_mulai' => 'Jam mulai harus lebih awal dari jam selesai'])
            ->withInput();
    }


    // ✅ Simpan data (di luar kondisi hari!)
    PeminjamanRuangan::create([
        'ruangan_id' => $ruangan->id,
        'user_id' => auth()->id(),
        'ormawa_id' => $validatedData['ormawa_id'],
        'nama_penanggung_jawab' => $validatedData['nama_penanggung_jawab'],
        'nim' => $validatedData['nim'],
        'tanggal_peminjaman' => $validatedData['tanggal_peminjaman'],
        'jam_mulai' => $validatedData['jam_mulai'],
        'jam_selesai' => $validatedData['jam_selesai'],
        'alasan_peminjaman' => $validatedData['alasan_peminjaman'],
        'status_peminjaman' => 0,
    ]);

    return redirect()->route('statuspeminjamanruangan')
        ->with('success', 'Peminjaman ruangan berhasil diajukan!');
}
}
