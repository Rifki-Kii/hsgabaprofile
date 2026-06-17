<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Homeschooling Group Abdurrahman Bin Auf');
            $table->string('whatsapp_number')->default('628121496464');
            $table->text('address')->nullable();
            $table->string('operational_mon_fri')->default('08:00 - 16:00');
            $table->string('operational_sat')->default('08:00 - 12:00');
            $table->string('operational_sun')->default('Tutup');
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->text('google_maps_embed_url')->nullable();
            $table->text('google_maps_large_url')->nullable();
            
            // Founder section
            $table->string('founder_name')->nullable();
            $table->text('founder_quote')->nullable();
            $table->text('founder_bio')->nullable();
            $table->string('founder_facebook_url')->nullable();
            $table->string('founder_instagram_url')->nullable();
            $table->string('founder_youtube_url')->nullable();
            
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            $table->string('founder_image_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
