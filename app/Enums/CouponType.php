<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Fixed()
 * @method static static Percentage()
 */
final class CouponType extends Enum
{
    const fixed = 1;
    const percentage = 2;

    public static function getDescription($value): string
    {
        if ($value === self::fixed) {
            return 'Fixed';
        }

        if ($value === self::percentage) {
            return 'Percentage';
        }

        return parent::getDescription($value);
    }
}
