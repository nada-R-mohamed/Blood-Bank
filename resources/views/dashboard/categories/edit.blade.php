@extends('dashboard.layout')
@section('title', 'Edit Category')
@section('body')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('dashboard.categories._form', ['button' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection
