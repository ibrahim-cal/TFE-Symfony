<?php

namespace App\Repository;

use App\Entity\AgentService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgentService|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentService|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentService[]    findAll()
 * @method AgentService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentService::class);
    }

    // /**
    //  * @return AgentService[] Returns an array of AgentService objects
    //  */

 public function findLike($value)
    {
        return $this->createQueryBuilder('s')
            ->Where('s.LONG_SERV LIKE :val') 
            ->orWhere('s.SHORT_SERV LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('s.SHORT_SERV', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

        public function findAllAsc()
    {
        return $this->findBy(array(), array('SHORT_SERV' => 'ASC'));
        ;
    }

    /*
    public function findOneBySomeField($value): ?AgentService
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
