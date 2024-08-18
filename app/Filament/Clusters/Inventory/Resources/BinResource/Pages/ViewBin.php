<?php

namespace App\Filament\Clusters\Inventory\Resources\BinResource\Pages;

use App\Filament\Clusters\Inventory\Resources\BinResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBin extends ViewRecord
{
    protected static string $resource = BinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
