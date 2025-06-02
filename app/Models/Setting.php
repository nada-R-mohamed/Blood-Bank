<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'notification_setting_text',
        'about_app',
        'phone',
        'email',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'google_play_url',
        'app_store_url',
    ];
}
