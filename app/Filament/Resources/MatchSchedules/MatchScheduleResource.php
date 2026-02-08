<?php

namespace App\Filament\Resources\MatchSchedules;

use App\Filament\Resources\MatchSchedules\Pages\CreateMatchSchedule;
use App\Filament\Resources\MatchSchedules\Pages\EditMatchSchedule;
use App\Filament\Resources\MatchSchedules\Pages\ListMatchSchedules;
use App\Filament\Resources\MatchSchedules\Schemas\MatchScheduleForm;
use App\Filament\Resources\MatchSchedules\Tables\MatchSchedulesTable;
use App\Models\MatchSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Filament\Forms\Form; // Entry point utama di Resource tetap Form


class MatchScheduleResource extends Resource
{
    protected static ?string $model = MatchSchedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // public static function form(Schema $schema): Schema
    // {
    //     return MatchScheduleForm::configure($schema);
    // }

    public static function form(Schema $schema): Schema
    {
        return MatchScheduleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MatchSchedulesTable::configure($table);
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
            'index' => ListMatchSchedules::route('/'),
            'create' => CreateMatchSchedule::route('/create'),
            'edit' => EditMatchSchedule::route('/{record}/edit'),
        ];
    }
}
