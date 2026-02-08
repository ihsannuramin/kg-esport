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
        // Schema::create('sponsors', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('logo')->nullable();        // Path logo sponsor
        //     $table->string('color_class')->nullable(); // Opsional: class warna CSS (jika teks)
        //     $table->timestamps();
        // });

        // Schema::create('sponsors', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name'); // Nama Sponsor
        //     $table->string('website_url')->nullable(); // Link ke website sponsor (opsional)
            
        //     // Logika untuk opsi Upload atau URL
        //     $table->enum('image_source_type', ['upload', 'url'])->default('upload');
        //     $table->string('image_path')->nullable(); // Jika upload
        //     $table->string('image_url')->nullable();  // Jika URL eksternal
            
        //     $table->boolean('is_active')->default(true);
        //     $table->integer('sort_order')->default(0);
        //     $table->timestamps();
        // });

        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('website_url')->nullable(); // Link ketika logo diklik
            
            // Logic sumber gambar
            $table->enum('source_type', ['upload', 'url'])->default('upload');
            $table->string('image_path')->nullable(); // Untuk file upload
            $table->string('image_url')->nullable();  // Untuk hotlink/URL eksternal
            
            // Custom CSS Dimensions
            $table->string('width')->default('160px'); // Default w-40
            $table->string('height')->default('112px'); // Default h-28
            
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
