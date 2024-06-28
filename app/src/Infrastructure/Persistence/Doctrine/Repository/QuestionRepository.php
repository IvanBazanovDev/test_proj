<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\Question;
use App\Domain\Entity\ValueObject\Id;
use App\Domain\Repository\QuestionRepositoryInterface;
use App\Domain\Repository\RepositoryException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

class QuestionRepository extends ServiceEntityRepository implements QuestionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    public function save(Question $entity): void
    {
        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush();
        } catch (OptimisticLockException|ORMException $e) {
            throw new RepositoryException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function findById(Id $id): Question
    {
        try {
            return $this->findOneBy(['id' => $id->getValue()]);
        } catch (ORMException $e) {
            throw new RepositoryException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
