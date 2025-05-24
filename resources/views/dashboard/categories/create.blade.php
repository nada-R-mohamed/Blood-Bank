@extends('dashboard.layout')
@section('title', 'Edit Category')
@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    @include('dashboard.categories._form', ['button' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@endsection
