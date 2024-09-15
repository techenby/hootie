<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('board:fetch-calendar-events')->everyMinute();
Schedule::command('board:fetch-weather')->everyFifteenMinutes();
Schedule::command('board:fetch-pressure')->everyFifteenMinutes();

Artisan::command('app:clear-status', function () {
    $twoHoursAgo = now()->subHours(2);

    User::whereNotNull('status')
        ->where('updated_at', '<=', $twoHoursAgo)
        ->update(['status' => null]);
})->purpose('Clear stale statuses')->hourly();
