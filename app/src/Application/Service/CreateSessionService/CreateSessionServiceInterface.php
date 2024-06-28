<?php

namespace App\Application\Service\CreateSessionService;

use App\Domain\Entity\Session;
use App\Domain\Entity\Test;

interface CreateSessionServiceInterface
{
    public function create(Test $test, ?string $result = null): Session;
}
