<?php

namespace App\Filament\Resources\SprayScheduleItems\Schemas;

use App\Filament\Resources\CropStages\Schemas\CropStageForm;
use App\Filament\Resources\SpraySchedules\Schemas\SprayScheduleForm;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class SprayScheduleItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sprayScheduleId')
                    ->label('Spray Schedule')
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => "{$record->crop->name} - {$record->organization->name} - {$record->year}"
                    )
                    ->relationship('schedule', 'year')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(fn(Schema $schema) => SprayScheduleForm::configure($schema))
                    ->required(),
                Select::make('cropStageId')
                    ->label('Crop Stage')
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => "{$record->crop->name} - {$record->stage->name}"
                    )
                    ->relationship('cropStage', 'id')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(fn(Schema $schema) => CropStageForm::configure($schema))
                    ->required(),
                Textarea::make('remarks')
                    ->columnSpanFull(),
            ]);
    }
}
