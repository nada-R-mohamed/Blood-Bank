@extends('dashboard.layout')
@section('title', 'Governorate Details')

@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Governorate Details</h3>
                <a href="{{ route('governorates.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>ID:</strong> {{ $governorate->id }}
                </div>
                <div class="mb-3">
                    <strong>Name:</strong> {{ $governorate->name }}
                </div>
                <div class="mb-3">
                    <strong>Created At:</strong> {{$governorate->created_at ? $governorate->created_at->format('Y-m-d') : ''}}
                </div>
                <div class="mb-3">
                    <strong>Updated At:</strong> {{ $governorate->updated_at ?$governorate->updated_at->format('Y-m-d H:i'):'' }}
                </div>

{{--                --}}{{-- Optional: Show related cities --}}
{{--                @if($governorate->cities->count())--}}
{{--                    <hr>--}}
{{--                    <h5>Cities in this Governorate:</h5>--}}
{{--                    <ul>--}}
{{--                        @foreach($governorate->cities as $city)--}}
{{--                            <li>{{ $city->name }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
@endsection
