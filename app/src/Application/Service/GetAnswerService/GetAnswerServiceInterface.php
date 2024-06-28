<?php

namespace App\Application\Service\GetAnswerService;

use App\Domain\Entity\Answer;
use App\Domain\Entity\ValueObject\Id;

interface GetAnswerServiceInterface
{
    public function getById(Id $id): Answer;
}
