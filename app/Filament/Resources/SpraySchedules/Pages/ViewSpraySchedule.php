<?php

namespace App\Filament\Resources\SpraySchedules\Pages;

use App\Filament\Resources\SpraySchedules\SprayScheduleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSpraySchedule extends ViewRecord
{
    protected static string $resource = SprayScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
