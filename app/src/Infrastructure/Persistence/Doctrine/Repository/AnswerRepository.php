<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\Answer;
use App\Domain\Entity\ValueObject\Id;
use App\Domain\Repository\AnswerRepositoryInterface;
use App\Domain\Repository\RepositoryException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

class AnswerRepository extends ServiceEntityRepository implements AnswerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Answer::class);
    }

    public function save(Answer $entity): void
    {
        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush();
        } catch (OptimisticLockException|ORMException $e) {
            throw new RepositoryException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function findById(Id $id): Answer
    {
        try {
            return $this->findOneBy(['id' => $id->getValue()]);
        } catch (ORMException $e) {
            throw new RepositoryException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
