<?php

namespace App\Filament\Resources\TopupGames\Pages;

use App\Filament\Resources\TopupGames\TopupGameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTopupGames extends ListRecords
{
    protected static string $resource = TopupGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
