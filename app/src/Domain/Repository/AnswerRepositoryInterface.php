<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Answer;
use App\Domain\Entity\ValueObject\Id;

interface AnswerRepositoryInterface
{
    public function save(Answer $entity): void;

    public function findById(Id $id): Answer;
}
