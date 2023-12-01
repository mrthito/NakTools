<x-guest-layout title="Verify Email" for="superadmin">
    <div class="card-body">
        <h1 class="text-center">{{ config('app.name', 'NakTools') }}</h1>
        <div class="alert alert-info" role="alert">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success" role="alert">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
        <form method="POST" action="{{ route('superadmin.verification.send') }}">
            @csrf
            <button class="btn btn-primary px-4 w-100" type="submit">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('superadmin.logout') }}">
            @csrf
            <button class="btn btn-outline-danger px-4 w-100 mt-3" type="submit">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</x-guest-layout>
