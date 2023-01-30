<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewPowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChangePowerController;
use App\Http\Controllers\DashboardUdlController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardBeritaController;
use App\Http\Controllers\DashboardPasbarController;
use App\Http\Controllers\DashboardResponController;
use App\Http\Controllers\DashboardKeluhanController;
use App\Http\Controllers\DashboardPelangganController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenggunaController;

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

// Route All Have Access
Route::resource('/', HomeController::class)->only([
    'index'
]);
Route::resource('/news', NewsController::class)->only([
    'index', 'show'
]);
Route::resource('/about', AboutController::class)->only([
    'index'
]);




// Route Guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('daftar-acc');
});




// Route All Role
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});




// Route Role Pelanggan
Route::middleware('pelanggan')->group(function () {
    Route::resource('/new-power', NewPowerController::class)->only([
        'index', 'store'
    ]);
    Route::resource('/change-power', ChangePowerController::class)->only([
        'index', 'create', 'store'
    ]);
    Route::resource('/pengaduan', PengaduanController::class)->only([
        'index', 'store'
    ]);
    Route::resource('/pengguna', PenggunaController::class);
});




// Route Role Admin
Route::middleware('admin')->group(function () {
    Route::resource('/dashboard/berita', DashboardBeritaController::class);
    Route::resource('/dashboard/keluhan', DashboardKeluhanController::class)->only([
        'destroy', 'edit', 'index'
    ]);
    Route::resource('/dashboard/respon', DashboardResponController::class)->only([
        'store'
    ]);
    Route::resource('/dashboard/pasbar', DashboardPasbarController::class)->only([
        'index', 'update', 'destroy'
    ]);
    Route::resource('/dashboard/udl', DashboardUdlController::class)->only([
        'index', 'update', 'destroy'
    ]);
    Route::resource('/dashboard/pelanggan', DashboardPelangganController::class)->only([
        'index', 'destroy'
    ]);
    Route::resource('/dashboard/user', DashboardUserController::class)->only([
        'edit', 'update'
    ]);
});




// Route Pengalihan
Route::get('/home', function () {
    if (auth()->check()) {
        return redirect()->route('berita.index');
    } else {
        return redirect()->route('index');
    }
});
Route::get('/dashboard', function () {
    if (auth()->check()) {
        return redirect()->route('berita.index');
    } else {
        return redirect()->route('index');
    }
});
