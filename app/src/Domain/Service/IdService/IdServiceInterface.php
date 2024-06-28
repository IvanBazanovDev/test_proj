<?php

namespace App\Domain\Service\IdService;

use App\Domain\Entity\ValueObject\Id;

interface IdServiceInterface
{
    public function generateId(): Id;
}
