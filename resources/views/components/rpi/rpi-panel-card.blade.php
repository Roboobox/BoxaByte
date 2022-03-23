@props(['title', 'count', 'newCount', 'icon', 'multiple', 'type'])
<div class="col-md mb-3">
    <div class="panel-card {{ $type }}">
        <i class="icon {{ $icon }}"></i>
        <div class="card-text d-inline-block ms-2">
            <div class="fw-bold fs-5">{{ $title }} <span class="fw-light">({{ $count }})</span></div>
            <div>{{ $newCount }} new {{ $multiple }}</div>
        </div>
    </div>
</div>
