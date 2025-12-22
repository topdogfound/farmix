<?php

namespace App\Filament\Resources\CropThreats\Pages;

use App\Filament\Resources\CropThreats\CropThreatResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCropThreat extends EditRecord
{
    protected static string $resource = CropThreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
