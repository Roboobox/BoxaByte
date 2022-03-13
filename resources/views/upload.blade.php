<x-layout bodyClass="upload center">
    <x-slot name="links">
        <link rel="stylesheet" href="{{ asset('css/files.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/upload.js') }}" defer></script>
    </x-slot>
    <x-slot name="main">
        <div class="h-100 row align-items-center justify-content-center">
            <div class="col-lg-5 col-sm-11">
                <div class="center-content shadow">
                    <form method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div id="drop-file" class="position-relative">
                            <div class="position-absolute text-center upload-icon top-50 start-50 translate-middle">
                                <i class="text-muted fa-solid fa-file-arrow-up fs-2"></i>
                                <p class="text-muted">Drag and drop files</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="fileUpload[]" id="formFile" multiple>
                            @error('fileUpload')
                            <div class="text-danger text-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <div>Save files for:</div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="radioExpire" id="radioExpire1" value="1" checked>
                                <label class="form-check-label" for="radioExpire1">
                                    1 hour
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="radioExpire" id="radioExpire2" value="24">
                                <label class="form-check-label" for="radioExpire2">
                                    24 hours
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="radioExpire" id="radioExpire3" value="48">
                                <label class="form-check-label" for="radioExpire3">
                                    48 hours
                                </label>
                            </div>
                            @error('radioExpire')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary w-50" type="submit">Upload</button>
                        </div>
                        @error('general')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
