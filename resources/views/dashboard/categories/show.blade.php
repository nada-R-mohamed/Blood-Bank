@extends('dashboard.layout')
@section('title', 'Category Details')

@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Category Details</h3>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>ID:</strong> {{ $category->id }}
                </div>
                <div class="mb-3">
                    <strong>Name:</strong> {{ $category->name }}
                </div>
                <div class="mb-3">
                    <strong>Created At:</strong> {{$category->created_at ? $category->created_at->format('Y-m-d') : ''}}
                </div>
                <div class="mb-3">
                    <strong>Updated At:</strong> {{ $category->updated_at ?$category->updated_at->format('Y-m-d H:i'):'' }}
                </div>

            </div>
        </div>
    </div>
@endsection
