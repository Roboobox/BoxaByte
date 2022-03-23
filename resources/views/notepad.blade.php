<x-layout bodyClass="notepad">
    <x-slot name="scripts">
        <script src="{{ asset('js/notes.js') }}" defer></script>
    </x-slot>
    <x-slot name="main">
        <div class="h-100 row gx-5">
            <div class="col-sm-3 mt-5">
                <div class="content p-4 ps-3">
                    <div class="text-muted fw-bold mb-2" id="color_label"><i class="fa-solid fa-brush"></i>
                        Color
                        <span class="loading" style="display: none">
                            <i class="fa-spin fa-solid fa-circle-notch"></i>
                        </span>
                    </div>
                    <div class="color-pickers mb-4">
                        <label for="bgColor" class="form-label">Background color</label>
                        <input type="color" id="bgColor" class="form-control w-50" value="{{ $notepad->bg_color }}">
                        <label for="txtColor" class="form-label mt-3">Text color</label>
                        <input type="color" id="txtColor" class="form-control w-50" value="{{ $notepad->txt_color }}">
                    </div>
                    <hr>
                    <div class="text-muted fw-bold mb-2"><i class="fa-solid fa-note-sticky"></i> Note</div>
                    <div class="note-picker mb-4">
                        @if($notepad->hash != 'default')
                        <div class="mb-3">
                            <label for="noteName" class="form-label">Current name:</label>
                            <input type="text" id="noteName" class="form-control mb-2" value="{{ $notepad->name }}">
                            <button id="save_name" class="btn btn-secondary py-1 w-50">Save</button>
                        </div>
                        @endif
                        @if(count($userNotepads) > 1)
                        <div class="mb-3">
                            <label for="notes" class="form-label">Open note:</label>
                            <select id="notes" class="form-select mb-2">
                                @foreach($userNotepads as $userNotepad)
                                    <option data-url="{{ route('notepad', ['notepad' => $userNotepad->hash]) }}">{{ $userNotepad->name }}</option>
                                @endforeach
                            </select>
                            <button id="open_note" class="btn btn-secondary py-1 w-50">Open</button>
                        </div>
                        @endif
                        <div class="mb-3">
                            <form action="{{ route('notepad-create') }}" method="POST">
                                @csrf
                                <label for="noteNewName" class="form-label">Create note with name:</label>
                                <input type="text" name="title" id="noteNewName" class="form-control mb-2">
                                <button type="submit" class="btn btn-secondary py-1 w-50">Create</button>
                                @if ($errors->any())
                                    <div class="mt-1 text-danger">
                                    @foreach ($errors->all() as $error)
                                        {{$error}}<br>
                                    @endforeach
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    @if($notepad->hash != 'default')
                    <hr>
                    <div class="text-muted fw-bold mb-2"><i class="fa-solid fa-toolbox"></i> Options</div>
                    <div class="option-picker">
                        <div class="row">
                            <div class="col mb-3">
                                <button class="btn btn-success dropdown-toggle w-100"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-share"></i>
                                    Share
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item share-btn" data-time="1">Share for 1 hour</button></li>
                                    <li><button class="dropdown-item share-btn" data-time="24">Share for 24 hours</button></li>
                                    <li><button class="dropdown-item share-btn" data-time="168">Share for 1 week</button></li>
                                    @if ($shared)
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button class="dropdown-item" data-time="0">Stop sharing</button></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col">
                                <form id="delete_note_form" style="display: none;" method="POST" action="{{ route('notepad-delete', ['notepad' => $notepad->hash]) }}">
                                    @csrf
                                </form>
                                <button id="delete_note" class="text-nowrap btn btn-danger w-100"><i class="fa-solid fa-trash-can"></i> Delete</button>
                            </div>
                        </div>
                        <div class="row">
                            <span class="d-none" id="shared_until_label">Shared until:</span>
                            <div class="text-muted d-none" id="shared_until"></div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-9 col-12 mt-5">
                <div class="content p-4">
                    <h3 class="note-title"><i class="fa-solid fa-note-sticky"></i> <span id="note_title_text">{{ $notepad->name }}</span></h3>
                    <textarea id="notepad" style="background-color: {{ $notepad->bg_color }}; color: {{ $notepad->txt_color }};" class="w-100 p-3 note">{{ $notepad->content ?? '' }}</textarea>
                    <div class="d-flex mt-2 align-items-center">
                        <button id="saveNote" class="btn btn-primary">
                            <span class="normal"> <i class="fa-solid fa-floppy-disk"></i> Save</span>
                            <span class="loading" style="display: none"><i class="fa-spin fa-solid fa-circle-notch"></i> Saving...</span>
                        </button>
                        <div class="notepad-status fw-bold ms-2" style="display: none"></div>
                    </div>
                    <input type="hidden" value="{{ route('notepad-update') }}" id="notepad_update">
                    <input type="hidden" value="{{ $notepad->hash }}" id="notepad_key">
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
