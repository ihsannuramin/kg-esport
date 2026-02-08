<?php

namespace App\Filament\Resources\TopupNominals\Pages;

use App\Filament\Resources\TopupNominals\TopupNominalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTopupNominal extends EditRecord
{
    protected static string $resource = TopupNominalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
