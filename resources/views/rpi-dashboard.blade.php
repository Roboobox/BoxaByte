<x-layout bodyClass="rpi" title="RPI Discord Log panel">
    <x-slot name="main">
        <div class="h-100 row gx-5">
            <div class="col-sm-3 mt-5">
                <div class="content p-4 ps-3">
                    <div class="text-muted fw-bold ps-2 mb-2">Logs</div>
                    <ul class="nav flex-column">
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link active" href="panel.php?t=logs_music"><i class="fa-solid fa-music pe-1"></i> Music logs</a>
                        </li>
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link " href="panel.php?t=logs_music_cmd"><i class="fa-solid fa-play pe-1"></i> Music commands</a>
                        </li>
                        <li>
                            <a class="pe-0 ps-2 text-dark nav-link " href="panel.php?t=logs_gjorfild"><i class="fa-solid fa-cat pe-1"></i> Gjorfild bot logs</a>
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
            <div class="col-sm-9 col-12 mt-5">
                <x-rpi-table-layout title="Music logs" subtitle="Example subtitle text">
                    <x-slot name="main">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Time</th>
                                <th scope="col">Type</th>
                                <th scope="col">Function</th>
                                <th class="d-md-table-cell d-none" scope="col">Data</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>09-03-22 12:10:07</td>
                                <td><div class="label info-label">INFO</div></td>
                                <td>play</td>
                                <td class="d-md-table-cell d-none log_long">Starting activity checking!</td>
                                <td class="text-end"><a href="#" class="py-2 px-3"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            </tr>
                            <tr>
                                <td>09-03-22 12:10:07</td>
                                <td><div class="label info-label">INFO</div></td>
                                <td>play</td>
                                <td class="d-md-table-cell d-none log_long">Starting activity checking!</td>
                                <td class="text-end"><a href="#" class="py-2 px-3"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </x-slot>
                </x-rpi-table-layout>
            </div>
        </div>
    </x-slot>
</x-layout>
