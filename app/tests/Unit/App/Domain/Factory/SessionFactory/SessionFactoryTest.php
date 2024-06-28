<?php

namespace App\Tests\Unit\App\Domain\Factory\SessionFactory;

use App\Domain\Entity\Session;
use App\Domain\Entity\Test;
use App\Domain\Factory\SessionFactory\SessionFactory;
use App\Domain\Service\Datetime\DatetimeServiceInterface;
use App\Domain\Service\IdService\IdServiceInterface;
use PHPUnit\Framework\TestCase;

class SessionFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $testMock = $this->createMock(Test::class);
        $datetimeServiceMock = $this->createMock(DatetimeServiceInterface::class);
        $idServiceMock = $this->createMock(IdServiceInterface::class);

        $datetimeServiceMock->expects($this->once())
            ->method('getCurrentDatetime')
            ->willReturn(new \DateTimeImmutable('2024-06-28 12:00:00'));

        $idServiceMock->expects($this->once())
            ->method('generateId')
            ->willReturn(new \App\Domain\Entity\ValueObject\Id('generated_uuid'));

        $factory = new SessionFactory($datetimeServiceMock, $idServiceMock);
        $session = $factory->create($testMock);

        $this->assertInstanceOf(Session::class, $session);
        $this->assertEquals('generated_uuid', $session->getId()->getValue());
        $this->assertSame($testMock, $session->getTest());
        $this->assertEquals(new \DateTimeImmutable('2024-06-28 12:00:00'), $session->getCreatedAt());
        $this->assertEquals(new \DateTimeImmutable('2024-06-28 12:00:00'), $session->getUpdatedAt());
    }
}
