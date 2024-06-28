<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Entity\ValueObject\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class UuidType extends GuidType
{
    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        return null === $value ? null : new Id($value);
    }

    public function getName(): string
    {
        return 'uuid';
    }
}
