<div class="mb-3">
    <div class="form-label">{{ $title }}</div>
    <select class="form-select" name="{{ $name }}">
        {{ $slot }}
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
