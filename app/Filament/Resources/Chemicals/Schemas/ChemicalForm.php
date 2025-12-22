<?php

namespace App\Filament\Resources\Chemicals\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class ChemicalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('chemicalTypeId')
                    ->label('Chemical Type')
                    ->relationship('type', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required()
                    ])
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('brandNames'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('toxicityLevel'),
                TextInput::make('waitingPeriodDays')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('organic')
                    ->required(),
                Toggle::make('banned')
                    ->required(),
            ]);
    }
}
