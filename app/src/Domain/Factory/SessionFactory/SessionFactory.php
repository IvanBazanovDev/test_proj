<?php

namespace App\Domain\Factory\SessionFactory;

use App\Domain\Entity\Session;
use App\Domain\Entity\Test;
use App\Domain\Service\Datetime\DatetimeServiceInterface;
use App\Domain\Service\IdService\IdServiceInterface;

class SessionFactory implements SessionFactoryInterface
{
    public function __construct(
        private DatetimeServiceInterface $datetimeService,
        private IdServiceInterface $idService,
    ) {
    }

    public function create(Test $test, ?string $result = null): Session
    {
        $currentDate = $this->datetimeService->getCurrentDatetime();
        $id = $this->idService->generateId();

        return new Session(
            $id,
            $test,
            $currentDate,
            $currentDate,
            $result
        );
    }
}
