<?php

namespace App\Filament\Clusters\Delta\Resources\PointResource\Pages;

use App\Filament\Clusters\Delta\Resources\PointResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPoint extends EditRecord
{
    protected static string $resource = PointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
