@extends('dashboard.layout')
@section('title','Donation Requests')
@section('body')
    @include('dashboard.partials.alerts')

    <form method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="search" placeholder="Search..." class="form-control" value="{{ request('search') }}">
        <select name="blood_type_id" class="form-select">
            <option value="">All Blood Types</option>
            @foreach($bloodTypes as $bloodType)
                <option value="{{ $bloodType->id }}" {{ request('blood_type_id') == $bloodType->id ? 'selected' : '' }}>
                    {{ $bloodType->name }}
                </option>
            @endforeach
        </select>
        <select name="city_id" class="form-select">
            <option value="">All Cities</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Patient</th>
            <th>Phone</th>
            <th>Blood Type</th>
            <th>City</th>
            <th>Hospital</th>
            <th>Bags</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($donations as $index => $donation)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><a href="{{ route('donation-requests.show', $donation) }}">{{ $donation->patient_name }}</a></td>
                <td>{{ $donation->patient_phone }}</td>
                <td>{{ $donation->bloodType->name ?? '-' }}</td>
                <td>{{ $donation->city->name ?? '-' }}</td>
                <td>{{ $donation->hospital_name }}</td>
                <td>{{ $donation->bags_num }}</td>
                <td>
                    <form method="POST" action="{{ route('donation-requests.destroy', $donation) }}" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No donation requests found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
