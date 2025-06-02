@extends('dashboard.layout')
@section('title','Donation Request Details')
@section('body')
    <div class="container-fluid">
        @include('dashboard.partials.alerts')
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Donation Request Details</h4>
                <a href="{{ route('donation-requests.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <p><strong>Patient Name:</strong> {{ $donationRequest->patient_name }}</p>
                <p><strong>Phone:</strong> {{ $donationRequest->patient_phone }}</p>
                <p><strong>Age:</strong> {{ $donationRequest->patient_age }}</p>
                <p><strong>Blood Type:</strong> {{ $donationRequest->bloodType->name ?? '-' }}</p>
                <p><strong>City:</strong> {{ $donationRequest->city->name ?? '-' }}</p>
                <p><strong>Hospital:</strong> {{ $donationRequest->hospital_name }}</p>
                <p><strong>Address:</strong> {{ $donationRequest->hospital_address }}</p>
                <p><strong>Bags Needed:</strong> {{ $donationRequest->bags_num }}</p>
                <p><strong>Details:</strong> {{ $donationRequest->details }}</p>
                <p><strong>Location:</strong> Lat: {{ $donationRequest->latitude }}, Long: {{ $donationRequest->longitude }}</p>
            </div>
        </div>
    </div>
@endsection
