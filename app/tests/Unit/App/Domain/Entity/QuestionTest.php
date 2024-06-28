<?php

namespace App\Tests\Unit\App\Domain\Entity;

use App\Domain\Entity\Answer;
use App\Domain\Entity\Question;
use App\Domain\Entity\ValueObject\Id;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class QuestionTest extends TestCase
{
    public function testConstructorAndGetters(): void
    {
        $id = new Id('test_uuid');
        $createdAt = new \DateTimeImmutable('2024-06-28 12:00:00');
        $updatedAt = new \DateTimeImmutable('2024-06-28 12:01:00');

        $question = new Question($id, 'Test question', $createdAt, $updatedAt);

        $this->assertSame($id, $question->getId());
        $this->assertEquals('Test question', $question->getText());
        $this->assertInstanceOf(Collection::class, $question->getAnswers());
        $this->assertEquals(0, $question->getAnswers()->count());
        $this->assertEquals($createdAt, $question->getCreatedAt());
        $this->assertEquals($updatedAt, $question->getUpdatedAt());
    }

    public function testAddRemoveAnswer(): void
    {
        $question = new Question(new Id('test_uuid'), 'Test question', new \DateTimeImmutable(), new \DateTimeImmutable());
        $answer = new Answer(new Id('answer_uuid'), 'Test answer', $question, true, new \DateTimeImmutable(), new \DateTimeImmutable());

        $this->assertInstanceOf(Collection::class, $question->getAnswers());

        $question->addAnswer($answer);

        $this->assertTrue($question->getAnswers()->contains($answer));
        $this->assertSame($question, $answer->getQuestion());

        $question->removeAnswer($answer);

        $this->assertFalse($question->getAnswers()->contains($answer));
    }
}
