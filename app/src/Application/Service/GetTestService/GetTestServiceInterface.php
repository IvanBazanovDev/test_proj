<?php

namespace App\Application\Service\GetTestService;

use App\Domain\Entity\Test;

interface GetTestServiceInterface
{
    public function getRandomTest(): Test;
}
