<x-layout bodyClass="home" title="{{ config('app.name', 'BoxaByte') }} - Home">
    <x-slot name="headerExtended">
        <div class="d-flex text-white align-items-center justify-content-center h-100 flex-column">
            <div class="fs-1 text-uppercase fw-bold text-center">Welcome to the {{ config('app.name', 'BoxaByte') }}</div>
            <div class="fs-5">It is great to see you!</div>
        </div>
    </x-slot>
    <x-slot name="main">
        <div class="row mt-5 mb-3">
            <div class="col-12">
                <h3 class="w-100 text-center">Features</h3>
            </div>
        </div>
        <div class="row row-cols g-3 mb-5">
            <div class="col">
                <x-home-tab title="File upload"
                            subtitle="Upload and download files quickly"
                            icon="fa-solid fa-file-arrow-up"
                            route="upload">
                </x-home-tab>
            </div>
            <div class="col">
                <x-home-tab title="Notepad"
                            subtitle="Save text with ability to share"
                            icon="fa-solid fa-clipboard"
                            route="notepad">
                </x-home-tab>
            </div>
            <div class="col">
                <x-home-tab title="My files"
                            subtitle="View and access your uploaded files"
                            icon="fa-solid fa-laptop-file"
                            route="files">
                </x-home-tab>
            </div>
            <div class="col">
                <x-home-tab title="RPI Panel"
                            subtitle="Access the GjorfildBot data"
                            icon="fa-solid fa-table-columns"
                            route="rpi-dashboard">
                </x-home-tab>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <footer class="bg-white text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-end p-3 shadow">
                © 2022 Roberts Turks
                <a class="text-dark p-2 ms-2" target="_blank" href="https://github.com/Roboobox"><i class="fa-brands fa-github"></i></a>
            </div>
            <!-- Copyright -->
        </footer>
    </x-slot>
</x-layout>
