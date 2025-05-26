@extends('dashboard.layout')
@section('title','Clients')
@section('body')
    @include('dashboard.partials.alerts')

    <form method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="search" placeholder="Search..." class="form-control" value="{{ request('search') }}">
        <select name="status" class="form-select">
            <option value="">All</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($clients as $index => $client)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><a href="{{ route('clients.show',$client) }}">{{ $client->name }}</a></td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>
                    <span class="badge bg-{{ $client->status === 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($client->status) }}
                    </span>
                </td>
                <td>
                    <form method="POST" action="{{ route('clients.toggle-status', $client) }}" class="d-inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-sm btn-{{ $client->status === 'active' ? 'warning' : 'success' }}">
                            {{ $client->status === 'active' ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('clients.destroy', $client) }}" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No clients found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
