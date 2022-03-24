@props(['title', 'icon', 'subtitle', 'route'])
<a href="{{ route($route) }}" class="text-decoration-none text-dark">
    <div class="content content-feature p-4 mb-3 text-center h-100 d-flex flex-column justify-content-center">
        <div class="content-icon-container w-100 mb-2">
            <div class="content-icon">
                <i class="{{ $icon }}"></i>
            </div>
        </div>
        <div class="d-inline-block ms-2">
            <h4 class="m-0">{{ $title }}</h4>
            <div class="text-muted">{{ $subtitle }}</div>
        </div>
    </div>
</a>
