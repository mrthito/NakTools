<x-guest-layout title="Login">

    <div class="container container-tight my-5 px-lg-5">
        <div class="text-center mb-4">
            <a href="/" class="navbar-brand navbar-brand-autodark">
                <img src="/assets/user/img/logo.svg" height="36" alt="">
            </a>
        </div>
        <livewire:web.auth.login />
        <div class="text-center text-muted mt-3">
            Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
        </div>
    </div>
</x-guest-layout>
