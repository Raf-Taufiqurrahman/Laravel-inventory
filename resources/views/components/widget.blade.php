<div class="card card-sm">
    <div class="card-body d-flex align-items-center">
        <span {{ $attributes->merge(['class' => 'text-white stamp mr-3']) }}>
            {{ $slot }}
        </span>
        <div class="mr-3 lh-sm">
            <div class="strong">
                {{ $title }}
            </div>
            <div class="text-muted">{{ $subTitle }}</div>
        </div>
    </div>
</div>
