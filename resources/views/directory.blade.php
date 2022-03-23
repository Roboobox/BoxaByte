<x-layout bodyClass="directory center">
    <x-slot name="links">
        <link rel="stylesheet" href="{{ asset('css/files.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/directory.js') }}" defer></script>
    </x-slot>

    <x-slot name="main">
        <div class="h-100 row align-items-center justify-content-center">
            <div class="col-xl-4 col-xxl-3 col-sm-11">
                <div class="center-content shadow text-center">
                    <div class="mb-3">
                        <i class="fa-solid fa-file-arrow-down fs-1"></i>
                        <div class="mt-2 fw-bold">Download file/s</div>
                        <div class="text-muted">Created at: {{ $directory->created_at }}</div>
                        <div class="text-muted">Expires at: {{ $directory->expiration ?? 'No expiration' }}</div>
                        <div class="text-muted">
                            Contents: {{ $directory->size }}, {{ $directory->file_count }} file{{ $directory->file_count > 1 ? 's' : '' }}
                            <i class="fa-solid fa-folder-open" id="files_tooltip" data-bs-html="true"
                               data-bs-toggle="tooltip"
                               data-bs-placement="right"
                               title="
                               @foreach($directory->files as $file)
                               <div class='file'>{{ $file->name }}{{ !$loop->last ? '<hr>' : '' }}</div>
                               @endforeach
                               "></i>
                        </div>
                        <form id="delete_dir_form" style="display: none;" method="POST" action="{{ route('delete-dir', ['directory' => $directory->hash]) }}">
                            @csrf
                        </form>
                        <a id="delete_link" href="{{ route('delete-dir', ['directory' => $directory->hash]) }}"
                           class="text-danger d-block">Delete files
                        </a>
                    </div>
                    <div class="text-center">
                        <input type="hidden" id="copy" value="{{ route('directory', ['directory' => $directory->hash]) }}">
                        <button class="btn fw-bold btn-success w-50 mb-3" onclick="copyToClipboard('#copy')">Copy link <i class="fa-solid fa-link"></i></button>
                        <a class="btn fw-bold btn-primary w-75" href="{{ route('download-zip', ['directory' => $directory->hash]) }}">Download ZIP <i class="fa-solid fa-file-zipper"></i></a>
                        @if($directory->file_count < 2)
                        <a class="btn fw-bold btn-primary w-75 mt-2" href="{{ route('download', ['directory' => $directory->hash]) }}">Download file <i class="fa-solid fa-arrow-down"></i></a>
                        @endif

                        @error('general')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
