<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Days()
 * @method static static Weeks()
 * @method static static Months()
 * @method static static Years
 */
final class TimeIntervalEnum extends Enum
{
    const Days = 1;
    const Weeks = 2;
    const Months = 3;
    const Years = 4;

    public static function getDescription($value, ?int $count = 0): string
    {
        if ($value === self::Days) {
            return $count > 1 ? 'Days' : 'Day';
        }
        if ($value === self::Weeks) {
            return $count > 1 ? 'Weeks' : 'Week';
        }
        if ($value === self::Months) {
            return $count > 1 ? 'Months' : 'Month';
        }
        if ($value === self::Years) {
            return $count > 1 ? 'Years' : 'Year';
        }
        return parent::getDescription($value);
    }
}
