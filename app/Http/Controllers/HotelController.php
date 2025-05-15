<?php

namespace App\Http\Controllers;

use App\Services\TboService;

class HotelController extends Controller
{
    protected $tboService;

    public function __construct(TboService $tboService)
    {
        $this->tboService = $tboService;
    }

    public function index()
    {
        $tokenId = $this->tboService->authenticate();


        if (!$tokenId) {
            return response()->json(['error' => 'Authentication Failed'], 401);
        }

        $hotels = $this->tboService->searchHotels($tokenId);

        return response()->json($hotels);
    }
}
