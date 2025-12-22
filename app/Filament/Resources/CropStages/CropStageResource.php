<?php

namespace App\Filament\Resources\CropStages;

use App\Filament\Resources\CropStages\Pages\CreateCropStage;
use App\Filament\Resources\CropStages\Pages\EditCropStage;
use App\Filament\Resources\CropStages\Pages\ListCropStages;
use App\Filament\Resources\CropStages\Pages\ViewCropStage;
use App\Filament\Resources\CropStages\Schemas\CropStageForm;
use App\Filament\Resources\CropStages\Schemas\CropStageInfolist;
use App\Filament\Resources\CropStages\Tables\CropStagesTable;
use App\Models\CropStage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CropStageResource extends Resource
{
    protected static ?string $model = CropStage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CropStageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CropStageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CropStagesTable::configure($table);
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
            'index' => ListCropStages::route('/'),
            'create' => CreateCropStage::route('/create'),
            'view' => ViewCropStage::route('/{record}'),
            'edit' => EditCropStage::route('/{record}/edit'),
        ];
    }
}
