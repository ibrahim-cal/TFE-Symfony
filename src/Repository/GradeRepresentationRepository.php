<?php

namespace App\Repository;

use App\Entity\GradeRepresentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GradeRepresentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method GradeRepresentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method GradeRepresentation[]    findAll()
 * @method GradeRepresentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GradeRepresentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GradeRepresentation::class);
    }

    // /**
    //  * @return GradeRepresentation[] Returns an array of GradeRepresentation objects
    //  */
 public function findLike($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.ZZREPGRADE_TXT LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('u.ZZREPGRADE', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


               public function findAllAsc()
    {
        return $this->findBy(array(), array('ZZREPGRADE' => 'ASC'));
        ;
    }
    /*
    public function findOneBySomeField($value): ?GradeRepresentation
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
