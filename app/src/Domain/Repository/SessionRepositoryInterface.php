<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Session;
use App\Domain\Entity\ValueObject\Id;

interface SessionRepositoryInterface
{
    public function save(Session $entity): void;

    public function findById(Id $id): Session;
}
