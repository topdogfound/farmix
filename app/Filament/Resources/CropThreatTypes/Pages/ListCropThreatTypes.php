<?php

namespace App\Filament\Resources\CropThreatTypes\Pages;

use App\Filament\Resources\CropThreatTypes\CropThreatTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCropThreatTypes extends ListRecords
{
    protected static string $resource = CropThreatTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
