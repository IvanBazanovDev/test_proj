<?php

namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Id;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Test
{
    private Collection $questions;

    public function __construct(
        private Id $id,
        private string $title,
        private \DateTimeInterface $createdAt,
        private \DateTimeInterface $updatedAt
    ) {
        $this->questions = new ArrayCollection();
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function getRandomQuestions(): array
    {
        $questions = $this->questions->toArray();

        shuffle($questions);

        return $questions;
    }

    public function addQuestion(Question $question): void
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
        }
    }

    public function removeQuestion(Question $question): void
    {
        $this->questions->removeElement($question);
    }
}
