<?php

namespace App\Filament\Resources\CropThreats\Pages;

use App\Filament\Resources\CropThreats\CropThreatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCropThreats extends ListRecords
{
    protected static string $resource = CropThreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
