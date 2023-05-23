<?php

use App\Http\Controllers\BusinessController;
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
    return view('welcome');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('business', [BusinessController::class, 'manageBusinesses'])->name('manageBusinesses');

    Route::prefix('business')->name('business.')->group(function () {
        Route::get('{slug}/', [BusinessController::class, 'index'])->name('home');
        Route::get('{slug}/information', [BusinessController::class, 'information'])->name('information');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
