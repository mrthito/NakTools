<h3 class="card-title">{{ __('Profile Information') }}</h3>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>
@if (session('status') === 'profile-updated')
    <div class="alert alert-success">
        <p class="mb-0 text-sm">{{ __('Profile updated.') }}</p>
    </div>
@endif
<form method="post" action="{{ route('u.profile.update') }}" class="">
    @csrf
    @method('patch')
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="" :value="old('first_name', $user->first_name)" required
                    autofocus autocomplete="first_name" />
                @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="" :value="old('last_name', $user->last_name)" required
                    autofocus autocomplete="last_name" />
                @error('last_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-3">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="" :value="old('email', $user->email)" required
            autocomplete="username" />
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    <div class="mb-3">
        <x-input-label for="phone" :value="__('Phone')" />
        <div class="input-group">
            <select class="input-group-text" id="phone" name="country_code" required>
                @foreach ($countries as $country)
                    <option value="{{ $country->phone_code }}"
                        {{ old('country_code', $user->phone_code) == $country->phone_code ? 'selected' : '' }}>
                        +{{ $country->phone_code }}
                    </option>
                @endforeach
            </select>
            <x-text-input id="phone_number" name="phone_number" type="text" class="" :value="old('phone_number', $user->phone)" required
                autocomplete="phone_number" />
        </div>
        @error('phone_number')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
