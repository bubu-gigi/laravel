<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('film_resident', function (Blueprint $table) {
            $table->id();
            $table->integer('film_id');
            $table->integer('resident_id');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('film_resident');
    }
};