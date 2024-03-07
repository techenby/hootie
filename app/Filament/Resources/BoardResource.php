<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardResource\Pages\EditBoard;
use App\Filament\Resources\BoardResource\Pages\ListBoards;
use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\ZipRequest;
use App\Models\Board;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
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
                    ->addActionLabel('Add a new tile')
                    ->blockNumbers(false)
                    ->collapsed()
                    ->collapsible()
                    ->cloneable()
                    ->dehydrateStateUsing(function (array $state) {
                        foreach ($state as $index => $tile) {
                            if ($tile['type'] === 'weather' || $tile['type'] === 'pressure') {
                                $weather = new OpenWeatherConnector(config('services.openweather.key'));
                                $request = new ZipRequest($tile['data']['zip']);

                                $response = $weather->send($request)->json();

                                $tile['data'] = array_merge($tile['data'], $response);

                                $state[$index] = $tile;
                            }
                        }

                        return $state;
                    })
                    ->blocks([
                        Block::make('clock-analog')
                            ->columns(2)
                            ->icon('heroicon-m-clock')
                            ->label(function (?array $state): string {
                                if ($state === null) {
                                    return 'Analog Clock';
                                }

                                return 'Analog Clock (' . $state['timezone'] . ')';
                            })
                            ->schema([
                                Timezone::make('timezone')
                                    ->searchable()
                                    ->required(),
                                self::getTypeField('blade'),
                                self::getSizeFieldset(),
                            ]),
                        Block::make('clock-digital')
                            ->columns(2)
                            ->icon('heroicon-m-clock')
                            ->label(function (?array $state): string {
                                if ($state === null) {
                                    return 'Digital Clock';
                                }

                                return 'Digital Clock (' . $state['timezone'] . ')';
                            })
                            ->schema([
                                Timezone::make('timezone')
                                    ->searchable()
                                    ->required(),
                                self::getSizeFieldset(),
                                self::getTypeField('blade'),
                            ]),
                        Block::make('weather')
                            ->columns(2)
                            ->icon('heroicon-m-cloud')
                            ->label(function (?array $state): string {
                                if (empty($state)) {
                                    return 'Weather';
                                }

                                return 'Weather (' . $state['zip'] . ')';
                            })
                            ->schema([
                                TextInput::make('zip'),
                                self::getSizeFieldset(),
                                self::getTypeField('livewire'),
                            ]),
                        Block::make('pressure')
                            ->columns(2)
                            ->icon('heroicon-m-cloud')
                            ->label(function (?array $state): string {
                                if (empty($state)) {
                                    return 'Barometric Pressure';
                                }

                                return 'Barometric Pressure (' . $state['zip'] . ')';
                            })
                            ->schema([
                                TextInput::make('zip'),
                                Timezone::make('timezone')
                                    ->searchable(),
                                self::getSizeFieldset(),
                                self::getTypeField('livewire'),
                            ]),
                        Block::make('monthly-calendar')
                            ->columns(2)
                            ->icon('heroicon-m-calendar')
                            ->label(function (?array $state): string {
                                if ($state === null) {
                                    return 'Monthly Calendar';
                                }

                                return 'Monthly Calendar (' . $state['timezone'] . ')';
                            })
                            ->schema([
                                Timezone::make('timezone')
                                    ->searchable()
                                    ->required(),
                                self::getSizeFieldset(),
                                self::getTypeField('livewire'),
                            ]),
                        Block::make('agenda-calendar')
                            ->columns(2)
                            ->icon('heroicon-m-calendar')
                            ->label(function (?array $state): string {
                                if ($state === null) {
                                    return 'Agenda Calendar';
                                }

                                return 'Agenda Calendar (' . $state['name'] . ')';
                            })
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                Repeater::make('emails')
                                    ->simple(
                                        TextInput::make('email')
                                            ->email()
                                            ->required(),
                                    )
                                    ->helperText('Share your calendar with `newhouse-dashboard@home-dashboard-169916.iam.gserviceaccount.com`'),
                                self::getSizeFieldset(),
                                self::getTypeField('livewire'),
                            ]),
                        Block::make('github')
                            ->columns(2)
                            ->label('GitHub')
                            ->schema([
                                Repeater::make('repos')
                                    ->simple(
                                        TextInput::make('repo')
                                            ->required(),
                                    ),
                                self::getSizeFieldset(),
                                self::getTypeField('blade'),
                            ]),
                    ]),
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
            'index' => ListBoards::route('/'),
            'edit' => EditBoard::route('/{record}/edit'),
        ];
    }

    private static function getSizeFieldset()
    {
        return Fieldset::make('Size')
            ->schema([
                TextInput::make('height')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('width')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }

    private static function getTypeField($type)
    {
        return TextInput::make('type')
            ->default($type)
            ->hidden();
    }
}
