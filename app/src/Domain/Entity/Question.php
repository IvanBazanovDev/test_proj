<?php

namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Id;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Question
{
    private Collection $answers;

    public function __construct(
        private Id $id,
        private string $text,
        private \DateTimeInterface $createdAt,
        private \DateTimeInterface $updatedAt
    ) {
        $this->answers = new ArrayCollection();
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function getRandomAnswers(): array
    {
        $answers = $this->answers->toArray();

        shuffle($answers);

        return $answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        $this->answers->removeElement($answer);

        return $this;
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
