<?php

namespace App\Filament\Resources\BoardResource\Pages;

use App\Filament\Resources\BoardResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBoard extends EditRecord
{
    protected static string $resource = BoardResource::class;

    public $model;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->url(url('boards/' . $this->getRecord()->id . '?token=' . $this->getRecord()->token), shouldOpenInNewTab: true),
            DeleteAction::make(),
        ];
    }
}
