<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DebugController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');;
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');;

Route::get('/', function () {
    return redirect('/admin');
});


Route::middleware(['auth', 'web'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::prefix('/admin')->group(function () {
        Route::get('/jadwal-perjalanan', [AdminController::class,'JadwalPerjalanan']);
        Route::get('/data-perjalanan', [AdminController::class,'DataPerjalanan']);
        Route::get('/laporan-operasional', [AdminController::class,'LaporanOperasional']);
        Route::get('/data-tugas', [AdminController::class,'DataTugas']);
        Route::get('/bus', [AdminController::class,'Bus']);
        Route::get('/sopir', [AdminController::class,'Sopir']);
        Route::get('/kernet', [AdminController::class,'Kernet']);
        Route::get('/agen', [AdminController::class,'Agen']);
        Route::get('/gaji', [AdminController::class,'Gaji']);
        Route::get('/komisi-agen', [AdminController::class,'KomisiAgen']);
    });
});







Route::get('/agen', [\App\Http\Controllers\AgenController::class, 'index']);

Route::get('/sopir', [\App\Http\Controllers\SopirController::class, 'index']);

Route::get('/kernet', [\App\Http\Controllers\KernetController::class, 'index']);

Route::get('/debug', [DebugController::class,'index']);