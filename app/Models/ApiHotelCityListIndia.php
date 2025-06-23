<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiHotelCityListIndia extends Model
{
    protected $table = 'api_hotel_city_list_india';

    protected $fillable = [
        'city_code',
        'city_name',
    ];
}
