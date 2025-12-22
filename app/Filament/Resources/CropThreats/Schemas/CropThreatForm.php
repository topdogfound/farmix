<?php

namespace App\Filament\Resources\CropThreats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use App\Filament\Resources\CropThreatTypes\Schemas\CropThreatTypeForm;

use Filament\Forms\Components\Select;

class CropThreatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('cropThreatTypeId')
                    ->label('Crop Threat Type')
                    ->relationship(
                        name: 'type',
                        titleAttribute: 'name' // 👈 must exist on SprayScheduleItem
                    )
                    ->searchable()
                    ->preload()
                    ->createOptionForm(fn(Schema $schema) => CropThreatTypeForm::configure($schema))
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
