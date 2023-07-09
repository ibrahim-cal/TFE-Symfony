<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\BTRTL;

class BTRTLController extends AbstractController
{
    /**
     * @Route("/b/t/r/t/l", name="b_t_r_t_l")
     */
   public function index(): Response
    {
if (isset($_POST["BTRTL"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {
    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 

    		     if ($colonne[1]  == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{


                   $testDoublon = $this->getDoctrine()
             ->getRepository(BTRTL::class)
             ->findBy(["BTRTL" => $colonne[1]]); 


             $testDoublon2 = $this->getDoctrine()
             ->getRepository(BTRTL::class)
             ->findBy(["FkWERKS" => $colonne[0]]); 



        if($testDoublon AND $testDoublon2)
        {}
        else
                     {

    	  $entityManager = $this->getDoctrine()->getManager();

    	     $BTRTL = new BTRTL();
    	     $BTRTL->setBTRTL($colonne[1]);
    	     $BTRTL->setFkWERKS($colonne[0]);
    	
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($BTRTL);

   			 //on exécute la requête insert
    		 $entityManager->flush();
          }
        }

    		 				}
                  // requete pour récperer tout les BTRTL en BDD (pour le compteur)
              $compteurBTRTL = $this->getDoctrine()
             ->getRepository(BTRTL::class)
             ->findAll();
     		 			}
   				 }
 		 }


    
 	
return $this->redirectToRoute('import');
      /*  return $this->render('/import', [
            'controller_name' => 'ImportController',
            'compteurBTRTL' => $compteurBTRTL
        ]);
        */
     }
}
