<?php

namespace App\Filament\Resources\PointResource\Pages;

use App\Filament\Resources\PointResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPoints extends ListRecords
{
    protected static string $resource = PointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
