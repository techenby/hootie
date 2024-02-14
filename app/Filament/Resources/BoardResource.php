<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardResource\Pages;
use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\ZipRequest;
use App\Models\Board;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
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
                Timezone::make('timezone')
                    ->searchable()
                    ->required(),
                Builder::make('tiles')
                    ->collapsible()
                    ->blocks([
                        Block::make('clock-analog')
                            ->label('Analog Clock')
                            ->schema([
                                TextInput::make('type')
                                    ->default('blade')
                                    ->hidden(),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('height')
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
                                TextInput::make('type')
                                    ->default('blade')
                                    ->hidden(),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('height')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                        TextInput::make('width')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                    ]),
                            ]),
                        Block::make('weather')
                            ->label('Weather')
                            ->schema([
                                TextInput::make('type')
                                    ->default('livewire')
                                    ->hidden(),
                                TextInput::make('zip'),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('height')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                        TextInput::make('width')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                    ]),
                            ]),
                        Block::make('monthly-calendar')
                            ->label('Monthly Calendar')
                            ->schema([
                                TextInput::make('type')
                                    ->default('livewire')
                                    ->hidden(),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('height')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                        TextInput::make('width')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                    ]),
                            ]),
                        Block::make('agenda-calendar')
                            ->label('Agenda Calendar')
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                Repeater::make('emails')
                                    ->simple(
                                        TextInput::make('email')
                                            ->email()
                                            ->required(),
                                    ),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('height')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                        TextInput::make('width')
                                            ->required()
                                            ->numeric()
                                            ->default(1),
                                    ]),
                            ]),
                        Block::make('github')
                            ->label('GitHub')
                            ->schema([
                                Repeater::make('repos')
                                    ->simple(
                                        TextInput::make('repo')
                                            ->required(),
                                    ),
                                Fieldset::make('Size')
                                    ->schema([
                                        TextInput::make('height')
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
                    ->dehydrateStateUsing(function (array $state, Get $get) {
                        foreach($state as $index => $tile) {
                            if ($tile['type'] === 'weather') {
                                $weather = new OpenWeatherConnector(config("services.openweather.key"));
                                $request = new ZipRequest($tile['data']['zip']);

                                $response = $weather->send($request)->json();

                                $tile['data'] = array_merge($tile['data'], $response);

                                $state[$index] = $tile;
                            } else if (in_array($tile['type'], ['clock-analog', 'clock-digital', 'monthly-calendar', 'agenda-calendar'])) {
                                $state[$index]['data']['timezone'] = $get('timezone');
                            }
                        }

                        return $state;
                    }),
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
