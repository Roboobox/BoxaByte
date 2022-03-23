<x-rpi.rpi-panel-layout>
    <x-slot name="main">
        <div class="content p-4 mb-5">
            <div class="row">
                <div class="return">
                    <a class="text-primary btn ps-0 fw-bold" href="{{ route('rpi-dashboard') }}"><i class="fa-solid fa-arrow-left-long"></i> Return </a>
                </div>
                <h4 class="mb-0">GjrofildBot Music Log #{{ $log->id }}</h4>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="mb-2">
                        <div class="fw-bold">Log time:</div>
                        <div>{{ $log->log_time }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="fw-bold">Log type:</div>
                        <div style="width: fit-content" class="label {{ strtolower($log->log_type) }}-label px-3">{{ $log->log_type }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="fw-bold">Log function:</div>
                        <div>{{ $log->log_function }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="fw-bold">Log data:</div>
                        <div class="text-break">{{ $log->log_data }}</div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-rpi.rpi-panel-layout>
