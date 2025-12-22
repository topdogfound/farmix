<?php

namespace App\Filament\Resources\Chemicals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChemicalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type.name')
                    ->label('Chemical Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('brandNames')
                    ->searchable(),
                TextColumn::make('toxicityLevel')
                    ->searchable(),
                TextColumn::make('waitingPeriodDays')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('organic')
                    ->boolean(),
                IconColumn::make('banned')
                    ->boolean(),
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
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
