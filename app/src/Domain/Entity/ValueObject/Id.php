<?php

declare(strict_types=1);

namespace App\Domain\Entity\ValueObject;

class Id implements \JsonSerializable, \Stringable
{
    private string $value;

    /**
     * Id constructor.
     */
    public function __construct(string $value)
    {
        if ('' === $value) {
            throw new \DomainException('Id value must not be empty');
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
