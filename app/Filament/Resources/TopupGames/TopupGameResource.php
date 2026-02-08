<?php

namespace App\Filament\Resources\TopupGames;

use App\Filament\Resources\TopupGames\Pages\CreateTopupGame;
use App\Filament\Resources\TopupGames\Pages\EditTopupGame;
use App\Filament\Resources\TopupGames\Pages\ListTopupGames;
use App\Filament\Resources\TopupGames\Schemas\TopupGameForm;
use App\Filament\Resources\TopupGames\Tables\TopupGamesTable;
use App\Models\TopupGame;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TopupGameResource extends Resource
{
    protected static ?string $model = TopupGame::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'TopupGame';

    public static function form(Schema $schema): Schema
    {
        return TopupGameForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TopupGamesTable::configure($table);
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
            'index' => ListTopupGames::route('/'),
            'create' => CreateTopupGame::route('/create'),
            'edit' => EditTopupGame::route('/{record}/edit'),
        ];
    }
}
