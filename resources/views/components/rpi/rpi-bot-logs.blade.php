<x-rpi.rpi-panel-layout>
    <x-slot name="main">
        <x-rpi-table-layout title="{{ $title ?? '' }}" subtitle="{{ $subtitle ?? '' }}" :panelCards="$panelCards">
            <x-slot name="main">
                <table class="table mb-4">
                    <thead>
                    <tr>
                        <th class="d-md-table-cell d-none" scope="col">Time</th>
                        <th scope="col">Type</th>
                        <th scope="col">Function</th>
                        <th class="d-xxl-table-cell d-none" scope="col">Data</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$logs->isEmpty())
                        @foreach($logs as $log)
                            <tr>
                                <td class="d-md-table-cell d-none">{{ $log->log_time }}</td>
                                <td><div class="label {{ strtolower($log->log_type) }}-label">{{ $log->log_type }}</div></td>
                                <td>{{ $log->log_function }}</td>
                                <td class="d-xxl-table-cell d-none log_long">{{ $log->log_data }}</td>
                                <td class="text-end"><a href="{{ route('rpi-bot-log-view', ['log' => $log->id]) }}" class="px-1"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="5" class="text-center fw-bold text-muted">No data</td></tr>
                    @endif
                    </tbody>
                </table>
                {{ $logs->links() }}
            </x-slot>
        </x-rpi-table-layout>
    </x-slot>
</x-rpi.rpi-panel-layout>
