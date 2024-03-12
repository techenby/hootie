<?php

namespace App\Filament\Resources\BoardResource\Pages;

use App\Filament\Resources\BoardResource;
use App\Models\Board;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListBoards extends ListRecords
{
    protected static string $resource = BoardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('create')
                ->action(function () {
                    $name = str(auth()->user()->name)->before(' ')."'s Board";

                    Board::create(['name' => $name]);
                }),
        ];
    }
}
