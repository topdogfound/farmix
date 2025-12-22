<?php

namespace App\Filament\Resources\CropStages\Pages;

use App\Filament\Resources\CropStages\CropStageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCropStage extends EditRecord
{
    protected static string $resource = CropStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
