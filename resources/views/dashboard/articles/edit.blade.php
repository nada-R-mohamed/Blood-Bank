@extends('dashboard.layout')
@section('title', 'Edit Article')

@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Article</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('dashboard.articles._form', ['button' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection
