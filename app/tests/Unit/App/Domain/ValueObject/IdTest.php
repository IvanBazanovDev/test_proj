<?php

declare(strict_types=1);

namespace App\Tests\Unit\App\Domain\ValueObject;

use App\Domain\Entity\ValueObject\Id;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    private const CORRECT_ID_VALUES = [
        '7d1099c6-444b-437a-bc57-cdf81ce36982',
        '7d1099c6-444b-437a-bc57-cdf81ce36981',
    ];

    private const CORRECT_ID_VALUE = '7d1099c6-444b-437a-bc57-cdf81ce36980';

    /**
     * @dataProvider correctValueDataProvider
     */
    public function testCorrectValueShouldNotRaiseException($value): void
    {
        $id = new Id($value);
        $this->assertInstanceOf(Id::class, $id);
        $this->assertEquals($value, (string) $id);
    }

    /**
     * @dataProvider incorrectValueDataProvider
     */
    public function testIncorrectValueShouldRaiseException($value): void
    {
        $this->expectException(\DomainException::class);

        new Id($value);
    }

    public function testIdToStringShouldReturnValue(): void
    {
        $id = new Id(self::CORRECT_ID_VALUE);

        $this->assertEquals(self::CORRECT_ID_VALUE, (string) $id);
    }

    public function testIdToJsonShouldReturnValue(): void
    {
        $id = new Id(self::CORRECT_ID_VALUE);
        $result = json_encode($id);
        $expected = '"'.self::CORRECT_ID_VALUE.'"';

        $this->assertEquals($expected, $result);
    }

    public function correctValueDataProvider(): array
    {
        return [
            self::CORRECT_ID_VALUES,
        ];
    }

    public function incorrectValueDataProvider(): array
    {
        return [
            [''],
        ];
    }
}
