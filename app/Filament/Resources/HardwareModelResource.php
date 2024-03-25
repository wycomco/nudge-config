<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HardwareModelResource\Pages;
use App\Filament\Resources\HardwareModelResource\RelationManagers;
use App\Models\HardwareModel;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HardwareModelResource extends Resource
{
    protected static ?string $model = HardwareModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->autofocus(),
                Forms\Components\Select::make('max_major_operating_system')
                    ->label('Maximum OS')
                    ->relationship('maxMajorOperatingSystem', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                    ]),
                Repeater::make('model_identifier')
                ->label('Model ID')
                ->simple(
                    Forms\Components\TextInput::make('model_identifier_data')
                        ->required(),
                ),
                Repeater::make('board_identifier')
                ->label('Board / Device ID')
                ->simple(
                    Forms\Components\TextInput::make('board_identifier_data')
                        ->required(),
                ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('maxMajorOperatingSystem.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model_identifier')
                    ->label('Model ID')
                    ->listWithLineBreaks()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('board_identifier')
                    ->label('Board / Device ID')
                    ->listWithLineBreaks()
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('name', 'asc')
            ->persistSortInSession()
            ->filters([
                //
            ])
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHardwareModels::route('/'),
            'create' => Pages\CreateHardwareModel::route('/create'),
            'edit' => Pages\EditHardwareModel::route('/{record}/edit'),
        ];
    }
}
