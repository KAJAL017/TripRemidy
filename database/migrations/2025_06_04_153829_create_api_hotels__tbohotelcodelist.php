<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiHotelsTbohotelcodelist extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('api_hotels_tbohotelcodelist', function (Blueprint $table) {
            $table->id();

            // City and Country Info
            $table->string('city_code')->index();
            // Hotel Info
            $table->string('HotelCode')->unique();
            $table->string('HotelName');
            $table->string('HotelRating')->nullable();
            $table->text('Address')->nullable();
            $table->json('Attractions')->nullable(); // Assuming Attractions is an array
            $table->string('CountryName')->nullable();
            $table->string('CountryCode', 10)->nullable();
            $table->longText('Description')->nullable();
            $table->string('FaxNumber', 50)->nullable();
            $table->json('HotelFacilities')->nullable(); // Assuming this is an array
            $table->string('TripAdvisorRating', 10)->nullable();
            $table->string('TripAdvisorReviewURL')->nullable();
            $table->string('Map')->nullable(); // format "latitude|longitude"
            $table->string('PhoneNumber', 50)->nullable();
            $table->string('PinCode', 20)->nullable();
            $table->string('HotelWebsiteUrl')->nullable();
            $table->string('CityName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_hotels');
    }
}
