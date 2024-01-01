<div>
    @if ($showOtpForm)
        <h2 class="h3 text-center mb-3">
            Enter OTP sent to your email
        </h2>
        <div class="alert alert-success">
            Please enter the OTP sent to your email address {{ $email }}. OTP is valid for 5 minutes. <a
                href="#" wire:click="changeEmail">Change email</a>
        </div>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form wire:submit="verifyOtp">
            <div class="mb-3">
                <div class="input-group input-group-flat">
                    <x-input name="otp" placeholder="Enter OTP" />
                    <span class="input-group-text">
                        <a href="#" wire:click="resendOtp">
                            <span class="spinner-border spinner-border-sm" wire:loading wire:target="resendOtp"></span>
                            <span wire:loading.remove wire:target="resendOtp">Resend</span>
                        </a>
                    </span>
                </div>
                {{-- <x-input name="otp" placeholder="Enter OTP" /> --}}
                @error('otp')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </form>
    @else
        <h2 class="h3 text-center mb-3">
            Login to your account
        </h2>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form wire:submit="login">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <x-input name="email" placeholder="Enter email" />
                @error('email')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Password
                    <span class="form-label-description">
                        <a href="{{ route('password.request') }}">
                            I forgot password
                        </a>
                    </span>
                </label>
                <x-input name="password" placeholder="Password" type="password" />
                @error('password')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    <x-spin target="login" />
                    Sign in
                </button>
            </div>
        </form>
    @endif
</div>
