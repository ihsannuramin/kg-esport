<?php

namespace App\Http\Controllers;

use App\Models\MatchSchedule;
use App\Models\Division;
use Illuminate\Http\Request;

class MatchScheduleController extends Controller
{
    public function index()
    {
        // Ambil semua divisi untuk label Tab
        $divisions = Division::all();
        
        // Ambil semua jadwal, urutkan dari yang terbaru (atau mendatang)
        $groupedMatches = MatchSchedule::orderBy('match_time', 'desc')
            ->get()
            ->groupBy('game_category');

        return view('matches.all-schedules', compact('divisions', 'groupedMatches'));
    }
    
}