<?php

namespace App\Filament\Resources\SpraySchedules\Pages;

use App\Filament\Resources\SpraySchedules\SprayScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpraySchedules extends ListRecords
{
    protected static string $resource = SprayScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
