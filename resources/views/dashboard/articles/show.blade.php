@extends('dashboard.layout')
@section('title', 'Article Details')

@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Article Details</h3>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>ID:</strong> {{ $article->id }}
                </div>
                <div class="mb-3">
                    <strong>Title:</strong> {{ $article->title }}
                </div>
                @if($article->image)
                    <div class="mb-3">
                        <strong>Image:</strong><br>
                        <img src="{{ asset('storage/'.$article->image) }}" alt="Article image" width="200">
                    </div>
                @endif
                <div class="mb-3">
                    <strong>Content:</strong>
                    <div>{!! nl2br(e($article->content)) !!}</div>
                </div>
                <div class="mb-3">
                    <strong>Category:</strong> {{ $article->category->name ?? 'N/A' }}
                </div>
                <div class="mb-3">
                    <strong>Author:</strong> {{ $article->user->name ?? 'N/A' }}
                </div>
                <div class="mb-3">
                    <strong>Created At:</strong> {{ $article->created_at ? $article->created_at->format('Y-m-d H:i') : '' }}
                </div>
                <div class="mb-3">
                    <strong>Updated At:</strong> {{ $article->updated_at ? $article->updated_at->format('Y-m-d H:i') : '' }}
                </div>
            </div>
        </div>
    </div>
@endsection
