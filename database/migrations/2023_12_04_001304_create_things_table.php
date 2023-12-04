<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('things', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->nullable()->constrained();
            $table->foreignId('bin_id')->nullable()->constrained();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->json('categories')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('things');
    }
};
