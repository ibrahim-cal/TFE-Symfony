<?php

namespace App\Repository;

use App\Entity\Unit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Unit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Unit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Unit[]    findAll()
 * @method Unit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Unit::class);
    }

    // /**
    //  * @return Unit[] Returns an array of Unit objects
    //  */
 public function findLike($value)
    {
        return $this->createQueryBuilder('u')
            ->Where('u.IDUNIT_TXT LIKE :val') 
            ->orWhere('u.IDUNIT LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('u.IDUNIT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


     public function findAllAsc()
    {
        return $this->findBy(array(), array('IDUNIT_TXT' => 'ASC'));
        ;
    }


     public function findAllIdAsc()
    {
        return $this->findBy(array(), array('IDUNIT' => 'ASC'));
        ;
    }





    /*
    public function findOneBySomeField($value): ?Unit
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
