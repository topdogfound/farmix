<?php

namespace App\Filament\Resources\CropStages\Pages;

use App\Filament\Resources\CropStages\CropStageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCropStages extends ListRecords
{
    protected static string $resource = CropStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
