<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'game_category', 'tournament_name', 'match_stage',
        'team_internal_name', 'team_internal_logo',
        'team_external_name', 'team_external_logo',
        'result_status', 'score_internal', 'score_external',
        'match_time', 'match_link'
    ];

    protected $casts = [
        'match_time' => 'datetime',
    ];

    protected function casts(): array
    {
        return [
            'match_time' => 'datetime',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($match) {
            // Isi nama tim jika kosong
            if (empty($match->team_internal_name)) {
                $match->team_internal_name = 'Kagendra';
            }

            // Isi path logo tim internal secara otomatis
            // Pastikan path ini sesuai dengan tempat Anda menyimpan logo
            if (empty($match->team_internal_logo)) {
                $match->team_internal_logo = 'logos/kagendra-logo.png'; 
            }
        });
    }
}
