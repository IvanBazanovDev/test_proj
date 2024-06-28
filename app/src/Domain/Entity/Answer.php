<?php

namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Id;

class Answer
{
    public function __construct(
        private Id $id,
        private string $text,
        private Question $question,
        private bool $correct,
        private \DateTimeInterface $createdAt,
        private \DateTimeInterface $updatedAt
    ) {
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function isCorrect(): bool
    {
        return $this->correct;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}
