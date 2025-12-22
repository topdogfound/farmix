<?php

namespace App\Filament\Resources\SpraySchedules\Pages;

use App\Filament\Resources\SpraySchedules\SprayScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSpraySchedule extends EditRecord
{
    protected static string $resource = SprayScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
