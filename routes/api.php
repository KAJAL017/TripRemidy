<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TboController;

Route::get('/test', function () {
    return response()->json(['message' => 'API routes are working!']);
});

Route::post('/hotels/search', [TboController::class, 'searchHotels']);

Route::post('/hotels/test-auth', [TboController::class, 'testAuthenticate']);

Route::get('/hotels/show-countries', [TboController::class, 'showCountries']);

Route::post('/hotels/search', [TboController::class, 'searchHotels']);

Route::post('/hotels/get-hotel-info', [TboController::class, 'getHotelInfo']);

Route::post('/hotels/logout', [TboController::class, 'logout']);

Route::post('/hotels/GetAgencyBalance', [TboController::class, 'GetAgencyBalance']);

Route::post('/hotels/GetCityListIndia', [TboController::class, 'GetCityListIndia']);

Route::post('/hotels/TboHotelCodeList', [TboController::class, 'TboHotelCodeList']);

Route::post('hotels/TboHotelDetails', [TboController::class, 'TboHotelDetails']);







