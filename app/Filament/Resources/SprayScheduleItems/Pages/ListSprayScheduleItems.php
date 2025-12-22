<?php

namespace App\Filament\Resources\SprayScheduleItems\Pages;

use App\Filament\Resources\SprayScheduleItems\SprayScheduleItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSprayScheduleItems extends ListRecords
{
    protected static string $resource = SprayScheduleItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
