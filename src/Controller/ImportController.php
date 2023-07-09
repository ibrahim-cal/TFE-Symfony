<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\WERKS;
use  App\Entity\BTRTL;
use  App\Entity\PATGS;
use App\Entity\Academique;
use  App\Entity\AgentCpi;
use  App\Entity\AgentFonction;
use  App\Entity\AgentService;
use App\Entity\BaseAgentAdresse;
use  App\Entity\Categories;
use  App\Entity\GradeRepresentation;
use App\Entity\Mandats;
use  App\Entity\TypesMandats;
use  App\Entity\Unit;
use  App\Entity\Localite;

class ImportController extends AbstractController
{
    /**
     * @Route("/import", name="import")
     */
    public function index(): Response
    {

              // requete pour récperer tout les WERKS en BDD (pour le compteur)
              $compteurWERKS = $this->getDoctrine()
             ->getRepository(WERKS::class)
             ->findAll(); 

             // requete pour récperer tout les BTRTL en BDD (pour le compteur)
              $compteurBTRTL = $this->getDoctrine()
             ->getRepository(BTRTL::class)
             ->findAll();

               // requete pour récperer tout les PATGS en BDD (pour le compteur)
              $compteurPATGS = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->findAll(); 


               // requete pour récperer tout les Localite en BDD (pour le compteur)
              $compteurLocalite = $this->getDoctrine()
             ->getRepository(Localite::class)
             ->findAll(); 


              // requete pour récperer tout les Academique en BDD (pour le compteur)
              $compteurAcademique = $this->getDoctrine()
             ->getRepository(Academique::class)
             ->findAll(); 


              // requete pour récperer tout les AgentCpi en BDD (pour le compteur)
              $compteurAgentCpi = $this->getDoctrine()
             ->getRepository(AgentCpi::class)
             ->findAll(); 

                  // requete pour récperer tout les AgentFonction en BDD (pour le compteur)
              $compteurAgentFonction = $this->getDoctrine()
             ->getRepository(AgentFonction::class)
             ->findAll(); 

                    // requete pour récperer tout les AgentService en BDD (pour le compteur)
              $compteurAgentService = $this->getDoctrine()
             ->getRepository(AgentService::class)
             ->findAll(); 

                     // requete pour récperer tout les BaseAgentAdresse en BDD (pour le compteur)
              $compteurBaseAgentAdresse = $this->getDoctrine()
             ->getRepository(BaseAgentAdresse::class)
             ->findAll(); 


                        // requete pour récperer tout les Categories en BDD (pour le compteur)
              $compteurCategories = $this->getDoctrine()
             ->getRepository(Categories::class)
             ->findAll(); 

                           // requete pour récperer tout les GradeRepresentation en BDD (pour le compteur)
              $compteurGradeRepresentation = $this->getDoctrine()
             ->getRepository(GradeRepresentation::class)
             ->findAll(); 

                            // requete pour récperer tout les Mandats en BDD (pour le compteur)
              $compteurMandats = $this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAll(); 


                                   // requete pour récperer tout les TypesMandats en BDD (pour le compteur)
              $compteurTypesMandats = $this->getDoctrine()
             ->getRepository(TypesMandats::class)
             ->findAll(); 

                                       // requete pour récperer tout les Unit en BDD (pour le compteur)
              $compteurUnit = $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findAll(); 


              $AllUnitAsc= $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findAllAsc(); 


                 $AllBTRTLAsc= $this->getDoctrine()
             ->getRepository(BTRTL::class)
             ->findAllAsc(); 



                   $AllCategoriesAsc= $this->getDoctrine()
             ->getRepository(Categories::class)
             ->findAllAsc(); 


                      $AllTypesMandatAsc= $this->getDoctrine()
             ->getRepository(TypesMandats::class)
             ->findAllAsc(); 

            




              

        $x=0;
        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
            'x' => $x,
            'compteurWERKS' => $compteurWERKS,
           'compteurBTRTL' => $compteurBTRTL, 
           'compteurPATGS' => $compteurPATGS,
           'compteurLocalite' => $compteurLocalite,

            'compteurAcademique' => $compteurAcademique,
            'compteurAgentCpi' => $compteurAgentCpi,
            'compteurAgentFonction' => $compteurAgentFonction,
            'compteurAgentService' => $compteurAgentService,
            'compteurBaseAgentAdresse' => $compteurBaseAgentAdresse,
            'compteurCategories' => $compteurCategories,
            'compteurMandats' => $compteurMandats,
            'compteurTypesMandats' => $compteurTypesMandats,
            'compteurUnit' => $compteurUnit,
             'compteurGradeRepresentation' => $compteurGradeRepresentation,
             'AllUnitAsc' => $AllUnitAsc,
              'AllBTRTLAsc' => $AllBTRTLAsc,
               'AllCategoriesAsc' => $AllCategoriesAsc,
                'AllTypesMandatAsc' => $AllTypesMandatAsc
             

        ]);      
    }

}
