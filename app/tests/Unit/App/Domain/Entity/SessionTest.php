<?php

namespace App\Tests\Unit\App\Domain\Entity;

use App\Domain\Entity\Session;
use App\Domain\Entity\Test;
use App\Domain\Entity\ValueObject\Id;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    public function testConstructorAndGetters(): void
    {
        $id = new Id('test_uuid');
        $test = $this->createMock(Test::class);
        $createdAt = new \DateTimeImmutable('2024-06-28 12:00:00');
        $updatedAt = new \DateTimeImmutable('2024-06-28 12:01:00');

        $session = new Session($id, $test, $createdAt, $updatedAt);

        $this->assertSame($id, $session->getId());
        $this->assertSame($test, $session->getTest());
        $this->assertEquals($createdAt, $session->getCreatedAt());
        $this->assertEquals($updatedAt, $session->getUpdatedAt());
        $this->assertNull($session->getResult());
    }

    public function testSetTest(): void
    {
        $newTest = $this->createMock(Test::class);

        $session = new Session(new Id('test_uuid'), $newTest, new \DateTimeImmutable(), new \DateTimeImmutable());

        $session->setTest($newTest);

        $this->assertSame($newTest, $session->getTest());
    }

    public function testGetResult(): void
    {
        $testMock = $this->createMock(Test::class);
        $session = new Session(new Id('test_uuid'), $testMock, new \DateTimeImmutable(), new \DateTimeImmutable(), 'test');

        $this->assertEquals('test', $session->getResult());

        $sessionWithoutResult = new Session(new Id('test_uuid'), $testMock, new \DateTimeImmutable(), new \DateTimeImmutable());

        $this->assertNull($sessionWithoutResult->getResult());
    }
}
