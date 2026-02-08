<?php

namespace App\Filament\Resources\UpdatePosts\Pages;

use App\Filament\Resources\UpdatePosts\UpdatePostResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUpdatePost extends EditRecord
{
    protected static string $resource = UpdatePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
