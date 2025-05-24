@extends('dashboard.layout')
@section('body')
        <div class="container-fluid">
            <div class="card">
                @include('dashboard.partials.alerts')
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Governorates</h3>
                    <a href="{{ route('governorates.create') }}" class="btn btn-primary btn-sm">Add Governorate</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($governorates as $index => $governorate)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><a href="{{ route('governorates.show',$governorate) }}">{{ $governorate->name }}</a></td>
                                <td>{{ $governorate->created_at ? $governorate->created_at->format('Y-m-d') : '' }}</td>
                                <td>
                                    <a href="{{ route('governorates.edit', $governorate->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('governorates.destroy', $governorate->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $governorate->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $governorate->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4">No governorates found.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $governorates->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
@endsection
