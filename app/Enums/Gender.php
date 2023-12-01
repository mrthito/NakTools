<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Male()
 * @method static static Female()
 * @method static static Other()
 * @method static static RatherNotSay()
 */
final class Gender extends Enum
{
    const Male = 1;
    const Female = 2;
    const Other = 3;
    const RatherNotSay = 4;

    public static function getDescription(mixed $value): string
    {
        switch ($value) {
            case self::Male:
                return 'Male';
            case self::Female:
                return 'Female';
            case self::Other:
                return 'Other';
            case self::RatherNotSay:
                return 'Rather Not Say';
            default:
                return 'Unknown';
        }
    }
}
