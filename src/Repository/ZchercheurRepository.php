<?php

namespace App\Repository;

use App\Entity\Zchercheur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zchercheur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zchercheur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zchercheur[]    findAll()
 * @method Zchercheur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZchercheurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zchercheur::class);
    }

    // /**
    //  * @return Zchercheur[] Returns an array of Zchercheur objects
    //  */
    
    public function findChercheur($value)
    {
        return $this->createQueryBuilder('z')
            ->select('z.Idche')
            ->Where('z.Matricule = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getScalarResult();
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Zchercheur
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
