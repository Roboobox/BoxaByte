<x-layout bodyClass="verify center" title="{{ config('app.name', 'BoxaByte') }} - Verify your account">
    <x-slot name="main">
        <div class="h-100 row align-items-center justify-content-center">
            <div class="col-lg-4 col-sm-11">
                <div class="center-content shadow">
                    <div class="text-center mb-3">
                        <img src="{{ asset('assets/images/logo.png') }}" height="100" width="187" alt="BoxaByte">
                    </div>
                    <h4 class="text-center">Your account is not verified!</h4>
                    <p class="text-muted text-center">Please wait till your account gets verified by the site's administrator.</p>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
