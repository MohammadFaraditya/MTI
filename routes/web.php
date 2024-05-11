<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DebugController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\DataPerjalananController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\AdminSopirController;
use App\Http\Controllers\AdminKernetController;
use App\Http\Controllers\AdminAgenController;
use App\Http\Controllers\AdminKomisiAgenController;
use App\Http\Controllers\AdminGajiController;
use App\Http\Controllers\AdminBusController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\AgenController;
use RealRashid\SweetAlert\Facades\Alert;

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



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/ubah-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('ShowChangePasswordForm');
Route::post('/ubah-password', [ChangePasswordController::class, 'changePassword'])->name('ChangePassword');

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/alert', function () {
    Alert::success('hello');
    return view('welcome');
});


Route::middleware(['auth', 'web'])->group(function () {

    // Admin Rute
    Route::get('/admin', [RuteController::class, 'index'])->name("admin");
    Route::get('/admin-addrute', [RuteController::class, 'addRute'])->name('AddRute');
    Route::post('/admin', [RuteController::class, 'StoreRute'])->name('StoreRute');
    Route::get('/admin-editrute/{ID_Rute}', [RuteController::class, 'EditRute'])->name('EditRute');
    Route::put('/admin/{ID_Rute}', [RuteController::class, 'update'])->name('UpdateRute');
    Route::delete("/admin/delete/{ID_Rute}", [RuteController::class, 'destroy'])->name('DestroyRute');
    Route::get('/admin/search-rute', [RuteController::class, 'Search'])->name('SearchRute');
    Route::get('/admin/lintar', [TugasController::class, 'Data'])->name('GetDataTugas');

    Route::prefix('/admin')->group(function () {

        // Admin Jadwal Perjalanan
        Route::get('/jadwal-perjalanan', [JadwalController::class, 'JadwalPerjalanan'])->name('index.jadwal');
        Route::prefix('/jadwal-perjalanan')->group(function () {
            Route::get('/addjadwal', [JadwalController::class, 'addJadwalPerjalanan']);
            Route::post('/storejadwal', [JadwalController::class, 'storeJadwal']);
            Route::get('/editjadwal/{ID_Jadwal}', [JadwalController::class, 'EditJadwal']);
            Route::put('/update/{ID_Jadwal}', [JadwalController::class, 'updateJadwal']);
            Route::delete('/delete/{ID_Jadwal}', [JadwalController::class, 'deleteJadwal']);
            Route::get('/search-jadwal', [JadwalController::class, 'search'])->name('search.jadwal');
        });

        // Admin Data Perjalanan
        Route::get('/data-perjalanan', [DataPerjalananController::class, 'DataPerjalanan'])->name('index.perjalanan');
        Route::prefix('/data-perjalanan')->group(function () {
            Route::get('/cek-hari', [DataPerjalananController::class, 'CekHari']);
            Route::get('/edit-data-perjalanan/{ID_DataPerjalanan}', [DataPerjalananController::class, 'EditDataPerjalanan']);
            Route::put('/update-data-perjalanan/{ID_DataPerjalanan}', [DataPerjalananController::class, 'UpdateDataPerjalanan']);
            Route::delete('/delete-data-perjalanan/{ID_DataPerjalanan}', [DataPerjalananController::class, 'DeleteDataPerjalanan']);
            Route::get('/search-perjalanan', [DataPerjalananController::class, 'search'])->name('search.perjalanan');
        });

        // Admin Laporan
        Route::get('/laporan-operasional', [AdminController::class, 'LaporanOperasional']);

        // Admin Tugas
        Route::get('/data-tugas', [AdminController::class, 'DataTugas']);

        // Admin Bus
        Route::get('/bus', [AdminBusController::class, 'index'])->name('index.adminBus');
        Route::prefix('/bus')->group(function () {
            Route::get('/add-bus', [AdminBusController::class, 'AddBus']);
            Route::post('/store-bus', [AdminBusController::class, 'StoreBus']);
            Route::get('/edit-bus/{ID_Bus}', [AdminBusController::class, 'EditBus']);
            Route::put('/update-bus/{ID_Bus}', [AdminBusController::class, 'UpdateBus']);
            Route::delete('/delete-bus/{ID_Bus}', [AdminBusController::class, 'DeleteBus']);
            Route::get('/searc-bus', [AdminBusController::class, 'Search'])->name('search.bus');
            Route::get('tes/seat', [AdminBusController::class, 'seat'])->name('seat');
        });

        // Admin Sopir
        Route::get('/sopir', [AdminSopirController::class, 'index'])->name('index.adminSopir');
        Route::prefix('/sopir')->group(function () {
            Route::get('/add-sopir', [AdminSopirController::class, 'AddSopir']);
            Route::post('/store-sopir', [AdminSopirController::class, 'storeSopir']);
            Route::get('/edit-sopir/{ID_Akun}', [AdminSopirController::class, 'EditSopir']);
            Route::put('/update-sopir/{ID_Akun}', [AdminSopirController::class, 'UpdateSopir']);
            Route::delete('/delete-sopir/{ID_Akun}', [AdminSopirController::class, 'DeleteSopir']);
            Route::get('/search-sopir', [AdminSopirController::class, 'search'])->name('search.sopir');
        });

        // Admin Kernet
        Route::get('/kernet', [AdminKernetController::class, 'index'])->name('index.adminKernet');
        Route::prefix('/kernet')->group(function () {
            Route::get('/add-kernet', [AdminKernetController::class, 'AddKernet']);
            Route::post('/store-kernet', [AdminKernetController::class, 'StoreKernet']);
            Route::get('/edit-kernet/{ID_Akun}', [AdminKernetController::class, 'EditKernet']);
            Route::put('/update-kernet/{ID_Akun}', [AdminKernetController::class, 'UpdateKernet']);
            Route::delete('delete-kernet/{ID_Akun}', [AdminKernetController::class, 'DeleteKernet']);
            Route::get('/search-kernet', [AdminKernetController::class, 'search'])->name('search.kernet');
        });

        // Admin Agen
        Route::get('/agen', [AdminAgenController::class, 'index'])->name('index.adminAgen');
        Route::prefix('/agen')->group(function () {
            Route::get('/add-agen', [AdminAgenController::class, 'AddAgen']);
            Route::post('/store-agen', [AdminAgenController::class, 'StoreAgen']);
            Route::get('/edit-agen/{ID_Akun}', [AdminAgenController::class, 'EditAgen']);
            Route::put('/update-agen/{ID_Akun}', [AdminAgenController::class, 'UpdateAgen']);
            Route::delete('/delete-agen/{ID_Akun}', [AdminAgenController::class, 'DeleteAgen']);
            Route::get('/search-agen', [AdminAgenController::class, 'search'])->name('search.agen');
        });

        // Admin Gaji
        Route::get('/gaji', [AdminGajiController::class, 'index']);
        Route::prefix('/gaji')->group(function () {
            Route::put('/update-pembayaran/{ID_Gaji}', [AdminGajiController::class, 'bayar']);
            Route::put('/ubah-gaji-sopir/{ID_Gaji}', [AdminGajiController::class, 'UbahGajiSopir']);
            Route::put('/ubah-gaji-kernet/{ID_Gaji}', [AdminGajiController::class, 'UbahGajiKernet']);
        });

        // Admin Komisi Agen
        Route::get('/komisi-agen', [AdminKomisiAgenController::class, 'index']);
        Route::prefix('komisi-agen')->group(function () {
            Route::put('/update-pembayaran/{ID_Komisi}', [AdminKomisiAgenController::class, 'bayar']);
            Route::put('/ubah-komisi-agen/{ID_GajiKomisi}', [AdminKomisiAgenController::class, 'UbahKomisi']);
        });
    });
});






// Front End Agen
Route::get('/agen', [AgenController::class, 'index']);
Route::prefix('/agen')->group(function () {
    Route::get('/cari-jadwal', [AgenController::class, 'cariJadwal'])->name('agenSearchJadwal');
});


// Front End Sopir
Route::get('/sopir', [\App\Http\Controllers\SopirController::class, 'index']);


// Front End Kernet
Route::get('/kernet', [\App\Http\Controllers\KernetController::class, 'index']);

Route::get('/debug', [DebugController::class, 'index']);
