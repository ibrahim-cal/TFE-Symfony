<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\BaseAgentAdresse;
use App\Entity\Mandats;
use App\Entity\BTRTL;
use App\Entity\WERKS;
use App\Entity\Zchercheur;
use App\Entity\Zucompos;
use App\Entity\Zpresponsable;



class Rech_MatriculeController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")
     */
    public function index(): Response
    {
    	if (isset($_POST["recherche"])) {

	$matricule = ($_POST["recherche"]);


    		 // ****  requête pour récupérer les infos 
			//d'un chercheur sur base du matricule entré 
    		  $selectChercheur =$this->getDoctrine()
    		 ->getRepository(BaseAgentAdresse::class)
    		 ->findOneBy(["PERSONID_EXT" => $matricule]); 


    		 // **** requête pour récupérer les mandats de la personne
    		   $selectMandats =$this->getDoctrine()
    		 ->getRepository(Mandats::class)
    		 ->findBy(["Fk_PERSONID_EXT" => $matricule]); 




                 // ****  requête pour récupérer les infos 
            //d'un chercheur sur base du matricule entré 
              $TestChercheurMatch =$this->getDoctrine()
             ->getRepository(Zchercheur::class)
             ->findOneBy(["Matricule" => $matricule]); 


             if($TestChercheurMatch){
            // recuperer l'identifiant du chercheur, issu de l'inventaire
             // sur base du matricule
                $selectID=$this->getDoctrine()
             ->getRepository(Zchercheur::class)
             ->findOneBy(["Matricule" => $matricule])
             ->getIdche(); 


         
             // recuperer les unités dans lesquels le chercheur travaille
              $selectUcompos =$this->getDoctrine()
             ->getRepository(Zucompos::class)
               ->findBy(
                ["Refche" => $selectID],
                 ["Refunite" => 'ASC']

           );


               // recuperer les projets dans lesquels le chercheur travaille
                  $selectProjResp =$this->getDoctrine()
             ->getRepository(Zpresponsable::class)
               ->findBy(["RepResp" => $selectID]);
          }
          else
          {

            $selectID = 0;
            $selectUcompos = 0;
            $selectProjResp = 0;

          }


    		 
    		 // ***** Si aucun matricule ne correspond (si c'est un mauvais matricule)
    		 // on renvoie vers la page d'accueil
			$x=1;
    		 if(!$selectChercheur)
    		 {
    		 	return $this->redirectToRoute('import',
                 ['chercheur' => $selectChercheur,
                 'x' => $x]);
             }
             else{}
}
    		
        return $this->render('recherche/index.html.twig', [
             'chercheur' => $selectChercheur,
             'mandat' => $selectMandats,
             'selectID' => $selectID,
             'selectUcompos' => $selectUcompos,
             'selectProjResp' => $selectProjResp
        ]);


    }
}
