<?php

namespace App\Exports\Sample;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Staff implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        //name 	email 	password 	role 	phone 	address 	city 	state 	country 	postal_code 	profile_photo 	status
        return [
            [
                'name' => 'Staff Name',
                'email' => 'test@example.org',
                'phone' => '1234567890',
                'password' => '12345678',
            ]
        ];
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'phone',
            'password',
        ];
    }
}
