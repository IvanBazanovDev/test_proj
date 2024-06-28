<?php

namespace App\Application\Service\CreateSessionService;

use App\Application\Service\CreateSessionService\Exception\CreateSessionServiceException;
use App\Domain\Entity\Session;
use App\Domain\Entity\Test;
use App\Domain\Factory\SessionFactory\SessionFactoryInterface;
use App\Domain\Repository\SessionRepositoryInterface;

class CreateSessionService implements CreateSessionServiceInterface
{
    public function __construct(
        private SessionFactoryInterface $sessionFactory,
        private SessionRepositoryInterface $sessionRepository,
    ) {
    }

    public function create(Test $test, ?string $result = null): Session
    {
        try {
            $session = $this->sessionFactory->create($test, $result);

            $this->sessionRepository->save($session);

            return $session;
        } catch (\Throwable $e) {
            throw new CreateSessionServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
