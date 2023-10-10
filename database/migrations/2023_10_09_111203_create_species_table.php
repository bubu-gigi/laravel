<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('classification');
            $table->string('designation');
            $table->integer('average_height');
            $table->string('skin_colors');
            $table->string('hair_colors');
            $table->string('eye_colors');
            $table->integer('average_lifespan');
            $table->integer('planet_id');
            $table->string('language');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('species');
    }
};
