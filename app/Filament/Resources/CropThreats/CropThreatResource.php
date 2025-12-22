<?php

namespace App\Filament\Resources\CropThreats;

use App\Filament\Resources\CropThreats\Pages\CreateCropThreat;
use App\Filament\Resources\CropThreats\Pages\EditCropThreat;
use App\Filament\Resources\CropThreats\Pages\ListCropThreats;
use App\Filament\Resources\CropThreats\Pages\ViewCropThreat;
use App\Filament\Resources\CropThreats\Schemas\CropThreatForm;
use App\Filament\Resources\CropThreats\Schemas\CropThreatInfolist;
use App\Filament\Resources\CropThreats\Tables\CropThreatsTable;
use App\Models\CropThreat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CropThreatResource extends Resource
{
    protected static ?string $model = CropThreat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CropThreatForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CropThreatInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CropThreatsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCropThreats::route('/'),
            'create' => CreateCropThreat::route('/create'),
            'view' => ViewCropThreat::route('/{record}'),
            'edit' => EditCropThreat::route('/{record}/edit'),
        ];
    }
}
