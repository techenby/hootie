<?php

namespace App\Filament\Clusters\Inventory\Resources\LocationResource\Pages;

use App\Filament\Clusters\Inventory\Resources\LocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLocations extends ManageRecords
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
