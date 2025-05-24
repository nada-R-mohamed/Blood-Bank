@extends('dashboard.layout')
@section('body')
    <div class="container-fluid">
        <div class="card">
            @include('dashboard.partials.alerts')
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Cities</h3>
                <a href="{{ route('cities.create') }}" class="btn btn-primary btn-sm">Add City</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Governorate</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cities as $index => $city)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="{{ route('cities.show', $city) }}">{{ $city->name }}</a></td>
                            <td>{{ $city->governorate->name }}</td>
                            <td>{{ $city->created_at ? $city->created_at->format('Y-m-d') : '' }}</td>
                            <td>
                                <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $city->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $city->id }})">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No cities found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $cities->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
