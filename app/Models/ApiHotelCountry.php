<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiHotelCountry extends Model
{
    protected $table = 'api_hotel_countries';
     protected $fillable = [
        'code',
        'name',
    ];
}
