<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('board_tiles', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }
};
