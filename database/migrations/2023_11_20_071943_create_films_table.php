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
        Schema::create('films', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul');
            $table->string('sutradara');
            $table->text('description');
            $table->integer('duration');
            $table->string('trailer');
            $table->string('cast');
            $table->string('age_cat');
            $table->date('release_date');
            $table->uuid('genre_id');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->uuid('country_id');
            $table->foreign('country_id')->references('id')->on('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
