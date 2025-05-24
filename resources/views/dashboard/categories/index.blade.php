@extends('dashboard.layout')
@section('body')
        <div class="container-fluid">
            <div class="card">
                @include('dashboard.partials.alerts')
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Categories</h3>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add Category</a>
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
                        @forelse($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><a href="{{ route('categories.show',$category) }}">{{ $category->name }}</a></td>
                                <td>{{ $category->created_at ? $category->created_at->format('Y-m-d') : '' }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $category->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $category->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4">No categories found.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
@endsection
