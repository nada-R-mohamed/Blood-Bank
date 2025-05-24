@extends('dashboard.layout')
@section('title', 'City Details')

@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">City Details</h3>
                <a href="{{ route('cities.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>ID:</strong> {{ $city->id }}
                </div>
                <div class="mb-3">
                    <strong>Name:</strong> {{ $city->name }}
                </div>
                <div class="mb-3">
                    <strong>Governorate:</strong>
                    <a href="{{ route('governorates.show', $city->governorate_id) }}">
                        {{ $city->governorate->name }}
                    </a>
                </div>
                <div class="mb-3">
                    <strong>Created At:</strong> {{ $city->created_at ? $city->created_at->format('Y-m-d') : '' }}
                </div>
                <div class="mb-3">
                    <strong>Updated At:</strong> {{ $city->updated_at ? $city->updated_at->format('Y-m-d H:i') : '' }}
                </div>

                {{-- Optional: Show related clients --}}
                @if($city->clients->count())
                    <hr>
                    <h5>Clients in this City:</h5>
                    <ul>
                        @foreach($city->clients as $client)
                            <li>{{ $client->name }} ({{ $client->email }})</li>
                        @endforeach
                    </ul>
                @endif

                {{-- Optional: Show related donation requests --}}
{{--                @if($city->donationRequests->count())--}}
{{--                    <hr>--}}
{{--                    <h5>Donation Requests from this City:</h5>--}}
{{--                    <ul>--}}
{{--                        @foreach($city->donationRequests as $request)--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('donation-requests.show', $request->id) }}">--}}
{{--                                    Request #{{ $request->id }} - {{ $request->patient_name }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
@endsection
