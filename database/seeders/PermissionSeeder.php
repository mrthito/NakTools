<?php

namespace Database\Seeders;

use App\Models\Common\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard',
            'settings',
            'settings.general',
            'settings.appearance',
            'settings.payment',
            'settings.shipping',
            'settings.social_login',
            'settings.social_media',
            'settings.email',
            'settings.sms',
            'settings.push_notification',
            'settings.otp',
            'settings.currency',
            'settings.language',
            'settings.unit',
            'settings.country',
            'settings.timezone',
            'settings.tax',
            'settings.coupon',
            'settings.email_template',
            'settings.sms_template',
            'settings.push_notification_template',
            'settings.otp_template',
            'settings.role_permission',
            'settings.role',
            'settings.permission',
            'settings.user',
            'settings.user_role',
            'settings.user_permission',
            'settings.user_activity',
            'settings.user_login_history',
            'settings.user_profile',
            'settings.user_address',
            'settings.user_bank_account',
            'settings.user_social_account',
            'settings.user_device',
            'settings.user_device_token',
            'settings.user_access_token',
            'settings.user_verification',
            'settings.user_verification_type',
            'settings.user_verification_document',
            'settings.user_verification_history',
            'settings.user_verification_request',
            'settings.user_verification_request_history',
            'settings.user_verification_request_document',
            'settings.user_verification_request_history_document',
            'settings.user_verification_request_history_comment',
            'settings.user_verification_request_history_status',
            'settings.user_verification_request_history_status_comment',
            'settings.user_verification_request_history_status_document'
        ];

        foreach ($permissions as $permission) {
            \App\Models\Common\Permission::create([
                'role_id' => Role::inRandomOrder()->first()->id,
                'name' => $permission,
            ]);
        }
    }
}
