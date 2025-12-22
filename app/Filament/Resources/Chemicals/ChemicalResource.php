<?php

namespace App\Filament\Resources\Chemicals;

use App\Filament\Resources\Chemicals\Pages\CreateChemical;
use App\Filament\Resources\Chemicals\Pages\EditChemical;
use App\Filament\Resources\Chemicals\Pages\ListChemicals;
use App\Filament\Resources\Chemicals\Pages\ViewChemical;
use App\Filament\Resources\Chemicals\Schemas\ChemicalForm;
use App\Filament\Resources\Chemicals\Schemas\ChemicalInfolist;
use App\Filament\Resources\Chemicals\Tables\ChemicalsTable;
use App\Models\Chemical;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChemicalResource extends Resource
{
    protected static ?string $model = Chemical::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ChemicalForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ChemicalInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChemicalsTable::configure($table);
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
            'index' => ListChemicals::route('/'),
            'create' => CreateChemical::route('/create'),
            'view' => ViewChemical::route('/{record}'),
            'edit' => EditChemical::route('/{record}/edit'),
        ];
    }
}
