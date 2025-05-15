<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TboService
{
    private $clientId;
    private $userName;
    private $password;
    private $endUserIp;

    public function __construct()
    {
        $this->clientId = env('TBO_CLIENT_ID');
        $this->userName = env('TBO_USER_NAME');
        $this->password = env('TBO_PASSWORD');
        $this->endUserIp = env('TBO_END_USER_IP');
    }

    public function authenticate()
    {
        $response = Http::post('https://api.tektravels.com/SharedServices/SharedData.svc/rest/Authenticate', [
            'ClientId' => $this->clientId,
            'UserName' => $this->userName,
            'Password' => $this->password,
            'EndUserIp' => $this->endUserIp,
        ]);
p($response);
        if ($response->successful() && !empty($response->json('TokenId'))) {
            return $response->json('TokenId');
        }

        return null;
    }

    public function searchHotels($tokenId)
    {
        $response = Http::post('https://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelResult/', [
            'EndUserIp' => $this->endUserIp,
            'TokenId' => $tokenId,
            'CheckInDate' => '2025-05-01',
            'CheckOutDate' => '2025-05-03',
            'CountryCode' => 'IN',
            'CityId' => '1234', // Delhi ka CityId, ya jisme search karna hai.
            'NoOfRooms' => 1,
            'RoomGuests' => [
                [
                    'NoOfAdults' => 2,
                    'NoOfChild' => 0,
                ]
            ],
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
