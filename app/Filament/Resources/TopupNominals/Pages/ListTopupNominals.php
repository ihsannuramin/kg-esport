<?php

namespace App\Filament\Resources\TopupNominals\Pages;

use App\Filament\Resources\TopupNominals\TopupNominalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTopupNominals extends ListRecords
{
    protected static string $resource = TopupNominalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
