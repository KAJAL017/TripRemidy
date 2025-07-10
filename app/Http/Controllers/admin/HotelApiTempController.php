<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use model
use App\Models\ApiHotelAuthentication;
use App\Models\ApiHotelCountry;
use App\Models\ApiHotelCityListIndia;
use App\Models\ApiHotelTboHotelCodeList;
use App\Models\ApiHotelHotelDetails;
use Carbon\Carbon;


class HotelApiTempController extends Controller
{
    public function index()
    {
        Log::info('HotelApiTemp index accessed');
        return view('hotelApiTemp.index');
    }

    public function showAuthenticatePage()
    {

        $deleted = ApiHotelAuthentication::where('fetched_at', '<', Carbon::now()->subDays(2))->delete();
        Log::info("2 days Old token entries deleted: $deleted");


        $auth = ApiHotelAuthentication::first();
        if ($auth) {
            return view('hotelApiTemp.pages.authenticate', compact('auth'));
        }
        Log::info('HotelApiTemp authenticate page accessed');
        return view('hotelApiTemp.pages.authenticate');
    }

    public function visitGetAgencyBalance()
    {
        return view('hotelApiTemp.pages.GetAgencyBalance');
    }

    public function visitGetCountryList()
    {
        $countries = ApiHotelCountry::orderBy('name', 'asc')->paginate(20);
        if ($countries->isEmpty()) {
            // Log::info('No countries found in HotelApiTemp visitGetCountryList');
            return view('hotelApiTemp.pages.GetCountryList', ['countries' => []]);
        }
        // Log::info('HotelApiTemp visitGetCountryList accessed', ['countries' => $countries]);
        return view('hotelApiTemp.pages.GetCountryList', compact('countries'));
    }
    public function visitGetCityListIndia()
    {
        $cities = ApiHotelCityListIndia::orderBy('city_name', 'asc')->paginate(20);
        if ($cities->isEmpty()) {
            // Log::info('No cities found in HotelApiTemp visitGetCityListIndia');
            return view('hotelApiTemp.pages.GetCityListIndia', ['cities' => []]);
        }
        return view('hotelApiTemp.pages.GetCityListIndia', compact('cities'));
    }

    public function visitTboHotelCodeList()
    {
        $cities = ApiHotelCityListIndia::orderBy('city_name', 'asc')->get();
        $hotels = ApiHotelTboHotelCodeList::orderBy('HotelName', 'asc')->paginate(20);
        if($hotels->isEmpty()){
            $hotelCodes = [];
        }
        if ($cities->isEmpty()) {
            return view('hotelApiTemp.pages.TboHotelCodeList', ['cities' => []]);
        }
        return view('hotelApiTemp.pages.TboHotelCodeList', compact('cities', 'hotels'));
    }

    public function viewHotel($hotel_code)
    {
        $hotel = ApiHotelHotelDetails::where('HotelCode', $hotel_code)->first();
        if (!$hotel) {
            Log::error("Hotel with code $hotel_code not found");
            return redirect()->back()->with('error', "Hotel with code $hotel_code not found. This must not have been stored locally yet. Store first and then try again.");
        }
        Log::info("Viewing hotel details for code: $hotel_code", ['hotel' => $hotel]);
        return view('hotelApiTemp.pages.viewHotel', compact('hotel'));
    }

    public function hotelDetailsList()
    {
        $hotels = ApiHotelHotelDetails::orderBy('HotelName', 'asc')->paginate(20);
        if ($hotels->isEmpty()) {
            Log::info('No hotels found in HotelApiTemp hotelDetailsList');
            return view('hotelApiTemp.pages.hotelDetailsList', ['hotels' => []]);
        }
        Log::info('HotelApiTemp hotelDetailsList accessed', ['hotels' => $hotels]);
        return view('hotelApiTemp.pages.hotelDetailsList', compact('hotels'));
    }
}
