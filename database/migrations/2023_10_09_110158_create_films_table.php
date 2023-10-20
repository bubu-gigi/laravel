<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('episode_id')->nullable();
            $table->string('opening_crawl', 1000)->nullable();
            $table->string('director')->nullable();
            $table->string('producer')->nullable();
            $table->string('release_date')->nullable();
            $table->integer('remote_id');
            $table->integer('tickets')->default(10);
        });

        DB::statement("ALTER TABLE films AUTO_INCREMENT = 1;");
    }
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
