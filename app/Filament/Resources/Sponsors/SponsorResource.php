<?php

// namespace App\Filament\Resources\Sponsors;
namespace App\Filament\Resources\Sponsors;




use App\Filament\Resources\Sponsors\Tables\SponsorsTable;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

use App\Filament\Resources\Sponsors\Pages\CreateSponsor;
use App\Filament\Resources\Sponsors\Pages\EditSponsor;
use App\Filament\Resources\Sponsors\Pages\ListSponsors;
use App\Filament\Resources\Sponsors\Schemas\SponsorForm;


use App\Filament\Resources\Sponsors\SponsorResource\Pages;
use App\Models\Sponsor;
use Filament\Schemas\Schema;
use Filament\Schemas\Components;

use Filament\Forms; // Import namespace Forms utama
use Filament\Forms\Form; // Import Class Form yang sebelumnya error
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput; // Ini yang Anda cari
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables; // Import namespace Tables utama
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
// use Filament\Tables\Actions\EditAction;
// use Filament\Tables\Actions\DeleteAction;
// use Filament\Tables\Actions\BulkActionGroup;
// use Filament\Tables\Actions\DeleteBulkAction;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;


class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // public static function form(Schema $schema): Schema
    // {
    //     return SponsorForm::configure($schema);
    // }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make('Informasi Sponsor')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('website_url')
                            ->url()
                            ->label('Link Website (Opsional)'),
                            
                        Components\Grid::make(2)
                            ->schema([
                                TextInput::make('width')
                                    ->label('Lebar (CSS)')
                                    ->placeholder('160px atau 10rem')
                                    ->default('160px')
                                    ->required(),
                                    
                                TextInput::make('height')
                                    ->label('Tinggi (CSS)')
                                    ->placeholder('112px atau 7rem')
                                    ->default('112px')
                                    ->required(),
                            ]),
                    ]),

                Components\Section::make('Asset Gambar')
                    ->schema([
                        Select::make('source_type')
                            ->label('Tipe Sumber Gambar')
                            ->options([
                                'upload' => 'Upload File',
                                'url' => 'URL / Link Eksternal',
                            ])
                            ->default('upload')
                            ->live(),
                            // ->afterStateUpdated(fn (Set $set) => $set('image_path', null)),

                        FileUpload::make('image_path')
                            ->label('Upload Logo')
                            ->image()
                            ->directory('sponsors'),
                            // ->visible(fn (Get $get) => $get('source_type') === 'upload')
                            // ->required(fn (Forms\Get $get) => $get('source_type') === 'upload'),

                        TextInput::make('image_url')
                            ->label('URL Logo')
                            ->url(),
                            // ->visible(fn (Forms\Get $get) => $get('source_type') === 'url')
                            // ->required(fn (Forms\Get $get) => $get('source_type') === 'url'),
                    ]),
                    
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    // public static function table(Table $table): Table
    // {
    //     return SponsorsTable::configure($table);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\ImageColumn::make('image_preview')
                //     ->label('Logo')
                //     ->state(function (Sponsor $record) {
                //         return $record->source_type === 'url' 
                //             ? $record->image_url 
                //             : $record->image_path;
                //     }),
                Tables\Columns\ImageColumn::make('logo') // Mengacu pada accessor getLogoAttribute
                    ->label('Logo')
                    ->size(100) 
                    ->extraImgAttributes([
                        'class' => 'object-contain w-full h-full bg-white rounded-md shadow-sm',
                        // 'max-width' memastikan gambar besar tidak "meledak" keluar kolom
                        // 'aspect-ratio' menjaga area tetap kotak meskipun gambar belum dimuat
                        'style' => 'max-width: 100px; max-height: 100px; aspect-ratio: 1/1; object-fit: contain;',
                    ]),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('width')
                    ->label('Dimensi')
                    ->formatStateUsing(fn ($record) => "$record->width x $record->height"),

                Tables\Columns\ToggleColumn::make('is_active'),
            ])
            ->filters([
                //
            ])
            // ->actions([
            //     // 3. Menggunakan prefix Tables\... untuk Action (Solusi Error)
            //     Tables\Actions\EditAction::make(),
            //     Tables\Actions\DeleteAction::make(),
            // ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            // ->bulkActions([
            //     // Tables\Actions\BulkActionGroup::make([
            //     //     Tables\Actions\DeleteBulkAction::make(),
            //     // ]),
            ]);
    }


    public static function getNavigationSort(): ?int
    {
        return 2;
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
            'index' => ListSponsors::route('/'),
            'create' => CreateSponsor::route('/create'),
            'edit' => EditSponsor::route('/{record}/edit'),
        ];
    }
}
