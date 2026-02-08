<?php

namespace App\Filament\Resources\TopUps\Pages;

use App\Filament\Resources\TopUps\TopUpResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTopUp extends EditRecord
{
    protected static string $resource = TopUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
