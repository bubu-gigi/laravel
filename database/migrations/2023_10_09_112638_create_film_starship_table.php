<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('film_starship', function (Blueprint $table) {
            $table->id();
            $table->integer('film_id');
            $table->integer('starship_id');
        });

        DB::statement("ALTER TABLE film_starship AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('film_starship');
    }
};
