<?php

namespace App\Repository;

use App\Entity\AgentCpi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgentCpi|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentCpi|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentCpi[]    findAll()
 * @method AgentCpi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentCpiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentCpi::class);
    }

    // /**
    //  * @return AgentCpi[] Returns an array of AgentCpi objects
    //  */
 public function findLike($value)
    {
        return $this->createQueryBuilder('c')
            ->Where('c.CPI_SERV_LIBEL LIKE :val') 
            ->orWhere('c.CPI_SERV LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('c.CPI_SERV', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

         public function findAllAsc()
    {
        return $this->findBy(array(), array('CPI_SERV' => 'ASC'));
        ;
    }


    /*
    public function findOneBySomeField($value): ?AgentCpi
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
