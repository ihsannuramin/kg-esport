<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('home');

// Catatan:
// Route untuk Admin Panel (/admin) tidak perlu ditulis di sini
// karena sudah otomatis di-handle oleh Filament PHP.


