<x-layout bodyClass="rpi">
    <x-slot name="main">
        <div class="h-100 row gx-5">
            <div class="col-lg-3 mt-5">
                <div class="content p-4 ps-3">
                    <div class="text-muted fw-bold ps-2 mb-2">Logs</div>
                    <ul class="nav flex-column">
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link{{ Route::is('rpi-dashboard') ? ' active' : '' }}" href="{{ route('rpi-dashboard') }}"><i class="fa-solid fa-music pe-1"></i> Music logs</a>
                        </li>
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link{{ Route::is('rpi-music-cmd') ? ' active' : '' }}" href="{{ route('rpi-music-cmd') }}"><i class="fa-solid fa-play pe-1"></i> Music commands</a>
                        </li>
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link{{ Route::is('rpi-bot-logs') ? ' active' : '' }}" href="{{ route('rpi-bot-logs') }}"><i class="fa-solid fa-cat pe-1"></i> Gjorfild bot logs</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="text-muted fw-bold ps-2 mb-2">League stats</div>
                    <ul class="nav flex-column">
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link" href="panel.php?t=logs_music"><i class="fa-solid fa-shield pe-1"></i> Matches</a>
                        </li>
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link" href="panel.php?t=logs_music_cmd"><i class="fa-solid fa-clock-rotate-left pe-1"></i> Playtime</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-12 mt-5">
                {{ $main }}
            </div>
        </div>
    </x-slot>
</x-layout>
