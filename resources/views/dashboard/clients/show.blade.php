@extends('dashboard.layout')
@section('body')
    <div class="container-fluid">
        @include('dashboard.partials.alerts')
        <div class="card mt-3">
            <div class="card-header">
                <h4>Client Details</h4>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $client->name }}</p>
                <p><strong>Email:</strong> {{ $client->email }}</p>
                <p><strong>Phone:</strong> {{ $client->phone }}</p>
                <p><strong>Status:</strong> {{ ucfirst($client->status) }}</p>
                <p><strong>City:</strong> {{ $client->city->name ?? '-' }}</p>
                <p><strong>Last Donation Date:</strong> {{ $client->last_donation_date ?? '-' }}</p>
            </div>
        </div>
    </div>
@endsection
