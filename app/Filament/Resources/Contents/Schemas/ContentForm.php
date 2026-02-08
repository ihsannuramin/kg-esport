<?php

namespace App\Filament\Resources\Contents\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('type')
                    ->options(['video' => 'Video', 'article' => 'Article'])
                    ->required(),
                TextInput::make('thumbnail')
                    ->required(),
                TextInput::make('link')
                    ->default(null),
                DatePicker::make('published_date')
                    ->required(),
            ]);
    }
}
