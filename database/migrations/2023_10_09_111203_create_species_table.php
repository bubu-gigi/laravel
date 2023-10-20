<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('classification')->nullable();;
            $table->string('designation')->nullable();;
            $table->integer('average_height')->nullable();;
            $table->string('skin_colors')->nullable();;
            $table->string('hair_colors')->nullable();;
            $table->string('eye_colors')->nullable();;
            $table->integer('average_lifespan')->nullable();;
            $table->integer('planet_id')->nullable();;
            $table->string('language')->nullable();;
            $table->integer('remote_id');
        });

        DB::statement("ALTER TABLE species AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('species');
    }
};
