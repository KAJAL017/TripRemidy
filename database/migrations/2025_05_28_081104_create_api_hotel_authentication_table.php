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
        Schema::create('api_hotel_authentication', function (Blueprint $table) {
            $table->id();
            $table->string('ClientId');
            $table->string('token_id')->unique();
            $table->string('EndUserIp');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->string('login_name')->nullable();
            $table->text('login_details')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('error_code')->nullable();
            $table->string('error_message')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_hotel_authentication');
    }
};
