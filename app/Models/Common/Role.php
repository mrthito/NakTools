<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function syncPermissions(array $permissions)
    {
        foreach ($permissions as $permission) {
            $this->permissions()->create([
                'name' => $permission,
            ]);
        }
    }
}
