@props(['title', 'subtitle', 'panelCards'])
<div class="content p-4 mb-5">
    <div class="row">
        <h4 class="mb-0">{{ $title }}</h4>
        <div class="text-muted">{{ $subtitle }}</div>
    </div>
    <div class="row gx-4 mt-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
        @foreach($panelCards as $card)
        <x-rpi.rpi-panel-card title="{{ $card['title'] }}" count="{{ $card['count'] }}" newCount="{{ $card['newCount'] }}" type="{{ $card['type'] }}"
                              icon="{{ $card['icon'] }}" multiple="{{ $card['multiple'] }}">
        </x-rpi.rpi-panel-card>
        @endforeach
    </div>
    <div class="row mt-4">
        <div class="col-12">
            {{ $main }}
        </div>
    </div>
</div>
