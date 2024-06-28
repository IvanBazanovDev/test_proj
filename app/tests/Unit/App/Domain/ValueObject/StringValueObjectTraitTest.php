<?php

declare(strict_types=1);

namespace App\Tests\Unit\App\Domain\ValueObject;

use PHPUnit\Framework\TestCase;

class StringValueObjectTraitTest extends TestCase
{
    public function testToString(): void
    {
        $stringValueObject = new TestStringValueObject('some_string');

        $this->assertEquals(
            'some_string',
            (string) $stringValueObject
        );
    }

    public function testJsonSerialize(): void
    {
        $stringValueObject = new TestStringValueObject('some_string');

        $this->assertEquals(
            json_encode('some_string'),
            json_encode($stringValueObject)
        );
    }

    public function testGetValue(): void
    {
        $stringValueObject = new TestStringValueObject('some_string');

        $this->assertEquals(
            'some_string',
            $stringValueObject->getValue()
        );
    }

    public function testNotValid(): void
    {
        $this->expectException(\DomainException::class);

        new TestStringValueObject('');
    }
}
