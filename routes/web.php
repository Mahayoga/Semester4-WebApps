<?php

use App\Http\Controllers\FlaskAuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MenuPrediksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing.index'); // folder 'pages/landing', file 'index.blade.php'
})->name('landing');

Route::resource('login', FlaskAuthController::class)->only(['index', 'store']);
    Route::get('logout', [FlaskAuthController::class, 'destroy'])->name('logout');

    Route::resource('register', RegisterController::class)->only(['index', 'store']);

    Route::middleware('flask.auth')->group(function() {
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard.index');
        })->name('dashboard.index');
        Route::resource('data-user', UserController::class);
            Route::get('/data-user/all/data', [UserController::class, 'getData'])->name('data-user.getData');

    Route::resource('/data-pasien', PasienController::class);
        Route::get('/get/data-pasien', [PasienController::class, 'getDataPasien'])->name('pasien.getDataPasien');

    Route::resource('/data-prediksi', PrediksiController::class)->only(['index', 'show']);
});

Route::get('/admin/menu-prediksi', [MenuPrediksiController::class, 'index'])->name('menu.prediksi');

Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('laporan.index');



