<?php

namespace Database\Seeders;

use App\Models\Common\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'name' => 'Super Staff',
            'email' => 'admin@log.in',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'phone_verified_at' => now(),
        ]);
    }
}
