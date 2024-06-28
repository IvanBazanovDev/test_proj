<?php

namespace App\Tests\Unit\App\Domain\Entity;

use App\Domain\Entity\Answer;
use App\Domain\Entity\Question;
use App\Domain\Entity\ValueObject\Id;
use PHPUnit\Framework\TestCase;

class AnswerTest extends TestCase
{
    public function testConstructorAndGetters(): void
    {
        $id = new Id('test_uuid');
        $question = $this->createMock(Question::class);
        $createdAt = new \DateTimeImmutable('2024-06-28 12:00:00');
        $updatedAt = new \DateTimeImmutable('2024-06-28 12:01:00');

        $answer = new Answer($id, 'Test answer', $question, true, $createdAt, $updatedAt);

        $this->assertSame($id, $answer->getId());
        $this->assertEquals('Test answer', $answer->getText());
        $this->assertSame($question, $answer->getQuestion());
        $this->assertTrue($answer->isCorrect());
        $this->assertEquals($createdAt, $answer->getCreatedAt());
        $this->assertEquals($updatedAt, $answer->getUpdatedAt());
    }

    public function testSetQuestion(): void
    {
        $newQuestion = $this->createMock(Question::class);

        $answer = new Answer(new Id('test_uuid'), 'Test answer', $newQuestion, true, new \DateTimeImmutable(), new \DateTimeImmutable());

        $answer->setQuestion($newQuestion);

        $this->assertSame($newQuestion, $answer->getQuestion());
    }
}
