<?php

declare(strict_types=1);

namespace App\Domain\Service\Datetime;

interface DatetimeServiceInterface
{
    public function getCurrentDatetime(): \DateTimeInterface;
}
