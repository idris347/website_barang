<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\keluarController;
use App\Http\Controllers\masukController;
use App\Http\Controllers\planogramController;
use App\Http\Controllers\satuanController;
use App\Http\Controllers\statikController;
use App\Http\Controllers\umumController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('ubah_password{role}', [App\Http\Controllers\HomeController::class, 'ubah_password']);
Route::post('ubah_pass', [App\Http\Controllers\HomeController::class, 'ubah_pass']);

Route::resource('users', userController::class)->middleware('role: 1');
Route::middleware(['role: 2'])->group(function () {
    Route::resource('jeniss', jenisController::class);
    Route::resource('satuans', satuanController::class);
    Route::resource('barangs', barangController::class);
    Route::resource('masuks', masukController::class);
    Route::resource('keluars', keluarController::class);
    Route::resource('planograms', planogramController::class);

});
Route::resource('statiks', statikController::class);
Route::get('laporan_barang', [Controller::class, 'barang'])->name('barang.index');
Route::get('laporan_barang/filter', [Controller::class, 'filterBarang'])->name('barang.filter');
Route::get('laporan_masuk', [Controller::class, 'masuk'])->name('laporan_masuk');
Route::get('laporan_keluar', [Controller::class, 'keluar'])->name('laporan_keluar');
Route::get('cetak', [Controller::class, 'cetak']);
Route::get('cetak1',[Controller::class,'cetak1'])->name('cetak1');
Route::get('cetak2', [Controller::class, 'cetak2'])->name('cetak2');
Route::get('data_diri',[umumController::class,'data_diri']);
Route::get('galeri',[umumController::class,'galeri']);
Route::get('scan',[umumController::class,'scan']);
Route::get('scan2',[umumController::class,'scan2']);
Route::post('/store',[umumController::class,'store'])->name('store'); 
Route::get('log', [umumController::class, 'log'])->name('log');
Route::get('plan',[umumController::class,'plan']);
Route::get('/qrcode/{id_barang}',[umumController::class,'download'])->name('downloadQrCode');



