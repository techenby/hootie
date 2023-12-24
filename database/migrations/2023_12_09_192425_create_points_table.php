<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->float('yesterday_temp');
            $table->float('today_temp');
            $table->string('yesterday_weather');
            $table->string('today_weather');
            $table->string('joint_pain');
            $table->string('muscle_pain');
            $table->boolean('took_meds');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
