<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_vehicle', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vehicle_id');
        });

        DB::statement("ALTER TABLE user_vehicle AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('user_vehicle');
    }
};
