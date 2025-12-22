<?php

namespace App\Filament\Resources\CropStages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CropStageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('cropId')
                    ->numeric(),
                TextEntry::make('stageId')
                    ->numeric(),
            ]);
    }
}
