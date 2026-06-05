<div class="mb-3">
    <label class="form-label">Parent Category</label>

    <select name="parent_id" class="form-control">
        <option value="0">Main Category</option>
        @foreach($categories as $item)
            <option value="{{ $item->id }}"
                {{ old('parent_id', $category->parent_id ?? 0) == $item->id ? 'selected' : '' }}>
                {{ $item->full_path }}
            </option>
        @endforeach
    </select>

    @error('parent_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Title</label>

    <input type="text" name="title" class="form-control"
        value="{{ old('title', $category->title ?? '') }}">

    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Keywords</label>

    <input type="text" name="keywords" class="form-control"
        value="{{ old('keywords', $category->keywords ?? '') }}">

    @error('keywords')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>

    <textarea name="description" class="form-control">{{ old('description', $category->description ?? '') }}</textarea>

    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Image</label>

    <input type="file" name="image" class="form-control">

    @if(!empty($category?->image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $category->image) }}" width="80">
        </div>
    @endif

    @error('image')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-control">
        <option value="1" {{ old('status', $category->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $category->status ?? 1) == 0 ? 'selected' : '' }}>Passive</option>
    </select>

    @error('status')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>