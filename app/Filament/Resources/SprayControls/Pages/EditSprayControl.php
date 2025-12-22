<?php

namespace App\Filament\Resources\SprayControls\Pages;

use App\Filament\Resources\SprayControls\SprayControlResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSprayControl extends EditRecord
{
    protected static string $resource = SprayControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
