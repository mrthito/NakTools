<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couriers = [
            [
                'name' => 'FedEx',
                'code' => 'fedex',
                'logo' => 'couriers/fedex.png',
                'featured_image' => 'couriers/banner/fedex.png',
                'url' => 'https://www.fedex.com/en-us/home.html',
                'library_class' => 'App\Libraries\Courier\FedEx',
                'sort_order' => 1,
                'custom_api_available' => 1,
                'status' => 1,
            ],
            [
                'name' => 'UPS',
                'code' => 'ups',
                'logo' => 'couriers/ups.png',
                'featured_image' => 'couriers/banner/ups.png',
                'url' => 'https://www.ups.com/us/en/Home.page',
                'library_class' => 'App\Libraries\Courier\UPS',
                'sort_order' => 2,
                'custom_api_available' => 1,
                'status' => 1,
            ],
            [
                'name' => 'USPS',
                'code' => 'usps',
                'logo' => 'couriers/usps.png',
                'featured_image' => 'couriers/banner/usps.png',
                'url' => 'https://www.usps.com/',
                'library_class' => 'App\Libraries\Courier\USPS',
                'sort_order' => 3,
                'custom_api_available' => 1,
                'status' => 1,
            ],
            [
                'name' => 'DHL',
                'code' => 'dhl',
                'logo' => 'couriers/dhl.png',
                'featured_image' => 'couriers/banner/dhl.png',
                'url' => 'https://www.dhl.com/en.html',
                'library_class' => 'App\Libraries\Courier\DHL',
                'sort_order' => 4,
                'custom_api_available' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Canada Post',
                'code' => 'canada_post',
                'logo' => 'couriers/canada_post.png',
                'featured_image' => 'couriers/banner/canada_post.png',
                'url' => 'https://www.canadapost.ca/cpc/en/home.page',
                'library_class' => 'App\Libraries\Courier\CanadaPost',
                'sort_order' => 5,
                'custom_api_available' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Royal Mail',
                'code' => 'royal_mail',
                'logo' => 'couriers/royal_mail.png',
                'featured_image' => 'couriers/banner/royal_mail.png',
                'url' => 'https://www.royalmail.com',
                'library_class' => 'App\Libraries\Courier\RoyalMail',
                'sort_order' => 6,
                'custom_api_available' => 1,
                'status' => 1,
            ]
        ];

        foreach ($couriers as $courier) {
            \App\Models\Common\Courier::create($courier);
        }
    }
}
