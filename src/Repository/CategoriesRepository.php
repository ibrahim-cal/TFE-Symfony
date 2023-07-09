<?php

namespace App\Repository;

use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Categories|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categories|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categories[]    findAll()
 * @method Categories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categories::class);
    }

    // /**
    //  * @return Categories[] Returns an array of Categories objects
    //  */
 public function findLike($value)
    {
        return $this->createQueryBuilder('cat')
            ->Where('cat.PERSGLIB LIKE :val') 
            ->orWhere('cat.PERSG LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('cat.PERSG', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }



               public function findAllAsc()
    {
        return $this->findBy(array(), array('PERSGLIB' => 'ASC'));
        ;
    }

                   public function findAllAscPERSGLIB()
    {
        return $this->findBy(array(), array('PERSGLIB' => 'ASC'));
        ;
    }

    /*
    public function findOneBySomeField($value): ?Categories
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
