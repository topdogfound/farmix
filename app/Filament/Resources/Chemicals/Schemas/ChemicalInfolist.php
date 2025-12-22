<?php

namespace App\Filament\Resources\Chemicals\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ChemicalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('type.name')
                    ->label('Chemical Type'),
                TextEntry::make('title'),
                TextEntry::make('brandNames')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('toxicityLevel')
                    ->placeholder('-'),
                TextEntry::make('waitingPeriodDays')
                    ->numeric(),
                IconEntry::make('organic')
                    ->boolean(),
                IconEntry::make('banned')
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
