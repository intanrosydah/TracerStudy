<?php

use App\Http\Controllers\Alumni\FormAlumniController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
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

// authenticate
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// alumni
Route::prefix('form-alumni')->middleware('auth')->group(function () {
    Route::get('/', [FormAlumniController::class, 'index'])->name('form-alumni');
    Route::post('/store', [FormAlumniController::class, 'store'])->name('form-alumni.store');
});

