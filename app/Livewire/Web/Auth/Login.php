<?php

namespace App\Livewire\Web\Auth;

use App\Helpers\SmsHelper;
use App\Jobs\SendLoginOtpJob;
use App\Models\Common\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;
    public $otp;
    public $showOtpForm = false;
    public $showPassword = false;

    public function render()
    {
        return view('livewire.web.auth.login');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            if (Auth::user()->two_factor_enabled) {
                Auth::logout();
                $this->showOtpForm = true;
                $otp = rand(100000, 999999);
                $user = User::where('email', $this->email)->first();
                $otp = $user->saveOtpToken();
                $this->otp = $otp;
                $sendOtp = new SendLoginOtpJob($user, $otp);
                dispatch($sendOtp);
            } else {
                return redirect()->route('u.dashboard.index');
            }
        } else {
            session()->flash('error', 'Invalid email or password.');
        }
    }

    public function verifyOtp()
    {
        $this->validate([
            'otp' => 'required'
        ]);

        $user = User::where('email', $this->email)->first();
        if ($user) {
            if ($user->verifyOtp($this->otp)) {
                Auth::login($user);
                return redirect()->route('u.dashboard.index');
            }
        }
        session()->flash('error', 'Invalid OTP.');
    }

    function changeEmail()
    {
        $this->showOtpForm = false;
    }
    function resendOtp()
    {
        $user = User::where('email', $this->email)->first();
        if ($user) {
            $otp = $user->saveOtpToken();
            $sendOtp = new SendLoginOtpJob($user, $otp);
            dispatch($sendOtp);
            session()->flash('success', 'OTP sent successfully.');
        }
    }
}
