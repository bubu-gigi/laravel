<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_specie', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('specie_id');
        });

        DB::statement("ALTER TABLE user_specie AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('user_specie');
    }
};
