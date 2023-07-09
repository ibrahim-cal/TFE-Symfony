<?php

namespace App\Repository;

use App\Entity\AgentFonction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgentFonction|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentFonction|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentFonction[]    findAll()
 * @method AgentFonction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentFonctionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentFonction::class);
    }

    // /**
    //  * @return AgentFonction[] Returns an array of AgentFonction objects
    //  */
  
 public function findLike($value)
    {
        return $this->createQueryBuilder('f')
            ->Where('f.ZZGRADE_TXT LIKE :val') 
            ->orWhere('f.ZZGRADE LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('f.ZZGRADE', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


         public function findAllAsc()
    {
        return $this->findBy(array(), array('ZZGRADE' => 'ASC'));
        ;
    }


    /*
    public function findOneBySomeField($value): ?AgentFonction
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
