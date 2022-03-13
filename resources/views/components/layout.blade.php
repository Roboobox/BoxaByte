<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Upload a file</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://kit.fontawesome.com/24d82854f9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{ $links ?? '' }}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    {{ $scripts ?? '' }}
</head>
<body class="{{ $bodyClass ?? '' }}">
    <header class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container bg-white">
                <a class="navbar-brand text-primary" href="{{ route('home') }}"><i class="fa-brands fa-raspberry-pi"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        @if(Auth::user() && Auth::user()->user_verified)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('upload') }}">File Upload <i class="fa-solid fa-file-arrow-up"></i></a>
                        </li>
                        <li class="nav-item"></li>
                        @endif
                    </ul>
                    <div class="d-flex">
                        @if(Auth::user())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn text-muted">
                                Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </button>
                        </form>
                        @else
                        <a class="nav-link active text-dark" aria-current="page" href="{{ route('login') }}">Log In <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <div class="header-line"></div>
    </header>
    <main class="container">
        {{ $main }}
    </main>
    <footer>

    </footer>


</body>
</html>
