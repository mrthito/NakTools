<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_kyc_id',
        'status',
        'statusable_type',
        'statusable_id',
        'comment',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function kyc()
    {
        return $this->belongsTo(UserKyc::class, 'user_kyc_id');
    }

    function statusable()
    {
        return $this->morphTo();
    }
}
