<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThingResource\Pages\ManageThings;
use App\Models\Bin;
use App\Models\Thing;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class ThingResource extends Resource
{
    protected static ?string $model = Thing::class;

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('bin_id')
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('location_id', Bin::find($state)->location_id))
                    ->createOptionForm([
                        Select::make('location_id')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ])
                            ->label('Location')
                            ->relationship(name: 'location', titleAttribute: 'name'),
                        TextInput::make('name')
                            ->required(),
                    ])
                    ->label('Bin')
                    ->live(debounce: 500)
                    ->relationship(name: 'bin', titleAttribute: 'name'),
                Select::make('location_id')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                    ])
                    ->label('Location')
                    ->relationship(name: 'location', titleAttribute: 'name'),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('photo'),
                TagsInput::make('categories'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('photo')
                    ->searchable(),
                TextColumn::make('location.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('bin.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('categories')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    ReplicateAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('change-bin')
                        ->form([
                            Select::make('bin_id')
                                ->label('Bin')
                                ->relationship(name: 'bin', titleAttribute: 'name'),
                        ])
                        ->action(fn (Collection $records, $data) => $records->each->update(['bin_id' => $data['bin_id']])),
                    BulkAction::make('change-location')
                        ->form([
                            Select::make('location_id')
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->required(),
                                ])
                                ->label('Location')
                                ->relationship(name: 'location', titleAttribute: 'name'),
                        ])
                        ->action(fn (Collection $records, $data) => $records->each->update(['location_id' => $data['location_id']])),
                    BulkAction::make('refresh-location')
                        ->label('Refresh Location from Bin')
                        ->action(fn (Collection $records, $data) => $records->each(function ($record) {
                            if ($record->bin) {
                                $record->update([
                                    'location_id' => $record->bin->location_id,
                                ]);
                            }
                        })),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageThings::route('/'),
        ];
    }
}
