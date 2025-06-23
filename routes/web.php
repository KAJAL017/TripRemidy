<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PackagesController;
use App\Http\Controllers\admin\HotelApiTempController;

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


// hotelApiTemp Routes Start
Route::get('/hotelApiTemp', [HotelApiTempController::class, 'index'])->name('hotelApiTemp.index');
Route::get('/visit-authenticate', [HotelApiTempController::class, 'showAuthenticatePage'])->name('hotelApiTemp.authenticate');
Route::get('/visitGetAgencyBalance', [HotelApiTempController::class, 'visitGetAgencyBalance'])->name('hotelApiTemp.visitGetAgencyBalance');
Route::get('/GetCountryList', [HotelApiTempController::class, 'visitGetCountryList'])->name('hotelApiTemp.visitGetCountryList');
Route::get('/GetCityListIndia', [HotelApiTempController::class, 'visitGetCityListIndia'])->name('hotelApiTemp.visitGetCityListIndia');
Route::get('/TboHotelCodeList', [HotelApiTempController::class, 'visitTboHotelCodeList'])->name('hotelApiTemp.visitTboHotelCodeList');
Route::get('/hotel/view/{hotel_code}', [HotelApiTempController::class, 'viewHotel'])->name('hotel.view');
Route::get('/hotel/hotelDetailsList', [HotelApiTempController::class, 'hotelDetailsList'])->name('hotel.hotelDetailsList');
// hotelApiTemp Routes end
