<div class="card rounded-lg border border-0">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div {{ $attributes->merge(['class' => '']) }}>
        {{ $slot }}
    </div>
</div>
