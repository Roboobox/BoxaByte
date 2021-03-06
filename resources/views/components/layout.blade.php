<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'RPI Website' }}</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/24d82854f9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{ $links ?? '' }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    {{ $scripts ?? '' }}

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="{{ $bodyClass ?? '' }}">
    <header class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container bg-white">
                <a class="navbar-brand text-primary" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" height="65" width="122" alt="BoxaByte">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link{{Route::is('home') ? ' active' : ''}}" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
                        </li>
                        @if(Auth::user() && Auth::user()->user_verified)
                        <li class="nav-item">
                            <a class="nav-link{{Route::is('upload') ? ' active' : ''}}" href="{{ route('upload') }}"><i class="fa-solid fa-file-arrow-up"></i> File Upload</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{Route::is('notepad') ? ' active' : ''}}" href="{{ route('notepad') }}"><i class="fa-solid fa-clipboard"></i> Notepad </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{Route::is('rpi-dashboard') ? ' active' : ''}}" href="{{ route('rpi-dashboard') }}"><i class="fa-solid fa-table-columns"></i> RPI Panel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{Route::is('files') ? ' active' : ''}}" href="{{ route('files') }}"><i class="fa-solid fa-laptop-file"></i> My files</a>
                        </li>
                        @endif
                    </ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @if(Auth::user() && Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link{{Route::is('admin') ? ' active' : ''}}" href="{{ route('admin') }}"><i class="fa-solid fa-screwdriver-wrench"></i> Admin</a>
                            </li>
                            @endif
                            @if(Auth::user())
                                <li  class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="btn btn-link text-muted nav-link">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out
                                    </button>
                                </form>
                                </li>
                            @else
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <div class="header-line"></div>
    </header>
    @if(isset($headerExtended))
    <div class="header-extended">
        {{ $headerExtended ?? '' }}
    </div>
    @endif
    <main class="container">
        {{ $main }}
    </main>
    <footer>
        {{ $footer ?? '' }}
    </footer>


</body>
</html>
