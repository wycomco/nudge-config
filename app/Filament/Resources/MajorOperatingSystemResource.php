<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MajorOperatingSystemResource\Pages;
use App\Filament\Resources\MajorOperatingSystemResource\RelationManagers;
use App\Models\MajorOperatingSystem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MajorOperatingSystemResource extends Resource
{
    protected static ?string $model = MajorOperatingSystem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->autofocus(),
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('major_upgrade_app_path')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('version')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('minor_operating_systems_count')
                    ->label('Minor OS')
                    ->counts('minorOperatingSystems')
                    ->sortable(),
                Tables\Columns\TextColumn::make('minor_operating_systems_max_release_date')->max('minorOperatingSystems', 'release_date')
                    ->label('Latest release')
                    ->date("Y-m-d")
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('name', 'desc')
            ->persistSortInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MinorOperatingSystemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMajorOperatingSystems::route('/'),
            'create' => Pages\CreateMajorOperatingSystem::route('/create'),
            'edit' => Pages\EditMajorOperatingSystem::route('/{record}/edit'),
        ];
    }
}
