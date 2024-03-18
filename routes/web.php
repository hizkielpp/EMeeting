<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;

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



Route::group(['middleware' => ['guest']], function () {
    /**
     * Register Routes
     */
    Route::get('/register', [AuthController::class, 'index_register'])->name('index_register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    /**
     * Login Routes
     */
    Route::get('/login', [AuthController::class, 'index_login'])->name('index_login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    /** Index (Formulir Laporan) Route */
    Route::get('/', function () {
        return view('index');
    });
    /**
     * Logout Routes
     */
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.perform');
    /** Laporan Route */
    Route::get('/riwayatLaporan', function () {
        return view('riwayatLaporan');
    });
    Route::POST('/input_laporan', [LaporanController::class, 'input_laporan'])->name('input_laporan');

    Route::get('/hapus_file/{filename}', [LaporanController::class, 'hapus_file'])->name('hapus_file');
});
