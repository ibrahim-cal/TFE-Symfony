<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use  App\Entity\Unit;

class UnitController extends AbstractController
{
    /**
     * @Route("/unit", name="unit")
     */
public function index(): Response
    {

    	if (isset($_POST["Unit"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 
    					 	
    					 

    		      if ($colonne[29]  == "" AND $colonne[30] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{


             $testDoublon = $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findBy(["IDUNIT" => $colonne[29]]); 

        if($testDoublon)
        {}
        else
                     {

    	  $entityManager = $this->getDoctrine()->getManager();

    	     $unit = new Unit();
    	     $unit->setIDUNIT($colonne[29]);
    	     $unit->setIDUNITTXT($colonne[30]);
    	     
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($unit);

   			 //on exécute la requête insert
    		 $entityManager->flush();
                        }

                                          // requete pour récperer tout les Unit en BDD (pour le compteur)
           
                        
    		 				}
     		 			}
                           $compteurUnit = $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findAll(); 
   				 }
                }
 		 }

         return $this->redirectToRoute('import');

/*
 	
        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
            'compteurUnit' => $compteurUnit
        ]);
        */
     }
}