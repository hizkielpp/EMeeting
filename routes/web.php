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
    Route::get('/', [AuthController::class, 'index'])->name('index');
    /**
     * Logout Routes
     */
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.perform');
    /** Laporan Route */
    Route::get('/riwayat_laporan', [LaporanController::class, 'riwayat_laporan'])->name('riwayat_laporan');
    Route::POST('/input_laporan', [LaporanController::class, 'input_laporan'])->name('input_laporan');
    Route::get('/hapus_file/{filename}', [LaporanController::class, 'hapus_file'])->name('hapus_file');
    /** Profile Route */
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
Route::get('lihat_notula', function () {
    return view('notula');
});
Route::get('print_notula', [LaporanController::class, 'print_laporan'])->name('print_notula');
Route::get('old_index', function () {
    return view('index');
});
Route::get('template', function () {
    return view('remake.template');
});
Route::put('ubah_password', [AuthController::class, 'ubah_password'])->name('ubah_password');
Route::get('edit_laporan', [LaporanController::class, 'edit_laporan'])->name('edit_laporan');
Route::put('update_laporan', [LaporanController::class, 'update_laporan'])->name('update_laporan');
