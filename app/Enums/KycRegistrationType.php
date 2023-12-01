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
    const SolePropriter = 1;
    const Company = 2;
}
