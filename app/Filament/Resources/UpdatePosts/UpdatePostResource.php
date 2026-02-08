<?php

namespace App\Filament\Resources\UpdatePosts;

use App\Filament\Resources\UpdatePosts\Pages\CreateUpdatePost;
use App\Filament\Resources\UpdatePosts\Pages\EditUpdatePost;
use App\Filament\Resources\UpdatePosts\Pages\ListUpdatePosts;
use App\Filament\Resources\UpdatePosts\Schemas\UpdatePostForm;
use App\Filament\Resources\UpdatePosts\Tables\UpdatePostsTable;
use App\Models\UpdatePost;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UpdatePostResource extends Resource
{
    protected static ?string $model = UpdatePost::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'UpdatePost';

    public static function form(Schema $schema): Schema
    {
        return UpdatePostForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UpdatePostsTable::configure($table);
    }

    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUpdatePosts::route('/'),
            'create' => CreateUpdatePost::route('/create'),
            'edit' => EditUpdatePost::route('/{record}/edit'),
        ];
    }
}
