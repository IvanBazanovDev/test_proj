<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Question;
use App\Domain\Entity\ValueObject\Id;

interface QuestionRepositoryInterface
{
    public function save(Question $entity): void;

    public function findById(Id $id): Question;
}
