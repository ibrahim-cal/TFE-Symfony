<?php

namespace App\Repository;

use App\Entity\BTRTL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BTRTL|null find($id, $lockMode = null, $lockVersion = null)
 * @method BTRTL|null findOneBy(array $criteria, array $orderBy = null)
 * @method BTRTL[]    findAll()
 * @method BTRTL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BTRTLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BTRTL::class);
    }

    // /**
    //  * @return BTRTL[] Returns an array of BTRTL objects
    //  */
    
 public function findLike($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.BTRTL LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('b.BTRTL', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


           public function findAllAsc()
    {
        return $this->findBy(array(), array('BTRTL' => 'ASC'));
        ;
    }

    /*
    public function findOneBySomeField($value): ?BTRTL
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
