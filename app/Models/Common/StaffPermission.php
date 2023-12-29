<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'role_id',
        'permission_id',
    ];
}
