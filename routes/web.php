<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminRegister;
use App\Http\Controllers\PengaduanController;
use App\Models\Pengaduan;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing', [
        'laporan' => Pengaduan::all(),
        'user' => User::all()
    ]);
});

Auth::routes();

// admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/admin/semua/laporan', [HomeController::class, 'laporanAdmin'])->name('laporan.admin');

    Route::get('/admin/validasi/laporan', [HomeController::class, 'laporanAdminValidasi'])->name('laporan.validasi');

    Route::get('/admin/selesai/laporan', [HomeController::class, 'laporanAdminSelesai'])->name('laporan.selesai');

    Route::post('/registerAdmin', [AdminRegister::class, 'register'])->name('admin.register');

    Route::get('/laporanDetail/{id_pengaduan}', [HomeController::class, 'detail'])->whereNumber('id_pengaduan')->name('detail.laporan');

    Route::post('/ajukan/{id_pengaduan}', [PengaduanController::class, 'ajukan'])->name('ajukan');

    Route::post('/hapus/validasi/{id_pengaduan}/{foto}', [PengaduanController::class, 'hapusValidasi'])->name('validasi.hapus');

    Route::post('/export/laporan/pdf', [PengaduanController::class, 'exportPDF'])->name('export.pdf');
});
// Route::middleware(['auth', 'user-access:admin'])->group(function () {

//     Route::get('/hapus/petugas/{id}', [AdminRegister::class, 'hapusPetugas'])->name('hapus.petugas');
// });

Route::middleware(['auth', 'user-access:petugas'])->group(function () {

    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');

    Route::get('/laporanPetugas', [HomeController::class, 'laporanPetugas'])->name('laporan.petugas');

    Route::get('/{id_pengaduan}', [HomeController::class, 'laporanDetailPetugas'])->name('laporan.detail.petugas');

    Route::post('/tanggapan{id_pengaduan}', [PengaduanController::class, 'tanggapan'])->name('tanggapan');

    Route::get('/petugas/tanggapan', [HomeController::class, 'laporanPetugasSelesai'])->name('laporan.petugas.selesai');

    Route::post('/tanggapan{id_pengaduan}', [PengaduanController::class, 'tanggapan'])->name('tanggapan');
});


Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [PengaduanController::class, 'index'])->name('laporan.user');

    Route::get('/laporanUser', [PengaduanController::class, 'index'])->name('laporan.user');

    Route::get('/laporan/gagal', [PengaduanController::class, 'laporanGagal'])->name('laporan.gagal');

    Route::post('/laporanUser', [PengaduanController::class, 'tambahLaporan'])->name('tambah.laporan');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/lihat/tanggapan/{id_tanggapan}', [PengaduanController::class, 'selesaiUser']);

    Route::get('/hapus/{id_pengaduan}/{foto}', [PengaduanController::class, 'hapusLaporan'])->name('hapus.laporan');

    Route::patch('update/laporan/{id_pengaduan}', [PengaduanController::class, 'update'])->name('update.laporan');
});
