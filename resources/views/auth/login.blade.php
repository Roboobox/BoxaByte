<x-auth-layout>
    <x-slot name="main">
        <h3 class="display-5 text-center mb-3"><i class="fa-brands fa-raspberry-pi"></i> Login</h3>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="email" class="form-label fw-bold">E-mail</label>
                <input name="email" id="email" type="email" placeholder="Email address" value="{{ old('email') }}"
                       required autofocus class="form-control px-4">
            </div>
            <div class="form-group mb-2">
                <label for="password" class="form-label fw-bold">Password</label>
                <input name="password" id="password" type="password" placeholder="Password"
                       required autocomplete="current-password" class="form-control px-4 text-primary">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" name="remember" type="checkbox" id="remember_me">
                <label class="form-check-label" for="remember_me">
                    Remember me
                </label>
            </div>
            <div class="text-center text-danger mb-2">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                @endif
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block text-center w-50 text-uppercase mb-2 shadow-sm">Sign in</button>
                <div class="mb-2">Don't have an account? <a href="{{ route('register') }}">Sign up</a></div>
            </div>
        </form>
    </x-slot>
</x-auth-layout>
