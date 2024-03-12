<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('board:fetch-calendar-events')->everyMinute();
Schedule::command('board:fetch-weather')->everyFifteenMinutes();
Schedule::command('board:fetch-pressure')->everyFifteenMinutes();
