@extends('dashboard.layout')
@section('title', 'Create Article')

@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Article</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.articles._form', ['button' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@endsection
