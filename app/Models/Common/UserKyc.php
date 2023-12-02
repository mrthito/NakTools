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

    function user() {
        return $this->belongsTo(User::class);
    }
}
