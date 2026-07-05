<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FundController as AdminFundController;
use App\Http\Controllers\Admin\PerformanceController as AdminPerformanceController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ──────────────────────────────────────────────────────────────

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::resource('funds', FundController::class)->only([
    'index',
    'show'
]);

// ─── Authentication Routes ──────────────────────────────────────────────────────

Route::middleware('guest')->group(function() {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function() {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});

// ─── Admin Routes ───────────────────────────────────────────────────────────────

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('funds', AdminFundController::class)->except(['show']);
    Route::resource('performances', AdminPerformanceController::class)->except(['show']);
    Route::resource('portfolios', AdminPortfolioController::class)->except(['show']);
    Route::resource('documents', AdminDocumentController::class)->except(['show']);

});
