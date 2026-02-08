<?php

namespace App\Filament\Resources\TopupNominals;

use App\Filament\Resources\TopupNominals\Pages\CreateTopupNominal;
use App\Filament\Resources\TopupNominals\Pages\EditTopupNominal;
use App\Filament\Resources\TopupNominals\Pages\ListTopupNominals;
use App\Filament\Resources\TopupNominals\Schemas\TopupNominalForm;
use App\Filament\Resources\TopupNominals\Tables\TopupNominalsTable;
use App\Models\TopupNominal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TopupNominalResource extends Resource
{
    protected static ?string $model = TopupNominal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'TopupNominal';

    public static function form(Schema $schema): Schema
    {
        return TopupNominalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TopupNominalsTable::configure($table);
    }

    public static function getNavigationSort(): ?int
    {
        return 8;
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
            'index' => ListTopupNominals::route('/'),
            'create' => CreateTopupNominal::route('/create'),
            'edit' => EditTopupNominal::route('/{record}/edit'),
        ];
    }
}
