<?php

namespace App\Repository;

use App\Entity\Fonction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fonction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fonction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fonction[]    findAll()
 * @method Fonction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fonction::class);
    }



             public function findAllAsc()
    {
        return $this->findBy(array(), array('idFonction' => 'ASC'));
        ;
    }


     public function UpdateFonction()
    {
          $conn = $this->getEntityManager()->getConnection();

        $sql = 
'INSERT INTO
     Fonction (id_fonction, libelle_du_fonction)  
     SELECT 
     Agent_Fonction.ZZGRADE,
    Agent_Fonction.ZZGRADE_TXT
    FROM Agent_Fonction
  WHERE NOT EXISTS (SELECT * FROM Fonction WHERE Fonction.id_Fonction=Agent_Fonction.ZZGRADE LIMIT 1)';

 $stmt = $conn->prepare($sql);
       
   $stmt->execute();
  
}

    // /**
    //  * @return Fonction[] Returns an array of Fonction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fonction
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
