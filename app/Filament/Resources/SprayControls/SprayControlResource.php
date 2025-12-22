<?php

namespace App\Filament\Resources\SprayControls;

use App\Filament\Resources\SprayControls\Pages\CreateSprayControl;
use App\Filament\Resources\SprayControls\Pages\EditSprayControl;
use App\Filament\Resources\SprayControls\Pages\ListSprayControls;
use App\Filament\Resources\SprayControls\Pages\ViewSprayControl;
use App\Filament\Resources\SprayControls\Schemas\SprayControlForm;
use App\Filament\Resources\SprayControls\Schemas\SprayControlInfolist;
use App\Filament\Resources\SprayControls\Tables\SprayControlsTable;
use App\Models\SprayControl;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SprayControlResource extends Resource
{
    protected static ?string $model = SprayControl::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SprayControlForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SprayControlInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SprayControlsTable::configure($table);
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
            'index' => ListSprayControls::route('/'),
            'create' => CreateSprayControl::route('/create'),
            'view' => ViewSprayControl::route('/{record}'),
            'edit' => EditSprayControl::route('/{record}/edit'),
        ];
    }
}
