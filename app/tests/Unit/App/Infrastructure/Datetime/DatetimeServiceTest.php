<?php

namespace App\Tests\Unit\App\Infrastructure\Datetime;

use App\Infrastructure\Datetime\DatetimeService;
use PHPUnit\Framework\TestCase;

class DatetimeServiceTest extends TestCase
{
    public function testGetCurrentDatetime(): void
    {
        $service = new DatetimeService();
        $currentDatetime = $service->getCurrentDatetime();

        $this->assertInstanceOf(\DateTimeImmutable::class, $currentDatetime);
        $this->assertLessThan(1, time() - $currentDatetime->getTimestamp());
    }
}
