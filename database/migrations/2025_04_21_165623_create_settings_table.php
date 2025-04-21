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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('notification_setting_text');
            $table->longText('about_app');
            $table->string('phone');
            $table->string('email');
            $table->text('facebook_url');
            $table->text('twitter_url');
            $table->text('instagram_url');
            $table->text('youtube_url');
            $table->string('google_play_url')->nullable();
            $table->string('app_store_url')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
