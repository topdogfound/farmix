<?php

namespace App\Filament\Resources\Stages\Schemas;

use App\Filament\Resources\Crops\Schemas\CropForm;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class StageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Select::make('cropId')
                //     ->label('Crop')
                //     ->relationship('crops', 'name')
                //     ->searchable()
                //     ->preload()
                //     ->createOptionForm(fn(Schema $schema) => CropForm::configure($schema))
                //     ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('sequence')
                    ->required()
                    ->numeric(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
