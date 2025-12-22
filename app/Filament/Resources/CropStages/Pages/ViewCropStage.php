<?php

namespace App\Filament\Resources\CropStages\Pages;

use App\Filament\Resources\CropStages\CropStageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCropStage extends ViewRecord
{
    protected static string $resource = CropStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
