<?php

namespace App\Filament\Resources\SpraySchedules\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SprayScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('cropId')
                    ->numeric(),
                TextEntry::make('organizationId')
                    ->numeric(),
                TextEntry::make('year')
                    ->numeric(),
                TextEntry::make('sourcePdfPath'),
                TextEntry::make('version')
                    ->placeholder('-'),
                IconEntry::make('isActive')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
