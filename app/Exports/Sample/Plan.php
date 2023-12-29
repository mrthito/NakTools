<?php

namespace App\Exports\Sample;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Plan implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            [
                'name' => 'Plan Name',
                'description' => 'Plan Description',
                'interval' => '1',
                'interval_type' => '{1:day, 2:week, 3:month, 4:year}',
                'trial_period_days' => '30',
                'free' => '0'
            ]
        ];
    }

    public function headings(): array
    {
        return [
            'name',
            'description',
            'interval',
            'interval_type',
            'trial_period_days',
            'free'
        ];
    }
}
