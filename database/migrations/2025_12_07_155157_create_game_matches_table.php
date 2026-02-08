<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_matches', function (Blueprint $table) {
            $table->id();
            $table->string('team_a');          // Nama Tim A (Kagendra)
            $table->string('team_b');          // Nama Tim B (Lawan)
            $table->string('score_a')->nullable(); // Skor Tim A
            $table->string('score_b')->nullable(); // Skor Tim B
            $table->string('tournament_name'); // e.g. "MPL Season 13"
            $table->dateTime('match_time');    // Waktu pertandingan
            $table->enum('status', ['upcoming', 'finished'])->default('upcoming');
            $table->string('livestream_link')->nullable(); // Link streaming
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_matches');
    }
};
