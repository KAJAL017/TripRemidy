<?php

namespace App\Http\Controllers;

use App\Services\TboService;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TboController extends Controller
{
    protected $tboService;

    public function __construct(TboService $tboService)
    {
        $this->tboService = $tboService;
    }

    public function testAuthenticate(TboService $tboService)
    {
        // dd("Controller Hit");
        $token = $tboService->getToken();
        if ($token) {
            return response()->json(['status' => 'success', 'token' => $token]);
        }
        return response()->json(['status' => 'failed'], 500);
    }



    public function logout(TboService $tboService)
    {
        try {
            $result = $tboService->logout();
            if ($result['success']) {
                return response()->json(['status' => 'success', 'message' => $result['message']]);
            } else {
                return response()->json(['status' => 'failed', 'message' => $result['message']], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    public function showCountries(TboService $tboService)
    {
        try {
            $countries = $tboService->getCountryList();
            // Log::info('Countries fetched successfully', ['countries' => $countries]);
            return response()->json($countries);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function searchHotels(Request $request, TboService $tboService)
    {
        $customPayload = $request->all(); // Whatever Postman sends
        $result = $tboService->searchHotels($customPayload);

        return response()->json($result);
    }
    public function getHotelInfo(Request $request, TboService $tboService)
    {
        $customPayload = $request->all(); // Whatever Postman sends
        $result = $tboService->getHotelInfo($customPayload);

        return response()->json($result);
    }

    public function GetAgencyBalance(Request $request, TboService $tboService)
    {
        $customPayload = $request->all();
        try {
            $result = $tboService->GetAgencyBalance($customPayload);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function GetCityListIndia(Request $request, TboService $tboService)
    {
        try {
            $result = $tboService->GetCityListIndia();
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function TboHotelCodeList(Request $request, TboService $tboService)
    {
        $request->validate([
            'city_code' => 'required|numeric',
        ]);

        Log::info('TboHotelCodeList called with request', ['request' => $request->all()]);

        $success = $tboService->TBOHotelCodeList([
            'CityCode' => (string) $request->city_code,
            'IsDetailedResponse' => "true",

        ]);

        return response()->json([
            'success' => $success,
            'message' => $success ? 'Hotels fetched and stored successfully!' : 'Failed to store hotels.',
        ]);
    }

    public function TboHotelDetails(Request $request, TboService $tboService)
    {
          $request->validate([
              'hotel_code' => 'required|numeric',
          ]);

          $hotelcodes = (int) $request->hotel_code;
        $success = $tboService->HotelDetails([
            'Hotelcodes' => $hotelcodes,
            'Language' => 'EN'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Controller Method Called Successfully',
        ]);
    }
}
