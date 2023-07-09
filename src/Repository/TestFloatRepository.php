<?php

namespace App\Repository;

use App\Entity\TestFloat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TestFloat|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestFloat|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestFloat[]    findAll()
 * @method TestFloat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestFloatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestFloat::class);
    }

    // /**
    //  * @return TestFloat[] Returns an array of TestFloat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestFloat
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
