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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('profile_title')->nullable();
            $table->text('profile_description_1')->nullable();
            $table->text('profile_description_2')->nullable();
            $table->string('profile_feature_1')->nullable();
            $table->string('profile_feature_2')->nullable();
            $table->string('profile_feature_3')->nullable();
            $table->string('profile_feature_4')->nullable();
            $table->string('profile_image_path')->nullable();
            $table->string('profile_image_caption')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'profile_title',
                'profile_description_1',
                'profile_description_2',
                'profile_feature_1',
                'profile_feature_2',
                'profile_feature_3',
                'profile_feature_4',
                'profile_image_path',
                'profile_image_caption'
            ]);
        });
    }
};
