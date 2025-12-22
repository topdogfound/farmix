<?php

namespace App\Filament\Resources\CropStages\Schemas;

use App\Filament\Resources\Crops\Schemas\CropForm;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Filament\Resources\Stages\Schemas\StageForm;
use Filament\Schemas\Schema;

class CropStageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('cropId')
                    ->label('Crop')
                    ->relationship('crop', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(fn(Schema $schema) => CropForm::configure($schema))
                    ->required(),
                Select::make('stageId')
                    ->label('Stage')
                    ->relationship('stage', 'name')
                    ->createOptionForm(fn(Schema $schema) => StageForm::configure($schema))
                    ->searchable()
                    ->preload()
                    ->required()
            ]);
    }
}
