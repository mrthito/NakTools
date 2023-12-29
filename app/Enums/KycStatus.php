<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Pending()
 * @method static static Approved()
 * @method static static Rejected()
 */
final class KycStatus extends Enum
{
    const Pending = 0;
    const Approved = 1;
    const Rejected = 2;
}
