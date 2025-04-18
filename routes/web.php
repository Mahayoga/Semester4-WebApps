<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', DashboardController::class)->only('index')->name('index', 'dashboard');
Route::resource('users', UsersController::class);