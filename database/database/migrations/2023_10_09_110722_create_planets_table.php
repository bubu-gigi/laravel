<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rotation_period');
            $table->integer('orbital_period');
            $table->integer('diameter');
            $table->string('climate');
            $table->string('gravity');
            $table->string('terrain');
            $table->integer('surface_water');
            $table->bigInteger('population');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('planets');
    }
};
