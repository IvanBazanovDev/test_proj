<?php

namespace App\Infrastructure\IdService;

use App\Domain\Entity\ValueObject\Id;
use App\Domain\Service\IdService\IdServiceInterface;
use Ramsey\Uuid\Uuid;

class IdService implements IdServiceInterface
{
    public function generateId(): Id
    {
        return new Id(Uuid::uuid4()->toString());
    }
}
