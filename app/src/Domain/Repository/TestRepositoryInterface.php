<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Test;

interface TestRepositoryInterface
{
    public function save(Test $entity): void;

    public function findRandom(): Test;
}
