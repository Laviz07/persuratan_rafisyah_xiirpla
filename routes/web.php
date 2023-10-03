<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return redirect('/login');
// });

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/dashboard')->middleware('auth')->group(function () {

    Route::middleware(['auth'])->group(function () {


        Route::middleware(['isAdmin'])->group(function () { });
    });
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'indexCreate']);
Route::post('/user/tambah', [UserController::class, 'create']);
Route::get('/user/edit/{id}', [UserController::class, 'indexEdit']);
Route::post('/user/edit/{id}', [UserController::class, 'edit']);
Route::delete('/user/hapus/{id}', [UserController::class, 'delete']);

Route::get('/jenis_surat', [JenisSuratController::class, 'index']);
Route::get('/jenis_surat/tambah', [JenisSuratController::class, 'indexCreate']);
Route::get('/jenis_surat/edit/{id}', [JenisSuratController::class, 'indexEdit']);
Route::post('/jenis_surat/simpan', [JenisSuratController::class, 'store']);
Route::delete('/jenis_surat/hapus/{id}', [JenisSuratController::class, 'delete']);

Route::get('/surat', [SuratController::class, 'index']);
Route::get('/surat/tambah', [SuratController::class, 'indexCreate']);
Route::post('/surat/tambah', [SuratController::class, 'create']);
Route::delete('/surat/hapus/{id}', [SuratController::class, 'delete']);
