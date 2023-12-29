<?php

namespace App\Models\Common;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staffs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'phone',
        'phone_verified_at'
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

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\Auth\Staff\SendEmailVerificationNotification);
    }

    public function sendPhoneVerificationNotification()
    {
        $this->notify(new \App\Notifications\Auth\Staff\SendPhoneVerificationNotification);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\Auth\Staff\SendPasswordResetNotification($token));
    }

    public function staffRole()
    {
        return $this->hasOne(StaffRole::class);
    }

    public function staffPermissions()
    {
        return $this->hasMany(StaffPermission::class);
    }
}
