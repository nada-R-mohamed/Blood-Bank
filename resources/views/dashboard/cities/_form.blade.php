<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name', $city->name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter city name">
    @error('name')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="governorate_id">Governorate</label>
    <select name="governorate_id" id="governorate_id" class="form-control @error('governorate_id') is-invalid @enderror">
        <option value="">Select Governorate</option>
        @foreach($governorates as $governorate)
            <option value="{{ $governorate->id }}"{{ (old('governorate_id', $city->governorate_id ?? '') == $governorate->id ? 'selected' : '') }}>
                {{ $governorate->name }}
            </option>
        @endforeach
    </select>
    @error('governorate_id')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $button }}</button>
<a href="{{ route('cities.index') }}" class="btn btn-secondary">Back</a>
