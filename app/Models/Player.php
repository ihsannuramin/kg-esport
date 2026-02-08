<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi: Pemain milik satu Divisi
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}