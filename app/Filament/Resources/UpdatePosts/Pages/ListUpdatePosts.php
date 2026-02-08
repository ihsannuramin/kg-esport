<?php

namespace App\Filament\Resources\UpdatePosts\Pages;

use App\Filament\Resources\UpdatePosts\UpdatePostResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUpdatePosts extends ListRecords
{
    protected static string $resource = UpdatePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
