<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\DauSiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

//Route::get('mahasiswa/cetak_pdf/{nim}', [MahasiswaController::class, 'cetak_pdf'])->name('mahasiswa.cetak_pdf');




// Route::group(['middleware'=>['auth']],function(){
//  Route::resource('siswa', SiswaController::class);
//  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'ceklevel:1'])->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::get('/profile', [SiswaController::class,'profile'])->name('siswa.profile');
    // Route::get('/cetak/{siswa}', [SiswaController::class,'cetak'])->name('siswa.cetak');
    Route::prefix('daftar')->group(function () {
        Route::get('/', [SiswaController::class,'daftar'])->name('siswa.daftar');
        Route::resource('biaya', BiayaController::class);
        Route::resource('formulir', CalonSiswaController::class);
        Route::resource('daftar-ulang', DauSiswaController::class);
    });
    Route::get('pdf', [LaporanController::class,'siswaPdf']);
});

// Route::middleware(['auth', 'ceklevel:0'])->group(function () {
    //Admin
    Route::prefix('data')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('biaya', BiayaController::class);
        Route::resource('formulir', CalonSiswaController::class);
        Route::resource('daftar-ulang', DauSiswaController::class);
        Route::resource('admin', AdminController::class);
        Route::get('konfirmasi/{id}', [CalonSiswaController::class,'konfirmasi'])->name('formulir.konfirmasi');
    });
    Route::prefix('laporan')->group(function () {
        Route::get('biaya/pdf', [LaporanController::class,'biayaPdf']);
        Route::get('biaya/excel', [LaporanController::class,'biayaExcel']);
        Route::get('siswa/pdf', [LaporanController::class,'siswaPdf']);
        Route::get('siswa/excel', [LaporanController::class,'siswaExcel']);
        Route::get('daftar-ulang/pdf', [LaporanController::class,'dauPdf']);
        Route::get('daftar-ulang/excel', [LaporanController::class,'dauExcel']);
        Route::get('user/pdf', [LaporanController::class,'userPdf']);
        Route::get('user/excel', [LaporanController::class,'userExcel']);
        Route::get('admin/pdf', [LaporanController::class,'adminPdf']);
        Route::get('admin/excel', [LaporanController::class,'adminExcel']);
    });

    Route::get('/cetak', [HomeController::class,'cetak'])->name('cetak');
    Route::get('/data-admin', [AdminController::class, 'index']);
