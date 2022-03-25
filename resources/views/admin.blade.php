<x-layout bodyClass="admin" title="Admin panel - user data">
    <x-slot name="scripts">
        <script src="{{ asset('js/admin.js') }}" defer></script>
    </x-slot>
    <x-slot name="main">
        <div class="h-100 row g-4 mt-4">
            <div class="col-sm-6 col-12">
                <div class="content p-4">
                    <h5 class="ps-2">Users</h5>
                    <div class="user-container">
                        <input type="hidden" id="admin_verify" value="{{ route('admin-verify') }}">
                        <input type="hidden" id="admin_set" value="{{ route('admin-set') }}">
                        <div class="loading-overlay">
                            <div class="d-flex w-100 h-100 align-items-center justify-content-center opacity-1">
                                <i class="fas fa-circle-notch fa-spin fs-4"></i>
                            </div>
                        </div>
                        <table class="table" id="users_table">
                            <thead class="text-muted">
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col" class="text-center">Verified</th>
                                <th scope="col" class="text-center">Admin</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><i class="fa-solid fa-user text-primary pe-1 fs-5"></i> {{ $user->email }}</td>
                                <td class="text-center">
                                    <div class="form-check form-switch d-inline-block">
                                        <input data-id="{{ $user->id }}" class="form-check-input verified-check" type="checkbox" {{ $user->user_verified ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-switch  d-inline-block">
                                        <input data-id="{{ $user->id }}" class="form-check-input admin-check" type="checkbox" {{ $user->is_admin ? 'checked' : '' }}>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="content p-4">
                    <h5>Active directories</h5>
                    <div class="directory-container mt-4">
                        <div class="row g-3 row-cols-1">
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
                                        <div class="user text-muted"><span class="d-sm-inline-block d-none">User:</span> {{ $directory->user->email }}</div>
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
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
