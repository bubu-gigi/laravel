<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('height')->nullable();;
            $table->integer('mass')->nullable();;
            $table->string('hair_color')->nullable();;
            $table->string('skin_color')->nullable();;
            $table->string('eye_color')->nullable();;
            $table->string('birth_year')->nullable();;
            $table->string('gender')->nullable();;
            $table->integer('planet_id')->nullable();;
            $table->integer('specie_id')->nullable();;
        });

        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
