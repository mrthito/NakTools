<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static No()
 * @method static static Yes()
 */
final class YesOrNoEnum extends Enum
{
    const No = 0;
    const Yes = 1;

    public static function getDescription($value): string
    {
        if ($value == self::No) {
            return 'No';
        }
        if ($value == self::Yes) {
            return 'Yes';
        }
    }
}
