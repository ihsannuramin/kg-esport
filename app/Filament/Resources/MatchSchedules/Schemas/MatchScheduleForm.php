<?php

namespace App\Filament\Resources\MatchSchedules\Schemas;

use Filament\Schemas\Schema;
// PERBAIKAN: Gunakan namespace Utilities\Get agar cocok dengan Schema
use Filament\Schemas\Components\Utilities\Get; 

use Filament\Forms\Components\Split;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;

class MatchScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Bagian Kiri: Info Utama
                Section::make('Tournament Info')
                    ->schema([
                        Select::make('game_category')
                            ->options([
                                'MOBILE LEGENDS: BANG BANG' => 'Mobile Legends',
                                'VALORANT' => 'Valorant',
                                'APEX LEGENDS' => 'Apex Legends',
                            ])
                            ->native(false)
                            ->required(),

                        TextInput::make('team_internal_name')
                            ->label('Internal Team Name')
                            ->default('Kagendra') // Anda bisa set default di sini agar user tidak repot
                            ->required(),    

                        Hidden::make('team_internal_logo')
                            ->default('logos/kagendra-logo.png'),

                        TextInput::make('tournament_name')
                            ->label('Tournament Name')
                            ->required(),

                        DateTimePicker::make('match_time')
                            ->label('Date & Time')
                            ->required()
                            ->seconds(false),
                    ])->columns(2),

                // Bagian Kanan: Status
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
                            // Sekarang $get akan dikenali dengan benar sebagai instance Utilities\Get
                            ->hidden(fn (Get $get) => in_array($get('result_status'), ['Rank', 'Upcoming'])),
                    ])->grow(false),
            ]);
    }
}