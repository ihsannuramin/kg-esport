<?php

namespace App\Filament\Resources\MatchSchedules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class MatchSchedulesTable
{
    public static function configure(Table $table): Table
    {
        // return $table
        //     ->columns([
        //         //
        //     ])
        //     ->filters([
        //         //
        //     ])
        //     ->recordActions([
        //         EditAction::make(),
        //     ])
        //     ->toolbarActions([
        //         BulkActionGroup::make([
        //             DeleteBulkAction::make(),
        //         ]),
        //     ]);

        return $table
        ->columns([
            TextColumn::make('game_category')->badge(),
            TextColumn::make('tournament_name')->searchable(),
            TextColumn::make('result_status')
                ->color(fn (string $state): string => match ($state) {
                    'Win' => 'success',
                    'Lose' => 'danger',
                    'Upcoming' => 'warning',
                    default => 'gray',
                })->badge(),
            TextColumn::make('match_time')->dateTime('d M Y, H:i'),
        ])
        ->filters([
            SelectFilter::make('game_category')
        ])
        ->actions([
            EditAction::make(),
        ]);
    }


}
