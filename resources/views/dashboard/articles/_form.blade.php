<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title', $article->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter article title">
    @error('title')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    <label for="image">Image</label>
    <input type="file" name="image"
           class="form-control @error('image') is-invalid @enderror" id="image">
    @error('image')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    @if(isset($article) && $article->image)
        <div class="mt-2">
            <img src="{{ asset('storage/'.$article->image) }}" alt="Article image" width="100">
        </div>
    @endif

    <label for="content">Content</label>
    <textarea name="content" id="content"
              class="form-control @error('content') is-invalid @enderror"
              rows="5" placeholder="Enter article content">{{ old('content', $article->content ?? '') }}</textarea>
    @error('content')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $article->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    <label for="user_id">Author</label>
    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
        <option value="">Select Author</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ (old('user_id', $article->user_id ?? '') == $user->id) ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    @error('user_id')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $button }}</button>
<a href="{{ route('articles.index') }}" class="btn btn-secondary">Back</a>
