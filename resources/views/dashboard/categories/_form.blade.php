<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter category name">
    @error('name')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $button }}</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
