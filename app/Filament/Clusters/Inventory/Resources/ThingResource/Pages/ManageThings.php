<?php

namespace App\Filament\Clusters\Inventory\Resources\ThingResource\Pages;

use App\Filament\Clusters\Inventory\Resources\ThingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageThings extends ManageRecords
{
    protected static string $resource = ThingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
