<h3 class="card-title">{{ __('Change Password') }}</h3>
@if (session('status') === 'password-updated')
    <div class="alert alert-success">
        <p class="mb-0 text-sm">{{ __('Password updated.') }}</p>
    </div>
@endif
<form method="post" action="{{ route('password.update') }}" class="">
    @csrf
    @method('put')

    <div class="mb-3">
        <x-input-label for="update_password_current_password" :value="__('Current Password')" />
        <x-text-input id="update_password_current_password" name="current_password" type="password"
            class="mt-1 block w-full" autocomplete="current-password" />
        @error('current_password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <x-input-label for="update_password_password" :value="__('New Password')" />
        <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
            autocomplete="new-password" />
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
            class="mt-1 block w-full" autocomplete="new-password" />
        @error('password_confirmation')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Change Password') }}</x-primary-button>
    </div>
</form>
