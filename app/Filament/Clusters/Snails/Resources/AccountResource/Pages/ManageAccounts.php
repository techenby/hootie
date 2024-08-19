<?php

namespace App\Filament\Clusters\Snails\Resources\AccountResource\Pages;

use App\Filament\Clusters\Snails\Resources\AccountResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageAccounts extends ManageRecords
{
    protected static string $resource = AccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
