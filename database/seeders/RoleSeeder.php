<?php

namespace Database\Seeders;

use App\Models\Common\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Manager',
            'Sales',
            'Customer Support FM',
            'Customer Support LM',
            'Finance',
            'Accountant',
            'Tester',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'image' => 'roles/' . strtolower($role) . '.png',
            ]);
        }
    }
}
