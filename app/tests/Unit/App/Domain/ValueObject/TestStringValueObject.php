<?php

declare(strict_types=1);

namespace App\Tests\Unit\App\Domain\ValueObject;

use App\Domain\Entity\ValueObject\Traits\StringValueObjectTrait;

class TestStringValueObject implements \JsonSerializable
{
    use StringValueObjectTrait;
}
