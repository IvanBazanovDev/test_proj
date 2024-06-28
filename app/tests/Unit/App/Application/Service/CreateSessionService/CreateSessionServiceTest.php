<?php

namespace App\Tests\Unit\App\Application\Service\CreateSessionService;

use App\Application\Service\CreateSessionService\CreateSessionService;
use App\Application\Service\CreateSessionService\Exception\CreateSessionServiceException;
use App\Domain\Entity\Session;
use App\Domain\Entity\Test;
use App\Domain\Entity\ValueObject\Id;
use App\Domain\Factory\SessionFactory\SessionFactoryInterface;
use App\Domain\Repository\SessionRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class CreateSessionServiceTest extends TestCase
{
    public function testCreate(): void
    {
        $testMock = $this->createMock(Test::class);
        $factory = $this->createMock(SessionFactoryInterface::class);
        $repository = $this->createMock(SessionRepositoryInterface::class);
        $newSession = $this->getSession($testMock);

        $factory->expects($this->any())
            ->method('create')
            ->willReturn($newSession);

        $repository->expects($this->any())
            ->method('save')
        ;

        $service = new CreateSessionService($factory, $repository);
        $session = $service->create($testMock);

        $this->assertEquals($newSession->getId()->getValue(), $session->getId()->getValue());
    }

    public function testThrowException(): void
    {
        $this->expectException(CreateSessionServiceException::class);

        $testMock = $this->createMock(Test::class);
        $factory = $this->createMock(SessionFactoryInterface::class);
        $repository = $this->createMock(SessionRepositoryInterface::class);

        $factory->expects($this->any())
            ->method('create')
            ->willThrowException(new \Exception('fail'));

        $service = new CreateSessionService($factory, $repository);
        $service->create($testMock);
    }

    private function getSession(Test $testMock): Session
    {
        return new Session(
            new Id(Uuid::uuid4()->toString()),
            $testMock,
            new \DateTimeImmutable(),
            new \DateTimeImmutable(),
        );
    }
}
