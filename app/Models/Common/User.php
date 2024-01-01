<?php

namespace App\Models\Common;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'two_factor_enabled',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    function kyc()
    {
        return $this->hasOne(UserKyc::class);
    }

    function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    function saveOtpToken()
    {
        $randomToken = mt_rand(100000, 999999);
        DB::table('password_reset_tokens')->updateOrInsert([
            'email' => $this->email,
        ], [
            'token' => md5($randomToken),
            'created_at' => now(),
        ]);
        return $randomToken;
    }

    function verifyOtp($otp)
    {
        $token = DB::table('password_reset_tokens')->where('email', $this->email)->first();
        if ($token) {
            if ($token->token == md5($otp)) {
                DB::table('password_reset_tokens')->where('email', $this->email)->delete();
                return true;
            }
        }
        return false;
    }
}
