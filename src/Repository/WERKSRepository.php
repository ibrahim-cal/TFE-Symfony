<?php

namespace App\Repository;

use App\Entity\WERKS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WERKS|null find($id, $lockMode = null, $lockVersion = null)
 * @method WERKS|null findOneBy(array $criteria, array $orderBy = null)
 * @method WERKS[]    findAll()
 * @method WERKS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WERKSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WERKS::class);
    }

    // /**
    //  * @return WERKS[] Returns an array of WERKS objects
    //  */
 public function findLike($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.WERKS LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
               ->orderBy('w.WERKS', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


             public function findAllAsc()
    {
        return $this->findBy(array(), array('WERKS' => 'ASC'));
        ;
    }

    /*
    public function findOneBySomeField($value): ?WERKS
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
