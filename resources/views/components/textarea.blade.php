<div class="mb-3">
    <label class="form-label">{{ $title }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" rows="6"
        placeholder="{{ $placeholder }}">{{ $slot }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
