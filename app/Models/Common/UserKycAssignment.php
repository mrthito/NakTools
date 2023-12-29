<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_kyc_id',
        'staff_id',
        'assigned_at'
    ];
}
