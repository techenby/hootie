<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PointResource\Pages;
use App\Filament\Resources\PointResource\Pages\CreatePoint;
use App\Filament\Resources\PointResource\Pages\EditPoint;
use App\Filament\Resources\PointResource\Pages\ListPoints;
use App\Filament\Resources\PointResource\RelationManagers;
use App\Models\Point;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PointResource extends Resource
{
    protected static ?string $model = Point::class;

    protected static ?string $navigationGroup = 'Delta';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('yesterday_temp')
                    ->required()
                    ->numeric(),
                TextInput::make('today_temp')
                    ->required()
                    ->numeric(),
                TextInput::make('yesterday_weather')
                    ->required()
                    ->maxLength(255),
                TextInput::make('today_weather')
                    ->required()
                    ->maxLength(255),
                Radio::make('joint')
                    ->options([
                        'none' => 'None',
                        'mild' => 'Mild',
                        'moderate' => 'Moderate',
                        'severe' => 'Severe',
                    ]),
                Radio::make('muscle')
                    ->options([
                        'none' => 'None',
                        'mild' => 'Mild',
                        'moderate' => 'Moderate',
                        'severe' => 'Severe',
                    ]),
                Textarea::make('notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('yesterday_temp')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('today_temp')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('yesterday_weather')
                    ->searchable(),
                TextColumn::make('today_weather')
                    ->searchable(),
                TextColumn::make('joint_pain')
                    ->searchable(),
                TextColumn::make('muscle_pain')
                    ->searchable(),
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
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPoints::route('/'),
            'create' => CreatePoint::route('/create'),
            'edit' => EditPoint::route('/{record}/edit'),
        ];
    }
}
