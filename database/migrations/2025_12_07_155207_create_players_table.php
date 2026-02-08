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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel divisions. 
            // cascadeOnDelete() berarti jika Divisi dihapus, player di dalamnya ikut terhapus.
            $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
            $table->string('name');  // Nickname pemain
            $table->string('role');  // Role in-game (Jungler, Roamer, dll)
            $table->string('image'); // Foto profil pemain
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
