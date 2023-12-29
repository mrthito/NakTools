<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Individual()
 * @method static static SolePropriter()
 * @method static static Company()
 */
final class KycRegistrationType extends Enum
{
    const Individual = 0;
    const SoleProprietor = 1;
    const Company = 2;

    public static function getDescription($value): string
    {
        if ($value === self::Individual) {
            return 'Individual';
        }
        if ($value === self::SoleProprietor) {
            return 'Sole Proprietor';
        }
        if ($value === self::Company) {
            return 'Company';
        }
        return parent::getDescription($value);
    }
}
