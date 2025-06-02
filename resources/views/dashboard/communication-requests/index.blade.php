@extends('dashboard.layout')
@section('title','Communication Requests')
@section('body')
    @include('dashboard.partials.alerts')

    <form method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="search" placeholder="Search title or content..." class="form-control" value="{{ request('search') }}">
        <select name="status" class="form-select">
            <option value="">All</option>
            <option value="done" {{ request('status') === 'done' ? 'selected' : '' }}>Done</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Client</th>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($requests as $index => $request)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $request->client->name ?? '-' }}</td>
                <td>{{ $request->title }}</td>
                <td>{{ Str::limit($request->content, 50) }}</td>
                <td>
                        <span class="badge bg-{{ $request->is_done ? 'success' : 'warning' }}">
                            {{ $request->is_done ? 'Done' : 'Pending' }}
                        </span>
                </td>
                <td>
                    <form method="POST" action="{{ route('communication-requests.destroy', $request) }}" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No communication requests found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
