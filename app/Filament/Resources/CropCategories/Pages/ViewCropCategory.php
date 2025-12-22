<?php

namespace App\Filament\Resources\CropCategories\Pages;

use App\Filament\Resources\CropCategories\CropCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCropCategory extends ViewRecord
{
    protected static string $resource = CropCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
