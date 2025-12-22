<?php

namespace App\Filament\Resources\CropThreats\Pages;

use App\Filament\Resources\CropThreats\CropThreatResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCropThreat extends ViewRecord
{
    protected static string $resource = CropThreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
