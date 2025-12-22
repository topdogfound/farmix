<?php

namespace App\Filament\Resources\SprayControls\Pages;

use App\Filament\Resources\SprayControls\SprayControlResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSprayControls extends ListRecords
{
    protected static string $resource = SprayControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
