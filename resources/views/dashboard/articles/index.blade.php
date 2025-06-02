@extends('dashboard.layout')
@section('title', 'Articles')

@section('body')
    <div class="container-fluid">
        <div class="card">
            @include('dashboard.partials.alerts')
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Articles</h3>
                <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">Add Article</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($articles as $index => $article)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></td>
                            <td>{{ $article->category->name ?? 'N/A' }}</td>
                            <td>{{ $article->user->name ?? 'N/A' }}</td>
                            <td>{{ $article->created_at ? $article->created_at->format('Y-m-d') : '' }}</td>
                            <td>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $article->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $article->id }})">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No articles found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $articles->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        function confirmDelete(id) {--}}
{{--            if (confirm('Are you sure you want to delete this article?')) {--}}
{{--                document.getElementById('delete-form-' + id).submit();--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}
