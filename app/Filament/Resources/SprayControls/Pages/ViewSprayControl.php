<?php

namespace App\Filament\Resources\SprayControls\Pages;

use App\Filament\Resources\SprayControls\SprayControlResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSprayControl extends ViewRecord
{
    protected static string $resource = SprayControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
