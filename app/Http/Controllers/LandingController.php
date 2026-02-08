<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSlide;
use App\Models\Sponsor;
use App\Models\GameMatch;
use App\Models\Division;
use App\Models\Content;
use App\Models\Product;
use App\Models\TopUp;
use App\Models\MatchSchedule;

class LandingController extends Controller
{
    public function index()
    {

        return view('landing.index', [
            // Slide Hero (Hanya yang status aktif)
            'slides' => HeroSlide::where('is_active', true)->latest()->get(),
            
            // Sponsor
            'sponsors' => Sponsor::where('is_active', true)
                ->orderBy('sort_order')
                ->get(),
            // $sponsors = \App\Models\Sponsor::where('is_active', true)
            //     ->orderBy('sort_order', 'asc')
            //     ->get();
            
            'matches' => MatchSchedule::orderBy('match_time', 'desc')->paginate(5),

            // Match: Upcoming (Diurutkan berdasarkan waktu terdekat)
            'upcomingMatches' => GameMatch::where('status', 'upcoming')
                ->orderBy('match_time', 'asc')
                ->take(3)
                ->get(),
                
            // Match: Results (Diurutkan dari yang baru selesai)
            'resultsMatches' => GameMatch::where('status', 'finished')
                ->orderBy('match_time', 'desc')
                ->take(3)
                ->get(),
            
            // Divisi & Pemain (Eager Loading relation players agar efisien)
            'divisions' => Division::with('players')->get(),
            
            // Updates: Video & Artikel
            'videos' => Content::where('type', 'video')->latest()->take(3)->get(),
            'articles' => Content::where('type', 'article')->latest()->take(3)->get(),
            
            // Shop
            'products' => Product::latest()->take(3)->get(),
            
            // Top Up
            'topups' => TopUp::orderBy('price', 'asc')->get(),
        ]);
    }
}