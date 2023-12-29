<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Free',
                'description' => 'Free Plan',
                'interval' => 1,
                'interval_type' => 3,
                'trial_period_days' => 0,
                'featured' => 0,
                'status' => 1,
                'free' => 1,
            ],
            [
                'name' => 'Basic',
                'description' => 'Basic Plan',
                'interval' => 1,
                'interval_type' => 3,
                'trial_period_days' => 0,
                'featured' => 0,
                'status' => 1,
                'free' => 0,
            ],
            [
                'name' => 'Standard',
                'description' => 'Standard Plan',
                'interval' => 1,
                'interval_type' => 3,
                'trial_period_days' => 0,
                'featured' => 0,
                'status' => 1,
                'free' => 0,
            ],
            [
                'name' => 'Premium',
                'description' => 'Premium Plan',
                'interval' => 1,
                'interval_type' => 3,
                'trial_period_days' => 0,
                'featured' => 0,
                'status' => 1,
                'free' => 0,
            ],
            [
                'name' => 'Enterprise',
                'description' => 'Enterprise Plan',
                'interval' => 1,
                'interval_type' => 3,
                'trial_period_days' => 0,
                'featured' => 0,
                'status' => 1,
                'free' => 0,
            ],
        ];
    }
}
