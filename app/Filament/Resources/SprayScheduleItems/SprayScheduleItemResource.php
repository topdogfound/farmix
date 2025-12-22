<?php

namespace App\Filament\Resources\SprayScheduleItems;

use App\Filament\Resources\SprayScheduleItems\Pages\CreateSprayScheduleItem;
use App\Filament\Resources\SprayScheduleItems\Pages\EditSprayScheduleItem;
use App\Filament\Resources\SprayScheduleItems\Pages\ListSprayScheduleItems;
use App\Filament\Resources\SprayScheduleItems\Pages\ViewSprayScheduleItem;
use App\Filament\Resources\SprayScheduleItems\Schemas\SprayScheduleItemForm;
use App\Filament\Resources\SprayScheduleItems\Schemas\SprayScheduleItemInfolist;
use App\Filament\Resources\SprayScheduleItems\Tables\SprayScheduleItemsTable;
use App\Models\SprayScheduleItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SprayScheduleItemResource extends Resource
{
    protected static ?string $model = SprayScheduleItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SprayScheduleItemForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SprayScheduleItemInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SprayScheduleItemsTable::configure($table);
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
            'index' => ListSprayScheduleItems::route('/'),
            'create' => CreateSprayScheduleItem::route('/create'),
            'view' => ViewSprayScheduleItem::route('/{record}'),
            'edit' => EditSprayScheduleItem::route('/{record}/edit'),
        ];
    }
}
