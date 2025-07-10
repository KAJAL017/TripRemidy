<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\ApiHotelAuthentication;
use App\Models\ApiHotelCountry;
use App\Models\ApiHotelCityListIndia;
use App\Models\ApiHotelTboHotelCodeList;
use App\Models\ApiHotelHotelDetails;

class TboService
{
    private $clientId;
    private $userName;
    private $password;
    private $endUserIp;
    private $cacheKey = 'tbo_token';
    private $cacheTTL = 86400; // 24 hours in seconds

    public function __construct()
    {
        $this->clientId = config('tbo.client_id');
        $this->userName = config('tbo.username');
        $this->password = config('tbo.password');
        $this->endUserIp = config('tbo.end_user_ip');

        /*
        Log::info('TBO Service Initialized', [
            'client_id' => $this->clientId,
            'user_name' => $this->userName,
            'end_user_ip' => $this->endUserIp,
        ]);
        */
    }


    public function getToken(): ?string
    {
        $existingAuth = ApiHotelAuthentication::latest('created_at')->first();

        if ($existingAuth && Carbon::parse($existingAuth->expires_at)->isFuture()) {
            Log::warning('Token fetch aborted: A valid token already exists and has not yet expired. Please log out or clear the token manually if needed.');
            return null;
        }

        // No token in cache — call the API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept-Encoding' => 'gzip, deflate',
        ])->post('https://Sharedapi.tektravels.com/SharedData.svc/rest/Authenticate', [
            'ClientId'   => $this->clientId,
            'UserName'   => $this->userName,
            'Password'   => $this->password,
            'EndUserIp'  => $this->endUserIp,
        ]);

        if (!$response->successful()) {
            Log::error('TBO Authenticate API failed.', ['status' => $response->status(), 'body' => $response->body()]);
            throw new \Exception('API request failed with status: ' . $response->status());
        }

        $data = $response->json();

        if (!isset($data['Status']) || $data['Status'] != 1) {
            Log::error('Authentication response invalid or failed.', ['response' => $data]);
            throw new \Exception('Authentication failed. Response: ' . json_encode($data));
        }

        if (!empty($data['TokenId'])) {
            // Log the new token
            Log::info('New token received from TBO API.', [
                'token_id'        => $data['TokenId'],
                'agency_id'   => $data['Member']['AgencyId'] ?? null,
                'member_id'   => $data['Member']['MemberId'] ?? null,
                'end_user_ip'     => $this->endUserIp,
            ]);

            ApiHotelAuthentication::create([
                'token_id'      => $data['TokenId'],
                'ClientId'      => $this->clientId,
                'EndUserIp'     => $this->endUserIp,
                'first_name'    => $data['Member']['FirstName'] ?? null,
                'last_name'     => $data['Member']['LastName'] ?? null,
                'email'         => $data['Member']['Email'] ?? null,
                'member_id'     => $data['Member']['MemberId'] ?? null,
                'agency_id'     => $data['Member']['AgencyId'] ?? null,
                'login_name'    => $data['Member']['LoginName'] ?? null,
                'login_details' => $data['Member']['LoginDetails'] ?? null,
                'status'        => $data['Status'] ?? null,
                'error_code'    => $data['Error']['ErrorCode'] ?? null,
                'error_message' => $data['Error']['ErrorMessage'] ?? null,
                'fetched_at'    => now(),
                'expires_at'    => now()->endOfDay(),
            ]);

            return $data['TokenId'];
        }

        Log::warning('Authentication succeeded but TokenId is missing.', ['response' => $data]);
        throw new \Exception('Authentication succeeded but TokenId is missing.');
    }

    public function logout(): array
    {
        $expiredRecords = ApiHotelAuthentication::where('expires_at', '<', Carbon::now())->delete();
        $authRecord = ApiHotelAuthentication::where('expires_at', '>', Carbon::now())
            ->latest('fetched_at')
            ->first();

        if (!$authRecord) {
            return [
                'success' => false,
                'message' => 'No active session found to logout.',
            ];
        }
        if (!$authRecord->token_id || !$authRecord->agency_id || !$authRecord->member_id || !$authRecord->EndUserIp || !$authRecord->ClientId) {
            return [
                'success' => false,
                'message' => 'Missing session information required for logout.',
            ];
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://Sharedapi.tektravels.com/SharedData.svc/rest/Logout', [
            'ClientId'       => $authRecord->ClientId,
            'TokenMemberId'  => $authRecord->member_id,
            'TokenAgencyId'  => $authRecord->agency_id,
            'EndUserIp'      => $authRecord->EndUserIp,
            'TokenId'        => $authRecord->token_id,
        ]);


        $data = $response->json();
        if ($expiredRecords) {
            $data['ExpiredRecords'] = true;
        } else {
            $data['ExpiredRecords'] = false;
        }

        if (is_array($data) && ($data['Status'] ?? 0) == 1 && ($data['Error']['ErrorCode'] ?? 1) == 0) {
            Log::info('Logout successful for token: ' . $authRecord->token_id . ' Status returned: ' . $data['Status']);
            $authRecord->delete();

            return ['success' => true, 'message' => 'Logout successful.', 'expired_records' => $data['ExpiredRecords'] ?? false];
        }

        return [
            'success' => false,
            'message' => $data['Error']['ErrorMessage'] ?? 'Unknown error during logout.',
            'code'    => $data['Error']['ErrorCode'] ?? 'Unknown',
        ];
    }







    /**
     * Get the list of countries available for hotel search.
     *
     * @return array|null
     * @throws \Exception
     */
    public function getCountryList(): ?array
    {
        $url = 'https://api.tbotechnology.in/TBOHolidays_HotelAPI/CountryList';

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip, deflate',
            'Content-Type' => 'application/json',
        ])->withBasicAuth('TBOStaticAPITest', 'Tbo@11530818')->get($url);

        if (!$response->successful()) {
            throw new \Exception('CountryList request failed with status: ' . $response->status());
        }

        $data = $response->json();

        if (isset($data['Status']['Code']) && $data['Status']['Code'] === 200 && isset($data['CountryList'])) {
            ApiHotelCountry::truncate(); // Clear existing countries
            foreach ($data['CountryList'] as $country) {
                ApiHotelCountry::updateOrCreate(
                    ['code' => $country['Code']],
                    ['name' => $country['Name']]
                );
            }
            return $data;
        }

        $errorMessage = $data['Status']['Description'] ?? 'Unknown error';
        throw new \Exception("CountryList failed: {$errorMessage}");
    }

    public function getCityListIndia(): array
    {
        try {

            $india = ApiHotelCountry::where('name', 'India')->first();

            if (!$india || !$india->code) {
                Log::error('India country code not found in api_hotel_countries table.');
                return [
                    'success' => false,
                    'message' => 'India country code not found in the database.',
                ];
            }

            $countryCode = $india->code;

            Log::info('Fetching city list for India with country code: ' . $countryCode);


            $url = "http://api.tbotechnology.in/TBOHolidays_HotelAPI/CityList";


            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip, deflate',
                'Content-Type' => 'application/json',
            ])->withBasicAuth('TBOStaticAPITest', 'Tbo@11530818')->post($url, [
                'CountryCode' => $countryCode,
            ]);



            if (!$response->successful()) {
                Log::error('City list API GET request failed.', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [
                    'success' => false,
                    'message' => 'Failed to retrieve city list from TBO API.',
                    'status' => $response->status(),
                ];
            }

            $data = $response->json();


            if (!isset($data['CityList']) || !is_array($data['CityList'])) {
                Log::error('City list API response malformed or missing CityList key.', ['response' => $data]);
                return [
                    'success' => false,
                    'message' => 'City list data not found or invalid format.',
                ];
            }


            ApiHotelCityListIndia::truncate();


            foreach ($data['CityList'] as $city) {
                ApiHotelCityListIndia::create([
                    'city_code' => $city['Code'] ?? null,
                    'city_name' => $city['Name'] ?? null,
                ]);
            }

            Log::info('City list for India successfully fetched and stored.', ['total' => count($data['CityList'])]);

            return [
                'success' => true,
                'message' => 'City list for India fetched and stored successfully.',
                'total' => count($data['CityList']),
            ];
        } catch (\Exception $e) {
            Log::error('Exception while fetching city list for India.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'success' => false,
                'message' => 'An unexpected error occurred.',
            ];
        }
    }





    public function searchHotels(array $params = [])
    {
        $token = Cache::get('tbo_token');
        $endUserIp = Cache::get('tbo_end_user_ip');
        Log::info('TBO Hotel Search Token: ' . $token);

        if (!$token) {
            return null;
        }

        // Hardcoded default values
        $defaultParams = [
            'EndUserIp' => $endUserIp,
            'TokenId' => $token,
            'CountryCode' => 'IN',
            'GuestNationality' => 'IN',
            'PreferredCurrency' => 'INR',
            'IsTBOMapped' => true
        ];

        $finalPayload = array_merge($defaultParams, $params);

        Log::info('TBO Hotel Search Payload: ' . json_encode($finalPayload));

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept-Encoding' => 'gzip, deflate',
        ])->post('https://HotelBE.tektravels.com/hotelservice.svc/rest/Gethotelresult', $finalPayload);

        // Log::info('TBO Hotel Search Raw Response: ' . $response->body());

        $searchData = $response->json(); // get the full JSON result
        $traceId = $searchData['HotelSearchResult']['TraceId'] ?? null;

        if ($traceId) {
            $cacheKey = 'tbo_search_' . $traceId;
            Cache::put($cacheKey, $searchData, now()->addMinutes(15));
            Log::info('TBO Hotel Search cached under key: ' . $cacheKey);
        }


        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }


    public function getHotelInfo(array $params = [])
    {
        $token = Cache::get('tbo_token');
        $endUserIp = Cache::get('tbo_end_user_ip');

        if (!$token) {
            Log::warning('No TBO token found.');
            return null;
        }

        $defaultParams = [
            'EndUserIp' => $endUserIp,
            'TokenId' => $token,
        ];

        $finalPayload = array_merge($defaultParams, $params);

        //   Log::info('TBO Hotel GetHotelInfo Payload: ' . json_encode($finalPayload));

        try {
            Log::info('We are inside try catch');

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept-Encoding' => 'gzip, deflate',
            ])->post('https://HotelBE.tektravels.com/hotelservice.svc/rest//GetHotelInfo', $finalPayload);

            Log::info('TBO Hotel GetHotelInfo Raw Response: ' . $response->body());

            if ($response->successful()) {
                Log::info('TBO Hotel GetHotelInfo Parsed JSON: ' . json_encode($response->json()));
                return $response->json();
            } else {
                Log::warning('TBO Hotel GetHotelInfo API responded with status: ' . $response->status());
                Log::warning('TBO Hotel GetHotelInfo Error Body: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('TBO Hotel GetHotelInfo Exception: ' . $e->getMessage());
        }


        return null;
    }

    public function GetAgencyBalance(array $payload)
    {
        $data = ApiHotelAuthentication::latest('fetched_at')->first();
        if (!$data || !$data->token_id || !$data->agency_id || !$data->member_id || !$data->EndUserIp || !$data->ClientId) {
            throw new \Exception('Missing session information required for GetAgencyBalance.');
        }
        $payload = array_merge([
            'ClientId' => $data->ClientId,
            'TokenMemberId' => $data->member_id,
            'TokenAgencyId' => $data->agency_id,
            'EndUserIp' => $data->EndUserIp,
            'TokenId' => $data->token_id,
        ], $payload);
        Log::info('TBO GetAgencyBalance Payload: ' . json_encode($payload));
        $url = 'http://Sharedapi.tektravels.com/SharedData.svc/rest/GetAgencyBalance';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if ($response->successful()) {
            Log::info('TBO GetAgencyBalance Response: ' . $response->body());
            return $response->json();
        } else {
            throw new \Exception('TBO API Error: ' . $response->body());
        }
    }

    public function TBOHotelCodeList(array $payload): bool
    {
        $apiUrl = 'http://api.tbotechnology.in/TBOHolidays_HotelAPI/TBOHotelCodeList';
        $username = 'TBOStaticAPITest';
        $password = 'Tbo@11530818';

        try {
            $response = Http::withBasicAuth($username, $password)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept-Encoding' => 'gzip, deflate',
                ])
                ->post($apiUrl, $payload);

            $data = $response->json();

            if (!isset($data['Hotels']) || !is_array($data['Hotels'])) {
                Log::error('TBOHotelCodeList API response malformed or missing Hotels key.', ['response' => $data]);
                return false;
            }

            $cityCode = $payload['CityCode'];

            // Delete existing records for the city
            ApiHotelTboHotelCodeList::where('city_code', $cityCode)->delete();

            // Insert new hotel data
            foreach ($data['Hotels'] as $hotel) {
                ApiHotelTboHotelCodeList::create([
                    'city_code'             => $cityCode,
                    'HotelCode'             => $hotel['HotelCode'],
                    'HotelName'             => $hotel['HotelName'],
                    'HotelRating'           => $hotel['HotelRating'] ?? null,
                    'Address'               => $hotel['Address'] ?? null,
                    'Attractions'           => $hotel['Attractions'] ?? [],
                    'CountryName'           => $hotel['CountryName'] ?? null,
                    'CountryCode'           => $hotel['CountryCode'] ?? null,
                    'Description'           => $hotel['Description'] ?? null,
                    'FaxNumber'             => $hotel['FaxNumber'] ?? null,
                    'HotelFacilities'       => $hotel['HotelFacilities'] ?? [],
                    'TripAdvisorRating'     => $hotel['TripAdvisorRating'] ?? null,
                    'TripAdvisorReviewURL'  => $hotel['TripAdvisorReviewURL'] ?? null,
                    'Map'                   => $hotel['Map'] ?? null,
                    'PhoneNumber'           => $hotel['PhoneNumber'] ?? null,
                    'PinCode'               => $hotel['PinCode'] ?? null,
                    'HotelWebsiteUrl'       => $hotel['HotelWebsiteUrl'] ?? null,
                    'CityName'              => $hotel['CityName'] ?? null,
                ]);
            }

            return true;
        } catch (\Exception $e) {
            Log::error('TBOHotelCodeList Error', ['error' => $e->getMessage()]);
            return false;
        }
    }

    public function HotelDetails(array $payload): bool
    {
        $apiUrl = 'http://api.tbotechnology.in/TBOHolidays_HotelAPI/Hoteldetails';
        $username = 'TBOStaticAPITest';
        $password = 'Tbo@11530818';

        try {
            $response = Http::withBasicAuth($username, $password)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept-Encoding' => 'gzip, deflate',
                ])
                ->post($apiUrl, $payload);

            $data = $response->json();

            if (!isset($data['HotelDetails']) || !is_array($data['HotelDetails'])) {
                Log::error('HotelDetails API response malformed or missing HotelDetails key.', ['response' => $data]);
                return false;
            }

            // Process the hotel details as needed

            foreach ($data['HotelDetails'] as $hotel) {
                // Delete existing entry if any
                ApiHotelHotelDetails::where('HotelCode', $hotel['HotelCode'])->delete();

                // Then create a new record
                $createdHotel = ApiHotelHotelDetails::create([
                    'HotelCode' => $hotel['HotelCode'],
                    'HotelName' => $hotel['HotelName'],
                    'Description' => $hotel['Description'] ?? null,
                    'HotelFacilities' => $hotel['HotelFacilities'] ?? [],
                    'Attractions' => $hotel['Attractions'] ?? [],
                    'Images' => $hotel['Images'] ?? [],
                    'Address' => $hotel['Address'] ?? null,
                    'PinCode' => $hotel['PinCode'] ?? null,
                    'CityId' => $hotel['CityId'] ?? null,
                    'CountryName' => $hotel['CountryName'] ?? null,
                    'PhoneNumber' => $hotel['PhoneNumber'] ?? null,
                    'FaxNumber' => $hotel['FaxNumber'] ?? null,
                    'Map' => $hotel['Map'] ?? null,
                    'HotelRating' => $hotel['HotelRating'] ?? null,
                    'CityName' => $hotel['CityName'] ?? null,
                    'CountryCode' => $hotel['CountryCode'] ?? null,
                    'CheckInTime' => $hotel['CheckInTime'] ?? null,
                    'CheckOutTime' => $hotel['CheckOutTime'] ?? null,
                ]);

                if (!$createdHotel) {
                    Log::error('Failed to create or update hotel details for HotelCode: ' . $hotel['HotelCode']);
                    return false;
                }
            }


            return true;
        } catch (\Exception $e) {
            Log::error('HotelDetails Error', ['error' => $e->getMessage()]);
            return false;
        }
    }

    // http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelInfo
    //http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelInfo
    //https://HotelBE.tektravels.com/hotelservice.svc/rest//GetHotelInfo


}
