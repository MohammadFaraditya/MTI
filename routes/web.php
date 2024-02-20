<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DebugController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePasswordController;
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

Route::get('/ubah-password', [ChangePasswordController::class, 'showChangePasswordForm']);
Route::post('/ubah-password', [ChangePasswordController::class, 'changePassword']);

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/alert', function () {
    Alert::success('hello');
    return view('welcome');
});


Route::middleware(['auth', 'web'])->group(function () {

    // Admin Rute
    Route::get('/admin', [AdminController::class, 'index'])->name("admin");
    Route::get('/admin-addrute', [AdminController::class, 'addRute']);
    Route::post('/admin', [AdminController::class, 'StoreRute']);
    Route::get('/admin-editrute/{ID_Rute}', [AdminController::class, 'EditRute']);
    Route::put('/admin/{ID_Rute}', [AdminController::class, 'update']);
    Route::delete("/admin/delete/{ID_Rute}", [AdminController::class, 'destroy']);

    Route::prefix('/admin')->group(function () {

        // Admin Jadwal Perjalanan
        Route::get('/jadwal-perjalanan', [AdminController::class, 'JadwalPerjalanan']);
        Route::prefix('/jadwal-perjalanan')->group(function () {
            Route::get('/addjadwal', [AdminController::class, 'addJadwalPerjalanan']);
            Route::post('/storejadwal', [AdminController::class, 'storeJadwal']);
            Route::get('/editjadwal/{ID_Jadwal}', [AdminController::class, 'EditJadwal']);
            Route::put('/update/{ID_Jadwal}', [AdminController::class, 'updateJadwal']);
            Route::delete('/delete/{ID_Jadwal}', [AdminController::class, 'deleteJadwal']);
        });



        Route::get('/data-perjalanan', [AdminController::class, 'DataPerjalanan']);
        Route::get('/laporan-operasional', [AdminController::class, 'LaporanOperasional']);
        Route::get('/data-tugas', [AdminController::class, 'DataTugas']);
        Route::get('/bus', [AdminController::class, 'Bus']);
        Route::get('/sopir', [AdminController::class, 'Sopir']);
        Route::get('/kernet', [AdminController::class, 'Kernet']);
        Route::get('/agen', [AdminController::class, 'Agen']);
        Route::get('/gaji', [AdminController::class, 'Gaji']);
        Route::get('/komisi-agen', [AdminController::class, 'KomisiAgen']);
    });
});







Route::get('/agen', [\App\Http\Controllers\AgenController::class, 'index']);

Route::get('/sopir', [\App\Http\Controllers\SopirController::class, 'index']);

Route::get('/kernet', [\App\Http\Controllers\KernetController::class, 'index']);

Route::get('/debug', [DebugController::class, 'index']);
