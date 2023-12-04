<?php

namespace App\Filament\Resources\BinResource\Pages;

use App\Filament\Resources\BinResource;
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
