<?php

namespace App\Application\Service\GetTestService;

use App\Application\Service\GetTestService\Exception\QuestionNotFoundException;
use App\Domain\Entity\Test;
use App\Domain\Repository\TestRepositoryInterface;

class GetTestService implements GetTestServiceInterface
{
    public function __construct(
        private TestRepositoryInterface $testRepository
    ) {
    }

    public function getRandomTest(): Test
    {
        try {
            return $this->testRepository->findRandom();
        } catch (\Throwable $e) {
            throw new QuestionNotFoundException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
