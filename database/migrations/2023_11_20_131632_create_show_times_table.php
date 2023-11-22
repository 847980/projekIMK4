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
        Schema::create('show_times', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('film_id');
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            $table->uuid('cinema_id');
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
            $table->uuid('studio_id');
            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');
            $table->date('show_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('price');
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
        Schema::dropIfExists('show_times');
    }
};
