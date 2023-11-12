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



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/', function () {
    return redirect('/login');
});


Route::middleware(['auth', 'web'])->group(function () {

    $adminRoutes = [
        'jadwal-perjalanan',
        'data-perjalanan',
        'laporan-operasional',
        'data-tugas',
        'bus',
        'sopir',
        'kernet',
        'agen',
        'gaji',
        'komisi-agen',
    ];

    Route::get('/admin', [AdminController::class, 'index']);

    Route::prefix('/admin')->group(function () use ($adminRoutes) {
        foreach ($adminRoutes as $route) {
            Route::get('/' . $route, [AdminController::class, $route]);
        }
    });
});







Route::get('/agen', [\App\Http\Controllers\AgenController::class, 'index']);

Route::get('/sopir', [\App\Http\Controllers\SopirController::class, 'index']);

Route::get('/kernet', [\App\Http\Controllers\KernetController::class, 'index']);

Route::get('/debug', [DebugController::class,'index']);