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
        Schema::create('match_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('game_category'); // MLBB, Valorant, dll
            $table->string('tournament_name');
            $table->string('match_stage')->nullable(); // Group Stage, Knockout, dll
            
            // Tim Internal 
            // $table->string('team_internal_name');
            // $table->string('team_internal_logo');
            $table->string('team_internal_name')->nullable()->change(); 
            $table->string('team_internal_logo')->nullable()->change();
            
            // Tim Lawan
            $table->string('team_external_name')->nullable(); // Bisa null jika format Rank (Apex)
            $table->string('team_external_logo')->nullable();
            
            // Hasil & Skor
            $table->enum('result_status', ['Win', 'Lose', 'Rank', 'Upcoming'])->default('Upcoming');
            $table->string('score_internal')->default('0');
            $table->string('score_external')->nullable(); // Untuk skor lawan
            
            // Waktu
            $table->dateTime('match_time');
            $table->string('match_link')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_schedules');
    }
};
