<?php

namespace App\Domain\Factory\SessionFactory;

use App\Domain\Entity\Session;
use App\Domain\Entity\Test;

interface SessionFactoryInterface
{
    public function create(Test $test, ?string $result = null): Session;
}
