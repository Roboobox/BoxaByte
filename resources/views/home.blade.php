<x-layout bodyClass="home">
    <x-slot name="main">
        <div class="h-100 row gx-5">
            <div class="col-5 mt-5">
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
            <div class="col-7 mt-5">
                <a href="{{ route('upload') }}" class="text-decoration-none text-dark">
                    <div class="content content-feature p-4">
                        <div class="content-icon">
                            <i class="fa-solid fa-file-arrow-up"></i>
                        </div>
                        <div class="d-inline-block ms-2">
                            <h4 class="m-0">File upload</h4>
                            <div class="text-muted">Upload and download files quickly</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </x-slot>
</x-layout>
