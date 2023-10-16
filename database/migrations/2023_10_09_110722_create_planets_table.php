<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->integer('rotation_period')->nullable();
            $table->integer('orbital_period')->nullable();
            $table->integer('diameter')->nullable();;
            $table->string('climate')->nullable();;
            $table->string('gravity')->nullable();;
            $table->string('terrain')->nullable();;
            $table->integer('surface_water')->nullable();;
            $table->bigInteger('population')->nullable();;
        });

        DB::statement("ALTER TABLE planets AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('planets');
    }
};
