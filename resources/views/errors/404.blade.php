<x-layout bodyClass="notfound" title="Not found">
    <x-slot name="scripts">
    </x-slot>
    <x-slot name="main">
        <div class="h-100 row">
            <div class="col-12 mt-5">
                <div class="d-flex flex-column align-items-center justify-content-center mt-5">
                    <div class="text-center content p-5">
                        <div class="text-primary">
                            <h1 class="nf-title display-1 fw-bold">
                                <i class="fa-solid fa-bomb d-md-inline-block d-none"></i> 404 <i class="ps-3 fa-solid fa-bomb d-md-inline-block d-none"></i>
                            </h1></div>
                        <div><h1 class="display-5 text-uppercase fw-bold">Page not found</h1></div>
                        <p class="text-muted nf-sub fs-5">The page you requested was not found :(</p>
                        <a class="btn btn-primary px-5 mt-3" href="{{ route('home') }}">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
