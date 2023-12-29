<?php

namespace App\Exports\Sample;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Coupon implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            [
                'code' => 'COUPONCODE',
                'type' => '{1:fixed, 2:percentage}',
                'value' => '10',
                'description' => 'This is a coupon description',
                'start_date' => '2021-01-01',
                'end_date' => '2021-12-31'
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'code',
            'type',
            'value',
            'description',
            'start_date',
            'end_date'
        ];
    }
}
