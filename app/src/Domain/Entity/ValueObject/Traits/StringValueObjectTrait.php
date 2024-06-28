<?php

declare(strict_types=1);

namespace App\Domain\Entity\ValueObject\Traits;

trait StringValueObjectTrait
{
    private string $value;

    /**
     * @throws \DomainException
     */
    public function __construct(string $value)
    {
        $this->validate($value);

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

    /**
     * @throws \DomainException
     */
    protected function validate(string $value): void
    {
        if ('' === $value) {
            throw new \DomainException('Value must not be empty');
        }
    }
}
