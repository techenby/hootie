<?php

namespace App\Filament\Clusters\Snails\Resources\EnvelopeResource\Pages;

use App\Filament\Clusters\Snails\Resources\EnvelopeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageEnvelopes extends ManageRecords
{
    protected static string $resource = EnvelopeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
