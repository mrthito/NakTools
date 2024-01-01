<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKyc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'country_id',
        'state_id',
        'city_id',
        'pincode',
        'address_line_1',
        'address_line_2',
        'email',
        'phone_number',
        'registration_type',
    ];

    public function scopeMy($query)
    {
        return $query->where('user_id', auth()->id());
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function statuses()
    {
        return $this->hasMany(UserKycStatus::class);
    }

    function status()
    {
        return $this->hasOne(UserKycStatus::class)->latest();
    }

    function country()
    {
        return $this->belongsTo(Country::class);
    }

    function state()
    {
        return $this->belongsTo(State::class);
    }

    function city()
    {
        return $this->belongsTo(City::class);
    }

    function documents()
    {
        return $this->hasMany(UserKycDoc::class);
    }

    function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    function assign()
    {
        return $this->hasOne(UserKycAssignment::class)->latest();
    }
}
