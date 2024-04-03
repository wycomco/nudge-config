<?php

namespace App\Filament\Resources\MajorOperatingSystemResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MinorOperatingSystemsRelationManager extends RelationManager
{
    protected static string $relationship = 'minorOperatingSystems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('release_date')
                    ->required(),
                Forms\Components\TextInput::make('about_update_url')
                    ->required()
                    ->activeUrl()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('version')
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('release_date')
                    ->searchable()
                    ->date("Y-m-d")
                    ->sortable(),
                Tables\Columns\IconColumn::make('about_update_url')
                    ->icon('heroicon-o-globe-alt')
                    ->alignment(Alignment::Center)
                    ->color('info')
                    ->url(fn ($record) => $record->about_update_url)
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('release_date', 'desc');
    }
}
