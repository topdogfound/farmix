<?php

namespace App\Filament\Resources\SpraySchedules\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Filament\Resources\Crops\Schemas\CropForm;
use App\Filament\Resources\Organizations\Schemas\OrganizationForm;
use Filament\Forms\Components\DatePicker;

class SprayScheduleForm
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
                    ->relationship(name: 'crop', titleAttribute: 'name')
                    ->createOptionForm(fn(Schema $schema) => CropForm::configure($schema))
                    ->required(),
                Select::make('organizationId')
                    ->label('Organization')
                    ->relationship('organization', 'name')
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'organization', titleAttribute: 'name')
                    ->createOptionForm(fn(Schema $schema) => OrganizationForm::configure($schema))
                    ->required(),
                Select::make('year')
                    ->options(array_combine(range(2020, date('Y')), range(2020, date('Y'))))
                    ->required(),
                TextInput::make('sourcePdfPath')
                    ->required(),
                TextInput::make('version'),
                Toggle::make('isActive')
                    ->required(),
            ]);
    }
}
