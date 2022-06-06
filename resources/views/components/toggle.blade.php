<div class="mb-3">
    <div class="form-label">{{ $title }}</div>
    <label class="form-check form-switch">
        <input class="form-check-input @error($name) is-invalid @enderror" type="checkbox" name="{{ $name }}"
            value="{{ $value }}">
        <span class="form-check-label">{{ $subTitle }}</span>
    </label>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
