<?php

namespace App\Filament\Resources\ThingResource\Pages;

use App\Filament\Imports\ThingImporter;
use App\Filament\Resources\ThingResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ManageRecords;

class ManageThings extends ManageRecords
{
    protected static string $resource = ThingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            ImportAction::make()
                    ->importer(ThingImporter::class)
        ];
    }
}
