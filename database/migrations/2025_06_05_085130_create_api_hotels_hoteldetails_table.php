<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiHotelsHoteldetailsTable extends Migration
{
    public function up()
    {
        Schema::create('api_hotel_hoteldetails', function (Blueprint $table) {
            $table->id();

            $table->string('HotelCode')->unique();
            $table->string('HotelName');
            $table->longText('Description')->nullable();
            $table->json('HotelFacilities')->nullable(); // JSON array
            $table->json('Attractions')->nullable(); // JSON object
            $table->json('Images')->nullable(); // JSON array
            $table->text('Address')->nullable();
            $table->string('PinCode', 20)->nullable();
            $table->string('CityId')->nullable();
            $table->string('CountryName')->nullable();
            $table->string('PhoneNumber', 50)->nullable();
            $table->string('FaxNumber', 50)->nullable();
            $table->string('Map')->nullable(); // "latitude|longitude"
            $table->string('HotelRating', 10)->nullable();
            $table->string('CityName')->nullable();
            $table->string('CountryCode', 10)->nullable();
            $table->string('CheckInTime', 10)->nullable();
            $table->string('CheckOutTime', 10)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_hotels_hoteldetails');
    }
}
