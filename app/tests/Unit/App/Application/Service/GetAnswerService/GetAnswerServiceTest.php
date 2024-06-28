<?php

namespace App\Tests\Unit\App\Application\Service\GetAnswerService;

use App\Application\Service\GetAnswerService\Exception\GetAnswerServiceException;
use App\Application\Service\GetAnswerService\GetAnswerService;
use App\Domain\Entity\Answer;
use App\Domain\Entity\ValueObject\Id;
use App\Domain\Repository\AnswerRepositoryInterface;
use PHPUnit\Framework\TestCase;

class GetAnswerServiceTest extends TestCase
{
    public function testGetById(): void
    {
        $answerMock = $this->createMock(Answer::class);
        $repository = $this->createMock(AnswerRepositoryInterface::class);

        $repository->expects($this->once())
            ->method('findById')
            ->willReturn($answerMock);

        $service = new GetAnswerService($repository);
        $id = new Id('valid_uuid');
        $answer = $service->getById($id);

        $this->assertSame($answerMock, $answer);
    }

    public function testThrowException(): void
    {
        $this->expectException(GetAnswerServiceException::class);

        $repository = $this->createMock(AnswerRepositoryInterface::class);

        $repository->expects($this->once())
            ->method('findById')
            ->willThrowException(new \Exception('fail'));

        $service = new GetAnswerService($repository);
        $id = new Id('invalid_uuid');
        $service->getById($id);
    }
}
