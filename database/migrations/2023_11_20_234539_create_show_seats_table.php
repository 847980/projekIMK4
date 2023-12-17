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
        Schema::create('show_seats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('showtime_id');
            $table->foreign('showtime_id')->references('id')->on('show_times')->onDelete('cascade');
            $table->integer('chair_number');
            $table->integer('chair_status')->comment('0: available, 1: booked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_seats');
    }
};
