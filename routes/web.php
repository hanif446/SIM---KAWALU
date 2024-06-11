<?php

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

Auth::routes([
    'register' => false
]);

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('homepage.home');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']],function(){
    //dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    //jabatan
    Route::get('/jabatan/select', [\App\Http\Controllers\JabatanController::class, 'select'])->name('jabatan.select');
    Route::resource('/jabatan', \App\Http\Controllers\JabatanController::class)->except(['show']);

    //golongan_gaji
    Route::get('/golongan-gaji/select', [\App\Http\Controllers\GolonganGajiController::class, 'select'])->name('golongan_gaji.select');
    Route::resource('/golongan-gaji', \App\Http\Controllers\GolonganGajiController::class)->except(['show']);

    //pegawai
    Route::get('/pegawai/select', [\App\Http\Controllers\PegawaiController::class, 'select'])->name('pegawai.select');
    Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);

    //roles
    Route::get('/roles/select', [\App\Http\Controllers\RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', \App\Http\Controllers\RoleController::class);

    //user
    Route::get('/user/select', [\App\Http\Controllers\UserController::class, 'select'])->name('user.select');
    Route::get('/user/change-password', [\App\Http\Controllers\UserController::class, 'change_password'])->name('user.change_password');
    Route::post('/user/update-password', [\App\Http\Controllers\UserController::class, 'update_password'])->name('user.update_password');
    Route::get('/user/edit-profil/{user}', [\App\Http\Controllers\UserController::class, 'edit_profil'])->name('user.edit_profil');
    Route::put('/user/update-profil/{user}', [\App\Http\Controllers\UserController::class, 'update_profil'])->name('user.update_profil');
    Route::resource('/user', \App\Http\Controllers\UserController::class);

    //gaji_pokok
    Route::get('/gaji-pokok/cetak/{gaji_pokok}', [\App\Http\Controllers\GajiPokokController::class, 'cetak'])->name('gaji-pokok.cetak');
    Route::resource('/gaji-pokok', \App\Http\Controllers\GajiPokokController::class);

    //gaji_ttp
    Route::get('/gaji-ttp/cetak/{gaji_ttp}', [\App\Http\Controllers\GajiTTPController::class, 'cetak'])->name('gaji-ttp.cetak');
    Route::resource('/gaji-ttp', \App\Http\Controllers\GajiTTPController::class);

    //data_gaji_pokok
    Route::resource('/data-gaji-pokok', \App\Http\Controllers\DataGajiPokokController::class);

    //data_gaji_ttp
    Route::resource('/data-gaji-ttp', \App\Http\Controllers\DataGajiTTPController::class);
});
