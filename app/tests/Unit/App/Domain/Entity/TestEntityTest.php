<?php

namespace App\Tests\Unit\App\Domain\Entity;

use App\Domain\Entity\Question;
use App\Domain\Entity\Test;
use App\Domain\Entity\ValueObject\Id;
use PHPUnit\Framework\TestCase;

class TestEntityTest extends TestCase
{
    public function testConstructorAndGetters(): void
    {
        $id = new Id('test_uuid');
        $createdAt = new \DateTimeImmutable('2024-06-28 12:00:00');
        $updatedAt = new \DateTimeImmutable('2024-06-28 12:01:00');

        $test = new Test($id, 'Test title', $createdAt, $updatedAt);

        $this->assertSame($id, $test->getId());
        $this->assertEquals('Test title', $test->getTitle());
        $this->assertEquals($createdAt, $test->getCreatedAt());
        $this->assertEquals($updatedAt, $test->getUpdatedAt());
        $this->assertInstanceOf(\Doctrine\Common\Collections\Collection::class, $test->getQuestions());
        $this->assertEquals(0, $test->getQuestions()->count());
    }

    public function testSetTitle(): void
    {
        $test = new Test(new Id('test_uuid'), 'Test title', new \DateTimeImmutable(), new \DateTimeImmutable());
        $newTitle = 'Updated title';

        $test->setTitle($newTitle);

        $this->assertEquals($newTitle, $test->getTitle());
    }

    public function testAddRemoveQuestion(): void
    {
        $test = new Test(new Id('test_uuid'), 'Test title', new \DateTimeImmutable(), new \DateTimeImmutable());
        $question = new Question(new Id('question_uuid'), 'Test question', new \DateTimeImmutable(), new \DateTimeImmutable());

        $test->addQuestion($question);

        $this->assertTrue($test->getQuestions()->contains($question));

        $test->removeQuestion($question);

        $this->assertFalse($test->getQuestions()->contains($question));
    }
}
