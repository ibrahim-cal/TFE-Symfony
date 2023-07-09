<?php

namespace App\Repository;

use App\Entity\ZService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ZService|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZService|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZService[]    findAll()
 * @method ZService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZService::class);
    }

    // /**
    //  * @return ZService[] Returns an array of ZService objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
            public function findAllAsc()
    {
        return $this->findBy(array(), array('SHORT_SERV' => 'ASC'));
        ;
    }


        public function UpdateZService()
    {
          $conn = $this->getEntityManager()->getConnection();

        $sql = 
'INSERT INTO
     ZService (SHORT_SERV, LONG_SERV, LIBEL_SERV)  
     SELECT 
     Agent_Service.SHORT_SERV,
    Agent_Service.LONG_SERV,
     Agent_Service.LIBEL_SERV
     FROM Agent_Service';

 $stmt = $conn->prepare($sql);
       
   $stmt->execute();
  
}

    /*
    public function findOneBySomeField($value): ?ZService
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
