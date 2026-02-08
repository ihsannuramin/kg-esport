<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

use Filament\Forms;
use Filament\Forms\Form; // <--- Wajib ada
use Filament\Resources\Resource; // <--- Wajib ada
use Filament\Tables;
use Filament\Tables\Table; // <--- Wajib ada
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Support\HtmlString;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('game_tag')->required(),
                // TextInput::make('title')->required(),
                // Textarea::make('description')->required()->columnSpanFull(),
                // FileUpload::make('image')->image()->required(),
                // Toggle::make('is_active')->required(),


                TextInput::make('game_tag')
                    ->label('Tag Divisi / Game')
                    ->placeholder('Contoh: HOK DIVISION')
                    ->required()
                    ->maxLength(50),

                TextInput::make('title')
                    ->label('Judul Utama')
                    ->placeholder('Contoh: HONOR OF KINGS')
                    ->required()
                    ->maxLength(100),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(3)
                    ->maxLength(255)
                    ->columnSpan('full'),
                    
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),

                // FileUpload::make('image')
                //     ->label('Gambar Background')
                //     ->image()
                //     ->disk('public')       // PENTING: Agar tersimpan di storage/public
                //     ->visibility('public') // PENTING: Agar bisa diakses browser
                //     ->directory('hero-slides')
                //     ->required()
                //     ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Gambar Background')
                    ->image()
                    // --- SOLUSI ERROR 403 ---
                    ->disk('public')        // Pastikan menyimpan di disk public
                    ->visibility('public')  // Pastikan file bisa diakses publik
                    // ------------------------
                    ->directory('hero-slides') // Folder: storage/app/public/hero-slides
                    ->imageEditor() // Fitur crop/rotate bawaan Filament
                    ->imageEditorAspectRatios([
                        '16:9',
                        '21:9',
                    ])
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Format: JPG/PNG. Ukuran rekomendasi: 1920x1080px.'),

                Section::make('Visual Settings')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            ColorPicker::make('overlay_color')
                                ->label('Warna Overlay')
                                ->default('#000000')
                                ->live(), // Memicu refresh preview saat warna diubah

                            Select::make('overlay_opacity')
                                ->label('Kepekatan (Opacity)')
                                ->options([
                                    '0.2' => '20%',
                                    '0.5' => '50%',
                                    '0.8' => '80%',
                                    '1.0' => 'Solid (100%)',
                                ])
                                ->default('0.5')
                                ->live(), // Memicu refresh preview saat opacity diubah
                        ]),

                    Placeholder::make('overlay_preview')
                        ->label('Live Preview')
                        ->columnSpanFull()
                        ->content(function (Get $get) {
                            $color = $get('overlay_color') ?? '#000000';
                            $opacity = $get('overlay_opacity') ?? '0.5';
                            
                            // Ambil path gambar
                            $imagePath = $get('image'); 
                            $bgUrl = $imagePath ? "/storage/" . (is_array($imagePath) ? array_values($imagePath)[0] : $imagePath) : "https://via.placeholder.com/800x200?text=Pilih+Gambar+Banner";

                            // Gunakan variabel PHP untuk membungkus HTML agar lebih bersih
                            $html = "
                                <div style='position: relative; width: 100%; height: 200px; border-radius: 12px; overflow: hidden; border: 1px solid #ddd; background: #333;'>
                                    <img src='{$bgUrl}' style='position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;'>
                                    
                                    <div style='position: absolute; inset: 0; background: linear-gradient(to right, {$color}, transparent); opacity: {$opacity};'>
                                    </div>

                                    <div style='position: absolute; inset: 0; display: flex; align-items: center; padding: 0 24px;'>
                                        <div style='color: white; font-family: sans-serif;'>
                                            <p style='font-size: 10px; font-weight: bold; margin: 0; opacity: 0.8;'>PREVIEW TAG</p>
                                            <h2 style='font-size: 20px; font-weight: 900; margin: 0; text-transform: uppercase;'>Preview Title</h2>
                                        </div>
                                    </div>
                                </div>
                                <p style='font-size: 12px; color: #666; margin-top: 8px; font-style: italic;'>* Simulasi tampilan gradien banner secara real-time.</p>
                            ";

                            return new HtmlString($html);
                        }),
                ]),

            ]);
    }
}
