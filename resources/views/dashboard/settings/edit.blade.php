@extends('dashboard.layout')
@section('title', 'Edit Settings')
@section('body')

    @include('dashboard.partials.alerts')

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Notification Text</label>
            <textarea name="notification_setting_text" class="form-control" rows="2">{{ old('notification_setting_text', $setting->notification_setting_text) }}</textarea>
        </div>

        <div class="mb-3">
            <label>About App</label>
            <textarea name="about_app" class="form-control" rows="4">{{ old('about_app', $setting->about_app) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email) }}">
        </div>

        <div class="mb-3">
            <label>Facebook URL</label>
            <input type="url" name="facebook_url" class="form-control" value="{{ old('facebook_url', $setting->facebook_url) }}">
        </div>

        <div class="mb-3">
            <label>Twitter URL</label>
            <input type="url" name="twitter_url" class="form-control" value="{{ old('twitter_url', $setting->twitter_url) }}">
        </div>

        <div class="mb-3">
            <label>Instagram URL</label>
            <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $setting->instagram_url) }}">
        </div>

        <div class="mb-3">
            <label>YouTube URL</label>
            <input type="url" name="youtube_url" class="form-control" value="{{ old('youtube_url', $setting->youtube_url) }}">
        </div>

        <div class="mb-3">
            <label>Google Play URL</label>
            <input type="url" name="google_play_url" class="form-control" value="{{ old('google_play_url', $setting->google_play_url) }}">
        </div>

        <div class="mb-3">
            <label>App Store URL</label>
            <input type="url" name="app_store_url" class="form-control" value="{{ old('app_store_url', $setting->app_store_url) }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

@endsection
