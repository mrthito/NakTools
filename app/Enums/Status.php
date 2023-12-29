<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Inactive()
 * @method static static Active()
 * @method static static Deleted()
 */
final class Status extends Enum
{
    const Inactive = 0;
    const Active = 1;
    const Deleted = 2;

    public static function getDescription($value): string
    {
        if ($value == self::Inactive) {
            return 'Inactive';
        }

        if ($value == self::Active) {
            return 'Active';
        }

        if ($value == self::Deleted) {
            return 'Deleted';
        }

        return parent::getDescription($value);
    }

}
