<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\Test;
use App\Domain\Repository\NotFoundException;
use App\Domain\Repository\RepositoryException;
use App\Domain\Repository\TestRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

class TestRepository extends ServiceEntityRepository implements TestRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Test::class);
    }

    public function save(Test $entity): void
    {
        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush();
        } catch (OptimisticLockException|ORMException $e) {
            throw new RepositoryException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function findRandom(): Test
    {
        try {
            $qb = $this->createQueryBuilder('entity')
                ->select('COUNT(entity)')
            ;

            $totalRecords = $qb->getQuery()->getSingleScalarResult();

            if ($totalRecords < 1) {
                throw new NotFoundException('Test count is less than 1');
            }

            $rowToFetch = random_int(0, $totalRecords - 1);

            return $qb
                ->select('entity')
                ->setMaxResults(1)
                ->setFirstResult($rowToFetch)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        } catch (ORMException $e) {
            throw new RepositoryException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
