<?php

namespace App\Application\Service\GetAnswerService;

use App\Application\Service\GetAnswerService\Exception\GetAnswerServiceException;
use App\Domain\Entity\Answer;
use App\Domain\Entity\ValueObject\Id;
use App\Domain\Repository\AnswerRepositoryInterface;

class GetAnswerService implements GetAnswerServiceInterface
{
    public function __construct(
        private AnswerRepositoryInterface $repository
    ) {
    }

    public function getById(Id $id): Answer
    {
        try {
            $answer = $this->repository->findById($id);

            return $answer;
        } catch (\Throwable $e) {
            throw new GetAnswerServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
