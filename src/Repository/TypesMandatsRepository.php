<?php

namespace App\Repository;

use App\Entity\TypesMandats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypesMandats|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesMandats|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesMandats[]    findAll()
 * @method TypesMandats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesMandatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesMandats::class);
    }

    // /**
    //  * @return TypesMandats[] Returns an array of TypesMandats objects
    //  */
    
 public function findLike($value)
    {
        return $this->createQueryBuilder('t')
            ->Where('t.ansvh_lib LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
           ->orderBy('t.ANSVH', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

               public function findAllAsc()
    {
        return $this->findBy(array(), array('ansvh_lib' => 'ASC'));
        ;
    }

    /*
    public function findOneBySomeField($value): ?TypesMandats
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
