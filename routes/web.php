<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/homepage');
Route::redirect('/admin', '/admin/dashboard');

Route::controller(HomepageController::class)->group(function () {
    Route::get('/switchLanguage/{locale}', 'switchLanguage')->name('switch-language');
    Route::get('/homepage', 'homepage')->name('homepage');
    Route::get('/location', 'location')->name('location');
    Route::get('/location/{id}', 'locationDetail')->name('location-detail');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/destination/{id}', 'destinationDetail')->name('destination->detail');
});

Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'loginView')->name('login');
        Route::post('/login', 'login')->name('login.action');
    });
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout.action');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(DestinationController::class)->group(function () {
        Route::get('/destination', 'index')->name('index-destination');
        Route::post('/destination/store', 'store')->name('store-destination');
        Route::get('/destination/edit/{id}', 'edit')->name('edit-destination');
        Route::post('/destination/edit/{id}', 'update')->name('update-destination');
        Route::post('/destination/delete/{id}', 'delete')->name('delete-destination');
    });

    Route::controller(CityController::class)->group(function () {
        Route::get('/city', 'index')->name('index-city');
        Route::post('/city/store', 'store')->name('store-city');
        Route::get('/city/edit/{id}', 'edit')->name('edit-city');
        Route::post('/city/edit/{id}', 'update')->name('update-city');
        Route::post('/city/delete/{id}', 'delete')->name('delete-city');
    });

    Route::controller(GalleryController::class)->group(function () {
        Route::get('/gallery', 'index')->name('index-gallery');
        Route::get('/gallery/{id}', 'detail')->name('detail-gallery');
        Route::post('/gallery/store', 'store')->name('store-gallery');
        Route::post('/gallery/delete/{id}', 'delete')->name('delete-gallery');
    });

    Route::controller(FeedbackController::class)->group(function () {
        Route::get('/feedback', 'index')->name('index-feedback');
        Route::post('/feedback/store', 'store')->name('store-feedback');
        Route::get('/feedback/edit/{id}', 'edit')->name('edit-feedback');
        Route::post('/feedback/edit/{id}', 'update')->name('update-feedback');
        Route::post('/feedback/delete/{id}', 'delete')->name('delete-feedback');
    });
});
