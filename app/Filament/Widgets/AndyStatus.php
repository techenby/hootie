<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AndyStatus extends BaseWidget
{
    protected function getStats(): array
    {
        $user = User::whereEmail('hi@andymnewhouse.me')->first();

        return [
            Stat::make('Andy\'s Status', $user->status ?? 'n/a'),
        ];
    }
}
