<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::firstOrFail();
        return view('dashboard.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrFail();

        $validated = $request->validate([
            'notification_setting_text' => 'required|string',
            'about_app' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'facebook_url' => 'required|url',
            'twitter_url' => 'required|url',
            'instagram_url' => 'required|url',
            'youtube_url' => 'required|url',
            'google_play_url' => 'nullable|url',
            'app_store_url' => 'nullable|url',
        ]);

        $setting->update($validated);

        return back()->with('success', 'Settings updated successfully.');
    }
}
