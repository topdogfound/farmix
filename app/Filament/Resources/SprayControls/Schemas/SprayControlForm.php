<?php

namespace App\Filament\Resources\SprayControls\Schemas;

use App\Filament\Resources\Chemicals\Schemas\ChemicalForm;
use App\Filament\Resources\CropThreats\Schemas\CropThreatForm;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Filament\Resources\SpraySchedules\Schemas\SprayScheduleForm;

use Filament\Schemas\Schema;

class SprayControlForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sprayScheduleItemId')
                    ->label('Spray Schedule Item')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => $record->display_label
                    )
                    ->relationship(
                        name: 'sprayScheduleItem',
                        titleAttribute: 'id' // 👈 must exist on SprayScheduleItem
                    )
                    ->searchable()
                    ->preload()
                    // ->createOptionForm(fn(Schema $schema) => SprayScheduleForm::configure($schema))
                    ->required(),
                Select::make('cropThreatId')
                    ->label('Crop Threat')
                    ->relationship(
                        name: 'cropThreat',
                        titleAttribute: 'name' // 👈 must exist on SprayScheduleItem
                    )
                    ->searchable()
                    ->preload()
                    ->createOptionForm(fn(Schema $schema) => CropThreatForm::configure($schema))
                    ->required(),
                TextInput::make('chemicalId')
                    ->required()
                    ->numeric(),
                Select::make('chemicalId')
                    ->label('Chemical')
                    ->relationship(
                        name: 'chemical',
                        titleAttribute: 'title' // 👈 must exist on SprayScheduleItem
                    )
                    ->searchable()
                    ->preload()
                    ->createOptionForm(fn(Schema $schema) => ChemicalForm::configure($schema))
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                TextInput::make('unit')
                    ->required(),
            ]);
    }
}
