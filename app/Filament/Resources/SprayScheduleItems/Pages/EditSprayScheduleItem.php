<?php

namespace App\Filament\Resources\SprayScheduleItems\Pages;

use App\Filament\Resources\SprayScheduleItems\SprayScheduleItemResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSprayScheduleItem extends EditRecord
{
    protected static string $resource = SprayScheduleItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
