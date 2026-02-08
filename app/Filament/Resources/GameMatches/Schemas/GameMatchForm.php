<?php

namespace App\Filament\Resources\GameMatches\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GameMatchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('team_a')
                    ->required(),
                TextInput::make('team_b')
                    ->required(),
                TextInput::make('score_a')
                    ->default(null),
                TextInput::make('score_b')
                    ->default(null),
                TextInput::make('tournament_name')
                    ->required(),
                DateTimePicker::make('match_time')
                    ->required(),
                Select::make('status')
                    ->options(['upcoming' => 'Upcoming', 'finished' => 'Finished'])
                    ->default('upcoming')
                    ->required(),
                TextInput::make('livestream_link')
                    ->default(null),
            ]);
    }
}
