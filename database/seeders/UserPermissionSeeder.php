<?php

namespace Database\Seeders;

use App\Models\Common\Permission;
use App\Models\Common\Role;
use App\Models\Common\UserPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $role) {
            $randomPermissions = Permission::inRandomOrder()->limit(rand(1, 10))->get();
            foreach ($randomPermissions as $permission) {
                UserPermission::create([
                    'staff_id' => 1,
                    'permission_id' => $permission->id,
                ]);
            }
        }
    }
}
