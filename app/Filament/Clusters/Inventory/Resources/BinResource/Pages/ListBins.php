<?php

namespace App\Filament\Clusters\Inventory\Resources\BinResource\Pages;

use App\Filament\Clusters\Inventory\Resources\BinResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBins extends ListRecords
{
    protected static string $resource = BinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
