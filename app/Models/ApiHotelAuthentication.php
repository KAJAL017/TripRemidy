<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiHotelAuthentication extends Model
{
    protected $table = 'api_hotel_authentication';

   protected $fillable = [
    'ClientId',
    'EndUserIp',
    'token_id',
    'first_name',
    'last_name',
    'email',
    'member_id',
    'agency_id',
    'login_name',
    'login_details',
    'status',
    'error_code',
    'error_message',
    'fetched_at',
    'expires_at',
];

}
