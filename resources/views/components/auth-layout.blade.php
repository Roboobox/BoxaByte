<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://kit.fontawesome.com/24d82854f9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
</head>
<body class="auth">

<main class="container-fluid h-100">
    <div class="row h-100">
        <div id="background" class="col-sm-5 d-sm-block d-none"></div>
        <div id="login_content" class="col-sm-7 col-12">
            <div class="d-flex align-items-center py-5 h-100">
                <div class="container">
                    <div class="row">
                        <div class="login col-lg-10 col-xl-6 mx-auto bg-white shadow-sm p-4">
                            {{ $main }}
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div>
    </div>
</main>


</body>
</html>
