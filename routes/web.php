<?php use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KunciController;
use App\Http\Controllers\ListPeminjamanBarangController;
// use App\Http\Controllers\ListPeminjamanRuanganController;   
use App\Http\Controllers\StatusPeminjamanController;
use App\Http\Controllers\TambahRuanganController;
use App\Http\Controllers\ApprovalBarangController;
use App\Http\Controllers\ApprovalRuanganController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Ormawa;


// Login & Registrasi//
Route::get('/', function () {
    return redirect()->route('login'); // langsung redirect ke login
});
Route::get('/login', function () {
    $ormawa = Ormawa::all();
        return view('login', compact('ormawa'));
    }
);
Route::post('/login', [LoginController::class, 'login'])->name('login');

//Register//
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
        //Dashboard//
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        //Ruangan//
        Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan');
        Route::get('/ruangan/{id}', [RuanganController::class, 'detail'])->name('ruangan.detail');
        Route::get('/ruangan/{id}/form', [RuanganController::class, 'form'])->name('ruangan.form');
        Route::post('/ruangan/{id}/borang', [RuanganController::class, 'store'])->name('ruangan.borang');
        Route::get('/calendar-events/{ruangan}', [RuanganController::class, 'calendarEvents']);

        //Barang//
        Route::get('/barang', [BarangController::class, 'index'])->name('barang');
        Route::get('/barang/detail/{id}', [BarangController::class, 'detail'])->name('barang.detail');
        Route::get('/barang/{id}/form', [BarangController::class, 'form'])->name('barang.form');
        Route::post('/barang/{id}/borang', [BarangController::class, 'store'])->name('barang.borang');
        

        

        // Form Pemborangan Barang//
        Route::get('/listpeminjamanBarang/form', function () {
                return view('listpeminjaman.barang.form');
            }

        )->name('listpeminjamanbarang.form');

        //List Peminjaman//
        Route::get('/listpeminjamanbarang', [ListPeminjamanBarangController::class, 'index'])->name('listpeminjamanbarang');


        //Status Peminjaman//
        //Barang//
        Route::get('/statuspeminjamanbarang', [StatusPeminjamanController::class, 'index'])->name('statuspeminjamanbarang');
        Route::get('/statuspeminjamanbarang/{id}/detail', [StatusPeminjamanController::class, 'detailbarang'])->name('statuspeminjamanbarang.detail');
        Route::get('/statuspeminjamanbarang/editpeminjaman/{id}', [StatusPeminjamanController::class, 'editbarang'])->name('statuspeminjamanbarang.edit');
        Route::put('/statuspeminjamanbarang/updatepeminjaman/{id}', [StatusPeminjamanController::class, 'updatepeminjaman'])->name('statuspeminjaman.updatepeminjamanbarang');
        Route::delete('/statuspeminjamanbarang/deletepeminjaman/{id}', [StatusPeminjamanController::class, 'destroybarang'])->name('statuspeminjaman.deletepeminjamanbarang');

        Route::get('/statuspeminjamanbarang/detailbarang', function () {
                return view('statuspeminjaman.statuspeminjamanbarang.detailpeminjamanbarang');
            }

        )->name('statuspeminjaman.detailbarang');

        //Ruangan//
        Route::get('/statuspeminjamanruangan',[StatusPeminjamanController::class, 'indexRuangan'])->name('statuspeminjamanruangan');
        Route::get('/statuspeminjamanruangan/detailpeminjaman/{id}', [StatusPeminjamanController::class, 'detail'])->name('statuspeminjamanruangan.detailpeminjaman');
        Route::get('/statuspeminjamanruangan/editpeminjaman/{id}', [StatusPeminjamanController::class, 'edit'])->name('statuspeminjamanruangan.editpeminjaman');
        Route::put('/statuspeminjamanruangan/updatepeminjaman/{id}', [StatusPeminjamanController::class, 'update'])->name('statuspeminjamanruangan.updatepeminjaman');
        Route::delete('/statuspeminjamanruangan/deletepeminjaman/{id}', [StatusPeminjamanController::class, 'destroy'])->name('statuspeminjamanruangan.deletepeminjaman');

        // Route::get('/statuspeminjamanruangan/detailruangan', function () {
        //         return view('statuspeminjaman.statuspeminjamanruangan.detailpeminjamanruangan');
        //     }

        // )->name('statuspeminjamanruangan.detailruangan');

        //

        // Ormawa//
        Route::get('/ormawa', [OrmawaController::class, 'index'])->name('ormawa');
        Route::get('/ormawa/form', [OrmawaController::class, 'create'])->name('ormawa.form');
        Route::post('/ormawa/tambah', [OrmawaController::class, 'store'])->name('ormawa.tambah');
        Route::get('/ormawa/{id}', [OrmawaController::class, 'detail'])->name('ormawa.detail');
        Route::get('/ormawa/{id}/edit', [OrmawaController::class, 'edit'])->name('ormawa.edit');
        Route::put('/ormawa/{id}', [OrmawaController::class, 'update'])->name('ormawa.update');
        Route::delete('/ormawa/{id}', [OrmawaController::class, 'destroy'])->name('ormawa.destroy');

        Route::post('/ormawa/{id}/barang', [OrmawaController::class, 'storeBarang'])->name('ormawa.barang.store');
        Route::get('/ormawa/{id}/barang/{barangId}', [OrmawaController::class, 'detailBarang'])->name('ormawa.barang.detail');
        Route::put('/ormawa/{id}/barang/{barangId}', [OrmawaController::class, 'updateBarang'])->name('ormawa.barang.update');
        Route::delete('/ormawa/{id}/barang/{barangId}', [OrmawaController::class, 'destroyBarang'])->name('ormawa.barang.destroy');
        // Route::put('/ormawa/{id}/barang/{barangId}', [OrmawaController::class, 'updateBarang'])->name('ormawa.barang.update');
        // Route::delete('/ormawa/{id}/barang/{barangId}', [OrmawaController::class, 'destroyBarang'])->name('ormawa.barang.destroy');


        //User//
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        //Role//
        Route::get('/role', [RoleController::class, 'index'])->name('role');
        Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
        Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        Route::put('role/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('/role/{id}/permissions', [RoleController::class, 'permissions'])->name('role.permissions');

        Route::get('/role/edit', function () {
                return view('role.edit');
            }

        )->name('role.edit');
        Route::post('/role/{id}/permissions',
            [RoleController::class, 'updatePermissions'])->name('role.permissions.update');



        //Kunci//
        Route::get('/kunci', [KunciController::class, 'index'])->name('kunci');
        Route::get('/kunci/detail/{id}', [KunciController::class, 'detail'])->name('kunci.detail');
        Route::put('/kunci/{id}/given', [KunciController::class, 'given'])->name('kunci.given');
        Route::put('/kunci/{id}/return', [KunciController::class, 'return'])->name('kunci.return');

        
        // Route::get('/kunci/detail', function() {
        //         return view('kunci.detail');
        //     }

        // )->name('kunci.detail');

        //approval//
        //Barang//
        Route::get('/approvalbarang', [ApprovalBarangController::class, 'index'])->name('approvalbarang');
        Route::get('/approvalbarang/detail/{id}', [ApprovalBarangController::class, 'detail'])->name('approvalbarang.detail');
        Route::put('/approvalbarang/{id}/approve', [ApprovalBarangController::class, 'approval'])->name('approvalbarang.approval');
        Route::put('/approvalbarang/{id}/rejected', [ApprovalBarangController::class, 'rejected'])->name('approvalbarang.rejected');
        Route::put('/approvalbarang/{id}/given', [ApprovalBarangController::class, 'given'])->name('approvalbarang.given');
        Route::put('/approvalbarang/{id}/return', [ApprovalBarangController::class, 'return'])->name('approvalbarang.return');

        

        //Ruangan//
        Route::get('/approvalruangan', [ApprovalRuanganController::class, 'index'])->name('approvalruangan');
        Route::get('/approvalruangan/{id}/detail', [ApprovalRuanganController::class, 'detail'])->name('approvalruangan.detail');
        Route::put('/approvalruangan/{id}/approve', [ApprovalRuanganController::class, 'approval'])->name('approvalruangan.approval');
        Route::put('/approvalruangan/{id}/rejected', [ApprovalRuanganController::class, 'rejected'])->name('approvalruangan.rejected');

        // Route::get('/approvalruangan/detail', function () {
        //         return view('approval.detailapprovalruangan');
        //     }

        // )->name('approvalruangan.detail');
        //

        //Kelola Ruangan//
        Route::get('/tambahruangan', [TambahRuanganController::class, 'index'])->name('tambahruangan');
        Route::get('/tambahruangan/form', [TambahRuanganController::class, 'create'])->name('tambahruangan.form');
        Route::post('/tambahruangan/tambah', [TambahRuanganController::class, 'store'])->name('ruangan.store');
        Route::get('tambahruangan/{id}', [TambahRuanganController::class, 'detail'])->name('tambahruangan.detail');
        Route::get('/tambahruangan/{id}/edit', [TambahRuanganController::class, 'edit'])->name('tambahruangan.edit');
        Route::put('/tambahruangan/{id}', [TambahRuanganController::class, 'update'])->name('tambahruangan.update');
        Route::delete('/tambahruangan/{id}', [TambahRuanganController::class, 'destroy'])->name('tambahruangan.destroy');

        
    }

);
