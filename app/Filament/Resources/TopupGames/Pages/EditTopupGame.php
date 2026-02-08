<?php

namespace App\Filament\Resources\TopupGames\Pages;

use App\Filament\Resources\TopupGames\TopupGameResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTopupGame extends EditRecord
{
    protected static string $resource = TopupGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
