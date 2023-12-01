{{-- <x-guest-layout>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('staff.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout :title="'Forgot Password'" :for="'staff'">

    <div class="card-body">
        <h1>{{ config('app.name', 'NakTools') }}</h1>
        <p class="text-medium-emphasis">{{ __('Forgot Password') }}</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="alert alert-info">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <form action="{{ route('staff.password.email') }}" method="POST">
            @csrf
            <div class="input-group">
                <span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                        </use>
                    </svg>
                </span>
                <input class="form-control @error('email') is-invalid @enderror" type="text"
                    placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}">
            </div>
            @error('email')
                <label class="error text-danger" for="email">{{ $message }}</label>
            @enderror
            <div class="row mt-3">
                <div class="col-12">
                    <button class="btn btn-primary px-4" type="submit">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
