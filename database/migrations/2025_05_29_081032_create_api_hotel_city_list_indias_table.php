<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('api_hotel_city_list_india', function (Blueprint $table) {
            $table->id();
            $table->string('city_code')->unique();  // from "Code" in API
            $table->string('city_name');            // from "Name" in API
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_hotel_city_list_indias');
    }
};
