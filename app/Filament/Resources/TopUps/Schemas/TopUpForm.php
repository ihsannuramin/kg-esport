<?php

namespace App\Filament\Resources\TopUps\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TopUpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('diamonds')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }
}
