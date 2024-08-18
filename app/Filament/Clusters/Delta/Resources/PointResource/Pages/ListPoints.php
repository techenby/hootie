<?php

namespace App\Filament\Clusters\Delta\Resources\PointResource\Pages;

use App\Filament\Clusters\Delta\Resources\PointResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPoints extends ListRecords
{
    protected static string $resource = PointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
