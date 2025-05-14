<?php

use App\Http\Controllers\FlaskAuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('pages.landing.index'); // folder 'pages/landing', file 'index.blade.php'
})->name('landing');

Route::resource('login', FlaskAuthController::class)->only(['index', 'store']);
    Route::get('logout', [FlaskAuthController::class, 'destroy'])->name('logout');

Route::resource('register', RegisterController::class)->only(['index', 'store']);

Route::middleware('flask.auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard.index');
    })->name('dashboard.index');
});

Route::get('/data-user', function () {
    return view('pages.data-user.index');
});

Route::get('/data-pasien', function () {
    return view('pages.data-pasien.index');
});

Route::get('/data-prediksi', function () {
    return view('pages.data-prediksi.index');
});


