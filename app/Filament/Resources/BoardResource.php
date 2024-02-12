<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardResource\Pages;
use App\Models\Board;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use OmarHaris\FilamentTimezoneField\Forms\Components\Timezone;

class BoardResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('name'),
                Builder::make('tiles')
                    ->blocks([
                        Block::make('clock-analog')
                            ->label('Analog Clock')
                            ->schema([
                                Timezone::make('timezone')
                                    ->searchable()
                                    ->required(),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('length')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                        TextInput::make('width')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                    ]),
                            ]),
                        Block::make('clock-digital')
                            ->label('Digital Clock')
                            ->schema([
                                Timezone::make('timezone')
                                    ->searchable()
                                    ->required(),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('length')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                        TextInput::make('width')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                    ]),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBoards::route('/'),
            'edit' => Pages\EditBoard::route('/{record}/edit'),
        ];
    }
}
