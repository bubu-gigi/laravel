<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resident_specie', function (Blueprint $table) {
            $table->id();
            $table->integer('resident_id');
            $table->integer('specie_id');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('resident_specie');
    }
};
