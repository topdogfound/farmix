<?php

namespace App\Filament\Resources\SprayScheduleItems\Pages;

use App\Filament\Resources\SprayScheduleItems\SprayScheduleItemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSprayScheduleItem extends ViewRecord
{
    protected static string $resource = SprayScheduleItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
