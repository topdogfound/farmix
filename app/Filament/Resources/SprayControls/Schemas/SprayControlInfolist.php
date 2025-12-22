<?php

namespace App\Filament\Resources\SprayControls\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SprayControlInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('sprayScheduleItem.display_label')
                    ->label('Spray Schedule'),
                TextEntry::make('cropThreat.name')
                    ->label('Crop Threat')
                    ->numeric(),
                TextEntry::make('chemical.title')
                    ->label('Chemical')
                    ->numeric(),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('unit'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
