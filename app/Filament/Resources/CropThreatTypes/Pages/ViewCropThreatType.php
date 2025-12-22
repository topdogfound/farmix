<?php

namespace App\Filament\Resources\CropThreatTypes\Pages;

use App\Filament\Resources\CropThreatTypes\CropThreatTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCropThreatType extends ViewRecord
{
    protected static string $resource = CropThreatTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
