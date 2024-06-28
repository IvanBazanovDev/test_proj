<?php

namespace App\Tests\Unit\App\Infrastructure\IdService;

use App\Domain\Entity\ValueObject\Id;
use App\Infrastructure\IdService\IdService;
use PHPUnit\Framework\TestCase;

class IdServiceTest extends TestCase
{
    public function testGenerateId(): void
    {
        $service = new IdService();
        $generatedId = $service->generateId();

        $this->assertInstanceOf(Id::class, $generatedId);
        $this->assertNotEmpty($generatedId->getValue());
        $this->assertTrue($this->isValidUuid($generatedId->getValue()));
    }

    private function isValidUuid(string $uuid): bool
    {
        return (bool) preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i', $uuid);
    }
}
