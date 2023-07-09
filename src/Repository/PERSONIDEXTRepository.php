<?php

namespace App\Repository;

use App\Entity\PERSONIDEXT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PERSONIDEXT|null find($id, $lockMode = null, $lockVersion = null)
 * @method PERSONIDEXT|null findOneBy(array $criteria, array $orderBy = null)
 * @method PERSONIDEXT[]    findAll()
 * @method PERSONIDEXT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PERSONIDEXTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PERSONIDEXT::class);
    }

    // /**
    //  * @return PERSONIDEXT[] Returns an array of PERSONIDEXT objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PERSONIDEXT
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
