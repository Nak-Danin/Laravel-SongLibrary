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
        Schema::create('songs', function (Blueprint $table) {
            $table->smallIncrements('song_id');
            $table->string('title');
            $table->string('genre');
            $table->string('artist');
            $table->integer('duration');
            $table->string('description')->nullable();
            $table->string('img_path');
            $table->boolean('is_active');
            $table->boolean('is_favorite');
            $table->date('published_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
