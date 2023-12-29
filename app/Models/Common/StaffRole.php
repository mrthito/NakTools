<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'role_id',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permissions()
    {
        return $this->hasMany(StaffPermission::class)->where('staff_id', $this->staff_id);
    }
}
