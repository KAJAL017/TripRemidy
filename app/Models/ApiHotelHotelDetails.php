<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiHotelHotelDetails extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'api_hotel_hoteldetails';

    // Allow mass assignment for the following fields
    protected $fillable = [
        'HotelCode',
        'HotelName',
        'Description',
        'HotelFacilities',
        'Attractions',
        'Images',
        'Address',
        'PinCode',
        'CityId',
        'CountryName',
        'PhoneNumber',
        'FaxNumber',
        'Map',
        'HotelRating',
        'CityName',
        'CountryCode',
        'CheckInTime',
        'CheckOutTime',
    ];

    // Automatically cast JSON fields to appropriate types
    protected $casts = [
        'HotelFacilities' => 'array',
        'Attractions' => 'array',
        'Images' => 'array',
    ];
}
