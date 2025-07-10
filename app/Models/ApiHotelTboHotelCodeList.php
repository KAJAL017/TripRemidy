<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiHotelTboHotelCodeList extends Model
{
    // If your table name doesn't follow Laravel's pluralization, define it manually
    protected $table = 'api_hotels_tbohotelcodelist';

    // Allow mass assignment for all columns
    protected $fillable = [
        'city_code',
        'HotelCode',
        'HotelName',
        'HotelRating',
        'Address',
        'Attractions',
        'CountryName',
        'CountryCode',
        'Description',
        'FaxNumber',
        'HotelFacilities',
        'TripAdvisorRating',
        'TripAdvisorReviewURL',
        'Map',
        'PhoneNumber',
        'PinCode',
        'HotelWebsiteUrl',
        'CityName',
    ];

    // Automatically cast JSON fields to array
    protected $casts = [
        'Attractions' => 'array',
        'HotelFacilities' => 'array',
    ];
}
