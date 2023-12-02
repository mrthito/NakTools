<?php

namespace Database\Seeders;

use App\Models\Common\KycDocsCountry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KycDocsCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KycDocsCountry::create([
            'country_id' => '102',
            'state_id' => '1674',
            'name' => 'Aadhar Card',
            'required' => 1,
            'has_id_number' => 1,
            'id_regex' => '/^[0-9]{12}$/',
            'id_required' => 1,
            'has_name' =>  1,
            'name_required' => 1,
            'has_expiration_date' => 0,
            'expiration_date_required' => 0,
            'number_of_pages' => 2,
        ]);
        KycDocsCountry::create([
            'country_id' => '1',
            'state_id' => '1',
            'name' => 'Pan Card',
            'required' => 1,
            'has_id_number' => 1,
            'id_regex' => '/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
            'id_required' => 1,
            'has_name' =>  1,
            'name_required' => 1,
            'has_expiration_date' => 0,
            'expiration_date_required' => 0,
            'number_of_pages' => 1,
        ]);
    }
}
