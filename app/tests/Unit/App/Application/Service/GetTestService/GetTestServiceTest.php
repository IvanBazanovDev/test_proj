<?php

namespace App\Tests\Unit\App\Application\Service\GetTestService;

use App\Application\Service\GetTestService\Exception\QuestionNotFoundException;
use App\Application\Service\GetTestService\GetTestService;
use App\Domain\Entity\Test;
use App\Domain\Repository\TestRepositoryInterface;
use PHPUnit\Framework\TestCase;

class GetTestServiceTest extends TestCase
{
    public function testGetRandomTest(): void
    {
        $testMock = $this->createMock(Test::class);
        $repository = $this->createMock(TestRepositoryInterface::class);

        $repository->expects($this->once())
            ->method('findRandom')
            ->willReturn($testMock);

        $service = new GetTestService($repository);
        $test = $service->getRandomTest();

        $this->assertSame($testMock, $test);
    }

    public function testThrowException(): void
    {
        $this->expectException(QuestionNotFoundException::class);

        $repository = $this->createMock(TestRepositoryInterface::class);

        $repository->expects($this->once())
            ->method('findRandom')
            ->willThrowException(new \Exception('fail'));

        $service = new GetTestService($repository);
        $service->getRandomTest();
    }
}
