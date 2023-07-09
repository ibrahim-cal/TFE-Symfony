<?php

namespace App\Repository;

use App\Entity\ZFac;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ZFac|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZFac|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZFac[]    findAll()
 * @method ZFac[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZFacRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZFac::class);
    }

    // /**
    //  * @return ZFac[] Returns an array of ZFac objects
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
         public function findAllIdAsc()
    {
        return $this->findBy(array(), array('Fac' => 'ASC'));
        ;
    }
    

        public function UpdateZFac()
    {
          $conn = $this->getEntityManager()->getConnection();

        $sql = 
"INSERT INTO
     ZFac (Fac, Faculte)  
     SELECT 
     Unit.IDUNIT,
    Unit.IDUNIT_TXT
    FROM Unit
  WHERE NOT EXISTS (SELECT * FROM ZFac WHERE ZFac.Fac=Unit.IDUNIT LIMIT 1)";

 $stmt = $conn->prepare($sql);
       
   $stmt->execute();
  
}

    /*
    public function findOneBySomeField($value): ?ZFac
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
