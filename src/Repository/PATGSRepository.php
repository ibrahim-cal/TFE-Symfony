<?php

namespace App\Repository;

use App\Entity\PATGS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PATGS|null find($id, $lockMode = null, $lockVersion = null)
 * @method PATGS|null findOneBy(array $criteria, array $orderBy = null)
 * @method PATGS[]    findAll()
 * @method PATGS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PATGSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PATGS::class);
    }

    // /**
    //  * @return PATGS[] Returns an array of PATGS objects
    //  */
    
   public function findLike($value)
    {
        return $this->createQueryBuilder('patgs')
            ->Where('patgs.PERSKLIB LIKE :val') 
            ->orWhere('patgs.PERSK LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('patgs.PERSK', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }



       public function findAllAsc()
    {
        return $this->findBy(array(), array('PERSK' => 'ASC'));
    }




       public function deletePATGS($value)
    {
        return $this->createQueryBuilder('p')
            ->delete()
            ->Where('p.PERSK = :val') 
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?PATGS
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
