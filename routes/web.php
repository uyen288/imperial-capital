<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FundController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::resource('funds', FundController::class)->only([
    'index',
    'show'
]);

Route::middleware('guest')->group(function() {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function() {
    Route::get('admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
