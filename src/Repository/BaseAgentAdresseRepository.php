<?php

namespace App\Repository;

use App\Entity\BaseAgentAdresse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BaseAgentAdresse|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaseAgentAdresse|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaseAgentAdresse[]    findAll()
 * @method BaseAgentAdresse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaseAgentAdresseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaseAgentAdresse::class);
    }

    // /**
    //  * @return BaseAgentAdresse[] Returns an array of BaseAgentAdresse objects
    //  */
    
    public function findAllByUnit($value)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_Unit = :val')
            ->setParameter('val', $value)
            ->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }



 public function findLike($value)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Nom LIKE :val') 
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('b.Nom', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


 public function UpdateNomPref($value, $valueDeux)
    {
        return $this->createQueryBuilder('b')
            ->update()
            ->set('b.Nom_pref', ':val')
            ->setParameter('val', $value)
            ->Where('b.PERSONID_EXT = :valDeux') 
            ->setParameter('valDeux', $valueDeux)
            ->getQuery()
            ->getResult()
        ;
    }

 public function UpdatePrenomPref($value, $valueDeux)
    {
        return $this->createQueryBuilder('b')
            ->update()
            ->set('b.Prenom_pref', ':val')
            ->setParameter('val', $value)
            ->Where('b.PERSONID_EXT = :valDeux') 
            ->setParameter('valDeux', $valueDeux)
            ->getQuery()
            ->getResult()
        ;
    }


        public function findAllAsc()
    {
        return $this->findBy(array(), array('PERSONID_EXT' => 'ASC'));
        ;
    }

/*
    public function findUniteChercheur($value)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_Unit = :val')
            ->setParameter('val', $value)
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

*/

    

    /*
    public function findOneBySomeField($value): ?BaseAgentAdresse
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
