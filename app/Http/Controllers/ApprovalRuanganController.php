<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use App\Models\Ormawa;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;
use App\Notifications\PeminjamanRuanganApprovalNotification;
use App\Notifications\PeminjamanRuanganRejectedNotification;

class ApprovalRuanganController extends Controller {
    public function __construct() {
        $this->middleware(['auth', 'role:admin|pic_ruangan']);
    }

    public function index() {
        $query = PeminjamanRuangan::query();
        if (auth()->user()->hasRole('pic_ruangan')) {
            $query->whereHas('ruangan', function ($q) {
                    $q->where('pic_id', auth()->id());
                }

            );
        }
        $peminjamanRuangan=$query->paginate(10);
        $ormawa=Ormawa::all();
        $totalSeluruh=$query->count();
        $totalReview=(clone $query)->where('status_peminjaman', 0)->count();
        $totalApprove=(clone $query)->where('status_peminjaman', 1)->count();
        $totalRejected=(clone $query)->where('status_peminjaman', 2)->count();

        return view('approval.approvalruangan',
            compact('peminjamanRuangan',
                'ormawa',
                'totalReview',
                'totalRejected',
                'totalApprove',
                'totalSeluruh'
            ));
    }

    public function detail($id) {
        $peminjamanRuangan = PeminjamanRuangan::find($id);
        $peminjamanRuangan = PeminjamanRuangan::with('approver')->findOrFail($id);
        $ormawa = Ormawa::all();
        $user=$peminjamanRuangan->user; // Mengambil data user yang melakukan peminjaman
        return view('approval.detailapprovalruangan', compact('peminjamanRuangan', 'ormawa', 'user'));
    }



    public function approval(Request $request, $id) {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        if ( !auth()->user()->hasRole('admin')) {
            if ($peminjaman->ruangan->pic_id !=auth()->id()) {
                abort(403, 'Anda tidak berhak approve ruangan ini');
            }
        }

        $request->validate([ 'password'=> 'required'
            ]);

        if( !Hash::check($request->password, Auth::user()->password)) {
            return redirect()->route('approvalruangan') ->with('error', 'Password Salah');
        }

        $peminjaman->status_peminjaman=1;
        $peminjaman->approved_by=auth()->id();
        $peminjaman->save();

        $user = $peminjaman->user;
         $user->notify(
        new PeminjamanRuanganApprovalNotification(
            "🔔 Peminjaman ruangan kamu dengan kode" . $peminjaman->code_peminjaman . "telah disetujui!",
            route('statuspeminjamanruangan') // arahkan ke halaman status
        )
    );

        return redirect()->route('approvalruangan') ->with('success', 'Status peminjaman ruangan berhasil diperbarui.');
    }

    public function rejected(Request $request, $id) {
        $request->validate([ 'password'=> 'required',
            'rejected_reason'=> 'required'
            ]);

        if( !Hash::check($request->password, Auth::user()->password)) {
            return redirect()->route('approvalruangan') ->with('error', 'Password Salah');
        }

        $peminjaman=PeminjamanRuangan::findOrFail($id);
        $peminjaman->status_peminjaman=2;
        $peminjaman->rejected_by=auth()->id();
        $peminjaman->rejected_reason=$request->rejected_reason;
        $peminjaman->save();

        $user = $peminjaman->user;
        $user->notify(
    new PeminjamanRuanganRejectedNotification(
        "🔔 Peminjaman ruangan kamu dengan kode " . $peminjaman->code_peminjaman . " DITOLAK!",
        route('statuspeminjamanruangan')
    )
);        
        return redirect()->route('approvalruangan') ->with('success', 'Status peminjaman ruangan berhasil diperbarui.');
    }
}
