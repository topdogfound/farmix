<?php

namespace App\Filament\Resources\Chemicals\Pages;

use App\Filament\Resources\Chemicals\ChemicalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditChemical extends EditRecord
{
    protected static string $resource = ChemicalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
