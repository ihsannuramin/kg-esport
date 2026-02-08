<?php

namespace App\Filament\Resources\TopUps;

use App\Filament\Resources\TopUps\Pages\CreateTopUp;
use App\Filament\Resources\TopUps\Pages\EditTopUp;
use App\Filament\Resources\TopUps\Pages\ListTopUps;
use App\Filament\Resources\TopUps\Schemas\TopUpForm;
use App\Filament\Resources\TopUps\Tables\TopUpsTable;
use App\Models\TopUp;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TopUpResource extends Resource
{
    protected static ?string $model = TopUp::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TopUpForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TopUpsTable::configure($table);
    }

    public static function getNavigationSort(): ?int
    {
        return 7;
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
            'index' => ListTopUps::route('/'),
            'create' => CreateTopUp::route('/create'),
            'edit' => EditTopUp::route('/{record}/edit'),
        ];
    }
}
