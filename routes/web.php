<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PackagesController;

Route::get('/admin',[AdminController::class,'login']);;
Route::post('/admin/process',[AdminController::class,'loginProcess'])->name('admin.login.process');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('packages', PackagesController::class);
});




Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('package/{slug}',[WebsiteController::class,'PackageView'])->name('package.view');
Route::get('contact-us',[WebsiteController::class,'contact'])->name('contact');
Route::get('about-us',[WebsiteController::class,'about'])->name('about');
Route::get('/hotels', [\App\Http\Controllers\HotelController::class, 'index']);
