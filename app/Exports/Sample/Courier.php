<?php

namespace App\Exports\Sample;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Courier implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        //name 	code 	url 	custom_api_available
        return [
            [
                'name' => 'Courier Name',
                'code' => 'courier_code',
                'url' => 'https://courier.com',
                'custom_api_available' => '1'
            ]
        ];
    }

    public function headings(): array
    {
        return [
            'name',
            'code',
            'url',
            'custom_api_available'
        ];
    }
}
