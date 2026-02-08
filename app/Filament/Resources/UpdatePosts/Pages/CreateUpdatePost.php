<?php

namespace App\Filament\Resources\UpdatePosts\Pages;

use App\Filament\Resources\UpdatePosts\UpdatePostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUpdatePost extends CreateRecord
{
    protected static string $resource = UpdatePostResource::class;
}
