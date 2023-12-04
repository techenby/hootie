<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BinResource\Pages\ListBins;
use App\Filament\Resources\BinResource\Pages\ViewBin;
use App\Filament\Resources\BinResource\RelationManagers\ThingsRelationManager;
use App\Models\Bin;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BinResource extends Resource
{
    protected static ?string $model = Bin::class;

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                TextInput::make('type')
                    ->maxLength(255),
                FileUpload::make('photo'),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Details')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('location.name'),
                        TextEntry::make('name'),
                        TextEntry::make('type'),
                        ImageEntry::make('photo'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('location.name')
                    ->sortable()
                    ->sortable(),
                ImageColumn::make('photo'),
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
                SelectFilter::make('location')
                    ->relationship('location', 'name')
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
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
            ThingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBins::route('/'),
            'view' => ViewBin::route('/{record}'),
        ];
    }
}
