<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Mengubah string tanggal dari database menjadi objek Carbon otomatis
    protected $casts = [
        'match_time' => 'datetime',
    ];
}