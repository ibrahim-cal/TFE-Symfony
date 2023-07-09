<?php

namespace App\Repository;

use App\Entity\Zpresponsable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zpresponsable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zpresponsable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zpresponsable[]    findAll()
 * @method Zpresponsable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZpresponsableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zpresponsable::class);
    }

    // /**
    //  * @return Zpresponsable[] Returns an array of Zpresponsable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Zpresponsable
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
