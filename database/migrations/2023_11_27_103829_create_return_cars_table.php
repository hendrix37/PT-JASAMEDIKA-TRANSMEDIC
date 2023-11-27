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
        Schema::disableForeignKeyConstraints();

        Schema::create('return_cars', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rental_cars');
            $table->timestamp('return_date')->nullable();
            $table->double('rental_duration_days')->nullable();
            $table->foreignId('rental_car_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_cars');
    }
};
