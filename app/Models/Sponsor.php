<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Sponsor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'name',
        'website_url',
        'source_type',
        'image_path',
        'image_url',
        'is_active',
        'sort_order',
    ];

    // public function getLogoAttribute()
    // {
    //     if ($this->image_source_type === 'url' && !empty($this->image_url)) {
    //         return $this->image_url;
    //     }

    //     if ($this->image_source_type === 'upload' && !empty($this->image_path)) {
    //         return Storage::url($this->image_path);
    //     }

    //     return 'https://via.placeholder.com/150?text=' . urlencode($this->name); // Fallback
    // }

    public function getLogoAttribute()
    {
        if ($this->source_type === 'url' && !empty($this->image_url)) {
            return $this->image_url;
        }

        if ($this->source_type === 'upload' && !empty($this->image_path)) {
            return Storage::url($this->image_path);
        }

        return 'https://via.placeholder.com/150?text=' . urlencode($this->name); // Fallback
    }

    // public function getLogoAttribute()
    // {

    //     if ($this->source_type === 'url' && !empty($this->image_url)) {
    //         return $this->image_url;
    //     }

    //     if ($this->source_type === 'upload' && !empty($this->image_path)) {
    //         // Gunakan disk sesuai konfigurasi Filament (biasanya 'public')
    //         return Storage::disk('public')->url($this->image_path);
    //     }

    //     return 'https://via.placeholder.com/150?text=' . urlencode($this->name);
    // }


    // Helper untuk mengambil URL gambar yang valid secara otomatis
    // public function getLogoAttribute()
    // {
    //     if ($this->source_type === 'url') {
    //         return $this->image_url;
    //     }

    //     dd($this->source_type);

    //     return $this->image_path ? Storage::url($this->image_path) : null;
    // }
}