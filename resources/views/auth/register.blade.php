<x-auth-layout>
    <x-slot name="main">
        <h3 class="display-5 text-center mb-3 d-flex justify-content-center align-items-center">
            <img class="me-1" src="{{ asset('assets/images/logo_min.png') }}" height="45" alt="BoxaByte"> Sign up
        </h3>
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="email" class="form-label fw-bold">E-mail</label>
                <input name="email" id="email" type="email" placeholder="Email address" value="{{ old('email') }}" required autofocus class="form-control px-4">
            </div>
            <div class="form-group mb-2">
                <label for="password" class="form-label fw-bold">Password</label>
                <input name="password" id="password" type="password" placeholder="Password"
                       required
                       autocomplete="new-password"
                       class="form-control px-4 text-primary">
            </div>

            <div class="form-group mb-2">
                <label for="password" class="form-label fw-bold">Confirm password</label>
                <input name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm password"
                       required
                       class="form-control px-4 text-primary">
            </div>

            <div class="text-center text-danger mb-2">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                @endif
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block text-center w-50 text-uppercase mt-3 mb-2 shadow-sm">Sign up</button>
                <div class="mb-2">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
            </div>
        </form>
    </x-slot>
</x-auth-layout>
