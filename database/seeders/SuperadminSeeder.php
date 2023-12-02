<?php

namespace Database\Seeders;

use App\Models\Common\Superadmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Superadmin::create([
            'name' => 'Super Admin',
            'email' => 'admin@log.in',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'phone_verified_at' => now(),
        ]);
    }
}
