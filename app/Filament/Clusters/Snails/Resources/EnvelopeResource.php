<?php

namespace App\Filament\Clusters\Snails\Resources;

use App\Filament\Clusters\Snails;
use App\Filament\Clusters\Snails\Resources\EnvelopeResource\Pages;
use App\Filament\Clusters\Snails\Resources\EnvelopeResource\Pages\ManageEnvelopes;
use App\Filament\Clusters\Snails\Resources\EnvelopeResource\RelationManagers;
use App\Models\Envelope;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EnvelopeResource extends Resource
{
    protected static ?string $model = Envelope::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $cluster = Snails::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
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
                DeleteAction::make(),
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
            'index' => ManageEnvelopes::route('/'),
        ];
    }
}
