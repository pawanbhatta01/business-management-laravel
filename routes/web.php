<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::prefix('manage')->middleware('auth')->name('admin.')->group(function () {
        Route::get('', [AdminController::class, 'index'])->name('dashboard');
        Route::get('users', [AdminController::class, 'users'])->name('users');
        Route::get('business', [AdminController::class, 'business'])->name('business');
        Route::get('testimonials', [AdminController::class, 'testimonials'])->name('testimonials');
        Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    });

    Route::get('', [BusinessController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('business', [BusinessController::class, 'manageBusinesses'])->name('manageBusinesses')->middleware('auth');
    Route::prefix('business')->middleware('auth')->name('business.')->group(function () {
        Route::get('{slug}/', [BusinessController::class, 'index'])->name('home');
        Route::get('{slug}/information', [BusinessController::class, 'information'])->name('information');
        Route::get('{slug}/schedule', [BusinessController::class, 'schedule'])->name('schedule');
        Route::get('{slug}/rating', [BusinessController::class, 'rating'])->name('rating');
        Route::get('{slug}/files', [BusinessController::class, 'files'])->name('files');
        Route::get('{slug}/pages', [BusinessController::class, 'pages'])->name('pages');
        Route::get('{slug}/add-page', [BusinessController::class, 'addPage'])->name('add-page');
        Route::post('{slug}/add-page', [BusinessController::class, 'storePage'])->name('store-page');
        Route::get('{slug}/edit-page/{page_slug}', [BusinessController::class, 'editPage'])->name('edit-page');
        Route::post('{slug}/edit-page/{page_slug}', [BusinessController::class, 'updatePage'])->name('update-page');
        Route::get('{slug}/menus', [BusinessController::class, 'menus'])->name('menus');
        Route::get('{slug}/services', [BusinessController::class, 'services'])->name('services');
        Route::get('{slug}/contacts', [BusinessController::class, 'contacts'])->name('contacts');
        Route::get('{slug}/settings', [BusinessController::class, 'settings'])->name('settings');
        Route::get('{slug}/about', [BusinessController::class, 'about'])->name('about');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('', [FrontendController::class, 'index'])->name('frontend.home');
Route::get('business', [FrontendController::class, 'businessSearch'])->name('frontend.business.search');
Route::prefix('business')->name('frontend.business.')->group(function () {
    Route::get('{slug}', [FrontendController::class, 'home'])->name('index');
    Route::get('{slug}/about', [FrontendController::class, 'about'])->name('about');
    Route::get('{slug}/services', [FrontendController::class, 'services'])->name('services');
    Route::get('{slug}/gallery', [FrontendController::class, 'gallery'])->name('gallery');
    Route::get('{slug}/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('{slug}/pages/{page_slug}', [FrontendController::class, 'pages'])->name('pages');
});
