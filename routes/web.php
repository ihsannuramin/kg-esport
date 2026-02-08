<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MatchScheduleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('home');
// Route::get('/matches/all', [MatchScheduleController::class, 'index'])->name('matches.all');
Route::get('/match-schedules', [MatchScheduleController::class, 'index'])->name('matches.all');

// Catatan:
// Route untuk Admin Panel (/admin) tidak perlu ditulis di sini
// karena sudah otomatis di-handle oleh Filament PHP.

