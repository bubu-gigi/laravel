<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('starships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->string('manufacturer')->nullable();
            $table->bigInteger('cost_in_credits')->nullable();
            $table->integer('length')->nullable();
            $table->integer('max_atmosphering_speed')->nullable();
            $table->string('crew')->nullable();
            $table->integer('passengers')->nullable();
            $table->bigInteger('cargo_capacity')->nullable();
            $table->string('consumables')->nullable();
            $table->float('hyperdrive_rating')->nullable();
            $table->integer('MGLT')->nullable();
            $table->string('starship_class')->nullable();
            $table->integer('remote_id');
        });

        DB::statement("ALTER TABLE starships AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('starships');
    }
};
