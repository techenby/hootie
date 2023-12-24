<?php

namespace App\Filament\Resources\PointResource\Pages;

use App\Filament\Resources\PointResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPoint extends EditRecord
{
    protected static string $resource = PointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
