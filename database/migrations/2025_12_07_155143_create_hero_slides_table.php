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
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('game_tag');      // e.g. "HOK DIVISION"
            $table->string('title');         // e.g. "HONOR OF KINGS"
            $table->text('description');     // Deskripsi pendek
            $table->string('image');         // Path gambar upload
            $table->string('overlay_color')->default('#000000');
            $table->decimal('overlay_opacity', 3, 2)->default(0.50);
            $table->boolean('is_active')->default(true); // Status aktif/tidak
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
