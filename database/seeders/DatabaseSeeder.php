<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Common\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@log.in',
            'phone' => '1234567890',
            'password' => '12345678',
            'two_factor_enabled' => true,
        ]);
        $this->call([
            WorldSeeder::class,
            SuperadminSeeder::class,
            StaffSeeder::class,
            KycDocsCountrySeeder::class,
            PlanSeeder::class,
            PlanFeatureSeeder::class,
            TransactionLogSeeder::class,
            CourierSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            UserPermissionSeeder::class,
        ]);
    }
}
