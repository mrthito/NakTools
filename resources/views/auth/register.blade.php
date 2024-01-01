<x-guest-layout title="Login">
    <div class="container container-tight my-5 px-lg-5">
        <div class="text-center mb-4">
            <a href="/" class="navbar-brand navbar-brand-autodark">
                <img src="/assets/user/img/logo.svg" height="36" alt="">
            </a>
        </div>
        <h2 class="h3 text-center mb-3">
            Welcome to {{ config('app.name') }}
        </h2>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter first name"
                    value="{{ old('first_name') }}">
                @error('first_name')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter last name"
                    value="{{ old('last_name') }}">
                @error('last_name')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <div class="input-group">
                    <select class="input-group-text" name="country_code">
                        @foreach ($countries as $country)
                            <option value="{{ $country['phone_code'] }}"
                                {{ old('country_code') == $country['phone_code'] ? 'selected' : '' }}>
                                +{{ $country['phone_code'] }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number"
                        value="{{ old('phone_number') }}">
                </div>
                @error('phone_number')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                @error('country_code')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email"
                    value="{{ old('email') }}">
                @error('email')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                @error('password')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                @error('password_confirmation')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    Register
                </button>
            </div>
        </form>

        <div class="text-center text-muted mt-3">
            Already have account yet? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
        </div>
    </div>
</x-guest-layout>
