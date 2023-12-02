<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Pending()
 * @method static static Approved()
 * @method static static Rejected()
 * @method static static Expired()
 * @method static static ReUploadRequired()
 */
final class KycDocsStatus extends Enum
{
    const Pending = 0;
    const Approved = 1;
    const Rejected = 2;
    const Expired = 3;
    const ReUploadRequired = 4;
}
