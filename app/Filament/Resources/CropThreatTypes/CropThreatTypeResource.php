<?php

namespace App\Filament\Resources\CropThreatTypes;

use App\Filament\Resources\CropThreatTypes\Pages\CreateCropThreatType;
use App\Filament\Resources\CropThreatTypes\Pages\EditCropThreatType;
use App\Filament\Resources\CropThreatTypes\Pages\ListCropThreatTypes;
use App\Filament\Resources\CropThreatTypes\Pages\ViewCropThreatType;
use App\Filament\Resources\CropThreatTypes\Schemas\CropThreatTypeForm;
use App\Filament\Resources\CropThreatTypes\Schemas\CropThreatTypeInfolist;
use App\Filament\Resources\CropThreatTypes\Tables\CropThreatTypesTable;
use App\Models\CropThreatType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CropThreatTypeResource extends Resource
{
    protected static ?string $model = CropThreatType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CropThreatTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CropThreatTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CropThreatTypesTable::configure($table);
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
            'index' => ListCropThreatTypes::route('/'),
            'create' => CreateCropThreatType::route('/create'),
            'view' => ViewCropThreatType::route('/{record}'),
            'edit' => EditCropThreatType::route('/{record}/edit'),
        ];
    }
}
