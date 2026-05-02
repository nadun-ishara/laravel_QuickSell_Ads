<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ModerationController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\PublicAdvertisementController;


Route::get('/', [PublicAdvertisementController::class, 'index'])->name('welcome');
Route::get('/search', [PublicAdvertisementController::class, 'search'])->name('public.search');
Route::get('/view-ad/{id}', [PublicAdvertisementController::class, 'show'])->name('public.ad.show');

Route::get('/auth/google', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [AdvertisementController::class, 'index'])->name('dashboard');
    Route::get('ads/{id}/edit', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::patch('ads/{id}', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::delete('ads/{id}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::post('/ads/store', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/ads/{id}', [AdvertisementController::class, 'show'])->name('advertisements.show');

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/moderation', [ModerationController::class, 'index'])->name('admin.moderation.index');
    Route::post('/admin/ads/{id}/approve', [ModerationController::class, 'approve'])->name('admin.ads.approve');
    Route::post('/admin/ads/{id}/reject', [ModerationController::class, 'reject'])->name('admin.ads.reject');

    Route::resource('categories', CategoryController::class);
    Route::resource('locations', LocationController::class);
});

Route::middleware(['auth', 'can_moderate'])->group(function () {
    Route::get('/moderation', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/ads/{ad}/approve', [AdminController::class, 'approve'])->name('ads.approve');
    Route::post('/ads/{ad}/reject', [AdminController::class, 'reject'])->name('ads.reject');
});

require __DIR__.'/auth.php';
