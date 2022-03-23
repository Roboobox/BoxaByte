<x-rpi.rpi-panel-layout>
    <x-slot name="main">
        <x-rpi-table-layout title="{{ $title ?? '' }}" subtitle="{{ $subtitle ?? '' }}" :panelCards="$panelCards">
            <x-slot name="main">
                <table class="table mb-4">
                    <thead>
                    <tr>
                        <th scope="col">Time</th>
                        <th class="d-md-table-cell d-none" scope="col">Author</th>
                        <th scope="col">Command</th>
                        <th class="d-md-table-cell d-none" scope="col">Channel</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$commands->isEmpty())
                        @foreach($commands as $command)
                            <tr>
                                <td>{{ $command->time_sent }}</td>
                                <td class="d-md-table-cell d-none">{{ $command->author }}</td>
                                <td>{{ $command->command }}</td>
                                <td class="d-md-table-cell d-none log_long">{{ $command->channel }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="5" class="text-center fw-bold text-muted">No data</td></tr>
                    @endif
                    </tbody>
                </table>
                {{ $commands->links() }}
            </x-slot>
        </x-rpi-table-layout>
    </x-slot>
</x-rpi.rpi-panel-layout>
