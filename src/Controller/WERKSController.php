<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\WERKS;

class WERKSController extends AbstractController
{
    /**
     * @Route("/w/e/r/k/s", name="w_e_r_k_s")
     */
 public function index(): Response
    {

 if (isset($_POST["WERKS"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 

    		      if ($colonne[0]  == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{

                  $testDoublon = $this->getDoctrine()
             ->getRepository(WERKS::class)
             ->findBy(["WERKS" => $colonne[0]]); 

        if($testDoublon)
        {}
        else
                     {

    	  $entityManager = $this->getDoctrine()->getManager();

    	     $werks = new Werks();
    	     $werks->setWERKS($colonne[0]);
    	     
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($werks);

   			 //on exécute la requête insert
    		 $entityManager->flush();

                    }


              // requete pour récperer tout les WERKS en BDD (pour le compteur)
          
                }
    		 				}
     		 			}
                  $compteurWERKS = $this->getDoctrine()
             ->getRepository(WERKS::class)
             ->findAll(); 
   				 }
 		 }
 	
    return $this->redirectToRoute('import');

/*

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
             'compteurWERKS' => $compteurWERKS
        ]);
        */
     }
}
