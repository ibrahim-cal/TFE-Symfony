<?php

namespace App\Repository;

use App\Entity\Mandats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mandats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mandats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mandats[]    findAll()
 * @method Mandats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MandatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mandats::class);
    }
    // /**
    //  * @return Mandats[] Returns an array of Mandats objects
    //  */
       public function findDoublon($value)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.PERNR LIKE :val' )
            ->setParameter('val', $value.'%')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllByBTRTL($value)
    {
        
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_BTRTL = :val')
            ->setParameter('val', $value)
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

        public function findAllByCategories($value)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_PERSG = :val')
            ->setParameter('val', $value)
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

            public function findAllByType($value)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_ANSVH = :val')
            ->setParameter('val', $value)
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

                public function findAllByBtrtl_Type_Categorie($value, $valueDeux, $valueTrois)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_BTRTL = :val')
            ->andWhere('b.Fk_PERSG = :valDeux')
            ->andWhere('b.Fk_ANSVH = :valTrois')
            ->setParameters(array('val'=> $value, 'valDeux' => $valueDeux, 'valTrois' => $valueTrois))
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

                  public function findAllByBtrtl_Type($value,  $valueTrois)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_BTRTL = :val')
            ->andWhere('b.Fk_ANSVH = :valTrois')
            ->setParameters(array('val'=> $value,  'valTrois' => $valueTrois))
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

                  public function findAllByBtrtl_Categorie($value,  $valueDeux)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_BTRTL = :val')
            ->andWhere('b.Fk_PERSG = :valDeux')
            ->setParameters(array('val'=> $value,  'valDeux' => $valueDeux))
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
                   public function findAllByType_Categorie($valueDeux, $valueTrois)
    {
        return $this->createQueryBuilder('b')
            ->Where('b.Fk_PERSG = :valDeux')
            ->andWhere('b.Fk_ANSVH = :valTrois')
            ->setParameters(array('valDeux' => $valueDeux, 'valTrois' => $valueTrois))
            //->orderBy('b.PERSONID_EXT', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

              public function findAllAsc()
    {
        return $this->findBy(array(), array('PERNR' => 'ASC'));
        ;
    }
}
