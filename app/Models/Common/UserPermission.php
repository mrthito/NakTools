<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'permission_id',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
