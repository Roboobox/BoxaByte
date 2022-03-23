<x-layout bodyClass="home">
    <x-slot name="main">
        <div class="h-100 row gx-5">
            <div class="col-sm-5 col-12 mt-5">
                <div class="content p-4">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h2 class="mb-0">Welcome!</h2>
                            <p class="text-muted">It is great to see you!</p>
                        </div>
                        <div class="col-6 d-none d-lg-block">
                            <h1 class="display-4 me-3 d-flex h-100 align-items-center justify-content-end"><i class="fa-solid fa-door-open"></i></h1>
                        </div>
                    </div>
                </div>
                <div class="text-muted ms-3 mt-1 fw-light fst-italic">Created by Roberts Turks</div>
            </div>
            <div class="col-sm-7 col-12 mt-5">
                <x-home-tab title="File upload"
                            subtitle="Upload and download files quickly"
                            icon="fa-solid fa-file-arrow-up"
                            route="upload">
                </x-home-tab>
                <x-home-tab title="Notepad"
                            subtitle="Write and save text with ability to share"
                            icon="fa-solid fa-clipboard"
                            route="notepad">
                </x-home-tab>
                <x-home-tab title="My files"
                            subtitle="View and access your uploaded files"
                            icon="fa-solid fa-laptop-file"
                            route="files">
                </x-home-tab>
                <x-home-tab title="RPI Panel"
                            subtitle="Access the GjorfildBot data"
                            icon="fa-solid fa-table-columns"
                            route="rpi-dashboard">
                </x-home-tab>

            </div>
        </div>
    </x-slot>
</x-layout>
