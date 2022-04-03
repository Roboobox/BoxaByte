<x-layout bodyClass="files" title="{{ config('app.name', 'BoxaByte') }} - Your uploaded files">
    <x-slot name="scripts">

    </x-slot>
    <x-slot name="main">
        <div class="h-100 row gx-5">
            <div class="col-12 mt-5">
                <div class="content p-4">

                    <h3 class="mb-4">Your files</h3>
                    @if(!$directories->isEmpty())
                    <div class="row row-cols-lg-2 row-cols-1 gy-3 gx-5 ">
                        @foreach($directories as $directory)
                        <div class="col">
                            <div data-id="{{ $directory->hash }}" class="file d-flex">

                                <div class="file-icon me-3 d-flex align-items-center">
                                    <a class="text-decoration-none" href="{{ route('directory', ['directory' => $directory->hash]) }}">
                                        <i class="fa-solid fa-file-lines"></i>
                                    </a>
                                </div>
                                <div class="file-info d-flex flex-column">
                                    <a class="text-decoration-none" href="{{ route('directory', ['directory' => $directory->hash]) }}">
                                        <div class="name fw-bold">Directory </div>
                                        <div class="expiration text-muted"><span class="d-sm-inline-block d-none">Expiration:</span> {{ $directory->expiration ?? 'No expiration' }}</div>
                                        <div class="info d-flex text-muted">
                                            <div class="me-4">{{ $directory->size }}</div>
                                            <div>{{ $directory->file_count }} file{{ $directory->file_count > 1 ? 's' : '' }}</div>
                                        </div>
                                    </a>
                                    <div class="files-container mt-2 d-none">
                                        <div>Files:</div>
                                        @foreach($directory->files as $file)
                                        <span class="me-2 text-break text-muted">{{ $loop->iteration }}. {{ $file->name }}</span>
                                        <br>
                                        <span class="text-muted fw-light">{{ $file->size }}</span>{!! $loop->last ? '' : '<hr class="my-2">' !!}
                                        @endforeach
                                    </div>
                                </div>
                                <div data-id="{{ $directory->hash }}" class="file-opener d-flex align-items-center ms-auto pe-4 ps-5 fs-5">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <div class="row">
                            <div class="col fs-4 fw-light text-center mt-3 text-muted">
                                <i class="fa-solid fa-file-circle-question fs-1 me-3"></i><br>You currently do not have any active files
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
