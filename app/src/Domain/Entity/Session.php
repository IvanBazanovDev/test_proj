<?php

namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Id;

class Session
{
    public function __construct(
        private Id $id,
        private Test $test,
        private \DateTimeInterface $createdAt,
        private \DateTimeInterface $updatedAt,
        private ?string $result = null,
    ) {
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getTest(): Test
    {
        return $this->test;
    }

    public function setTest(Test $test): void
    {
        $this->test = $test;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }
}
