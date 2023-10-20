<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('film_planet', function (Blueprint $table) {
            $table->id();
            $table->integer('film_id');
            $table->integer('planet_id');
        });

        DB::statement("ALTER TABLE film_planet AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('film_planet');
    }
};
