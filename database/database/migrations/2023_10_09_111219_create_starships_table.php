<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('starships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('manufacturer');
            $table->bigInteger('cost_in_credits');
            $table->integer('length');
            $table->integer('max_atmosphering_speed');
            $table->string('crew');
            $table->integer('passengers');
            $table->bigInteger('cargo_capacity');
            $table->string('consumables');
            $table->float('hyperdrive_rating');
            $table->int('MGLT');
            $table->string('starship_class');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('starships');
    }
};
