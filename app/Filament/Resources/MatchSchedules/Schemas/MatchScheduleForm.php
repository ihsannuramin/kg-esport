<?php

namespace App\Filament\Resources\MatchSchedules\Schemas;

use App\Models\Division; // Tambahkan ini
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;

class MatchScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tournament Info')
                    ->schema([
                        Select::make('game_category')
                            ->label('Division')
                            ->options(Division::all()->pluck('name', 'name'))
                            ->searchable() // Opsional: agar user bisa mencari nama divisi
                            ->native(false)
                            ->required(),

                        TextInput::make('tournament_name')
                            ->label('Tournament Name')
                            ->required(),

                        DateTimePicker::make('match_time')
                            ->label('Date & Time')
                            ->required()
                            ->seconds(false),
                    ])->columns(2),

                Section::make('Match Result')
                    ->schema([
                        Select::make('result_status')
                            ->options([
                                'Win' => 'Win',
                                'Lose' => 'Lose',
                                'Rank' => 'Rank',
                                'Upcoming' => 'Upcoming',
                            ])
                            ->live()
                            ->required(),

                        TextInput::make('score_internal')
                            ->label('RRQ Score / Rank')
                            ->required(),

                        TextInput::make('score_external')
                            ->label('Opponent Score')
                            ->hidden(fn (Get $get) => in_array($get('result_status'), ['Rank', 'Upcoming'])),
                    ])->grow(false),
            ]);
    }
}