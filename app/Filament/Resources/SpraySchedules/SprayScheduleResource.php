<?php

namespace App\Filament\Resources\SpraySchedules;

use App\Filament\Resources\SpraySchedules\Pages\CreateSpraySchedule;
use App\Filament\Resources\SpraySchedules\Pages\EditSpraySchedule;
use App\Filament\Resources\SpraySchedules\Pages\ListSpraySchedules;
use App\Filament\Resources\SpraySchedules\Pages\ViewSpraySchedule;
use App\Filament\Resources\SpraySchedules\Schemas\SprayScheduleForm;
use App\Filament\Resources\SpraySchedules\Schemas\SprayScheduleInfolist;
use App\Filament\Resources\SpraySchedules\Tables\SpraySchedulesTable;
use App\Models\SpraySchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class SprayScheduleResource extends Resource
{
    protected static ?string $model = SpraySchedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SprayScheduleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SprayScheduleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpraySchedulesTable::configure($table);
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
            'index' => ListSpraySchedules::route('/'),
            'create' => CreateSpraySchedule::route('/create'),
            'view' => ViewSpraySchedule::route('/{record}'),
            'edit' => EditSpraySchedule::route('/{record}/edit'),
        ];
    }
}
