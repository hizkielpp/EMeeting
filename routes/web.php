<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\URL;

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
    Route::get('register', [AuthController::class, 'index_register'])->name('index_register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    /**
     * Login Routes
     */
    Route::get('login', [AuthController::class, 'index_login'])->name('index_login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    /** Monitor Route */
    // Get view of index to access monitor page
    Route::get('/', [AuthController::class, 'index'])->name('monitor');
    /** Logout Routes*/
    Route::get('logout', [AuthController::class, 'logout'])->name('logout.perform');
    /** Laporan Route */
    // Get View of create laporan
    Route::get('create_laporan', [LaporanController::class, 'create_laporan'])->name('create_laporan');
    // Get View of Log Laporan
    Route::get('log_laporan', [LaporanController::class, 'log_laporan'])->name('log_laporan');
    // Get View of Log Laporan from Pimpinan
    Route::get('log_laporan_pimpinan', [LaporanController::class, 'log_laporan_pimpinan'])->name('log_laporan_pimpinan');
    // Post method to create laporan
    Route::post('input_laporan', [LaporanController::class, 'input_laporan'])->name('input_laporan');
    // Get to delete file
    Route::get('delete_file/{filename}', [LaporanController::class, 'delete_file'])->name('delete_file');
    // Get view edit laporan
    Route::get('edit_laporan', [LaporanController::class, 'edit_laporan'])->name('edit_laporan');
    // Put method to update a laporan
    Route::put('update_laporan', [LaporanController::class, 'update_laporan'])->name('update_laporan');
    /** Profile Route */
    // Get view of change password
    Route::get('edit_password', [AuthController::class, 'edit_password'])->name('edit_password');
    // Put method to change password
    Route::put('update_password', [AuthController::class, 'update_password'])->name('update_password');

    // Users Route
    Route::get('users', [UserController::class, 'index'])->name('users');
    // Get view of change password
    Route::get('edit_user', [UserController::class, 'edit'])->name('edit_user');
    // Update of change password
    Route::put('update_user', [UserController::class, 'update'])->name('update_user');
    // Get view of change password
    Route::get('delete_user', [UserController::class, 'delete'])->name('delete_user');
    // Delete user using delete method
    Route::delete('destroy_user', [UserController::class, 'destroy'])->name('destroy_user');
    // Unit Route
    Route::get('units', [UnitController::class, 'index'])->name('units');
    // Get view to create unit
    Route::get('create_unit', [UnitController::class, 'create'])->name('create_unit');
    // Post method to create new unit
    Route::post('input_unit', [UnitController::class, 'input'])->name('input_unit');
    // Get view to edit unit
    Route::get('edit_unit', [UnitController::class, 'edit'])->name('edit_unit');
    // Put method to update a unit
    Route::put('update_unit', [UnitController::class, 'update'])->name('update_unit');
});
// Route to print notula of the laporan
Route::get('print_notula', [LaporanController::class, 'print_laporan'])->name('print_notula');
// Notula Template
Route::get('notula', function () {
    return view('remake.laporan.notula');
});

// force to https
// URL::forceScheme('https');
