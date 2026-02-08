<?php

namespace App\Filament\Resources\MatchSchedules\Pages;

use App\Filament\Resources\MatchSchedules\MatchScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMatchSchedules extends ListRecords
{
    protected static string $resource = MatchScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
