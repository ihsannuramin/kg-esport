<?php

namespace App\Filament\Resources\TopUps\Pages;

use App\Filament\Resources\TopUps\TopUpResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTopUps extends ListRecords
{
    protected static string $resource = TopUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
