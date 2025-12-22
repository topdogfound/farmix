<?php

namespace App\Filament\Resources\CropThreatTypes\Pages;

use App\Filament\Resources\CropThreatTypes\CropThreatTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCropThreatType extends EditRecord
{
    protected static string $resource = CropThreatTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
