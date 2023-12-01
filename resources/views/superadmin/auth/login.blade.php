<x-guest-layout :title="'Login'" :for="'superadmin'">

    <div class="card-body">
        <h1>{{ config('app.name', 'NakTools') }}</h1>
        <p class="text-medium-emphasis">{{ __('Login to your account') }}</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('superadmin.login') }}" method="POST">
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
            <div class="input-group mt-4">
                <span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}">
                        </use>
                    </svg>
                </span>
                <input class="form-control @error('password') is-invalid @enderror" type="password"
                    placeholder="{{ __('Password') }}" name="password">
            </div>
            @error('password')
                <label class="error text-danger" for="password">{{ $message }}</label>
            @enderror
            <div class="form-check mb-4 mt-2">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                    {{ __('Remember me') }}
                </label>
            </div>

            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>
                @if (Route::has('superadmin.password.request'))
                    <div class="col-6 text-end">
                        <a class="btn btn-link px-0 text-primary" href="{{ route('superadmin.password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>
