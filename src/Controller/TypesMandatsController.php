<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use  App\Entity\TypesMandats;

class TypesMandatsController extends AbstractController
{
    /**
     * @Route("/types/mandats", name="types_mandats")
     */
public function index(): Response
    {

  if (isset($_POST["Types_mandats"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 
    					 	

    		      if ($colonne[19]  == "" AND $colonne[20] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{

            $testDoublon = $this->getDoctrine()
             ->getRepository(TypesMandats::class)
             ->findBy(["ANSVH" => $colonne[19]]); 

        if($testDoublon)
        {}
        else
                     {
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $typesMandats = new TypesMandats();
    	     $typesMandats->setANSVH($colonne[19]);
    	     $typesMandats->setAnsvhLib($colonne[20]);
    	     
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($typesMandats);

   			 //on exécute la requête insert
    		 $entityManager->flush();
                    }



                                   // requete pour récperer tout les TypesMandats en BDD (pour le compteur)
           

}

    		 				}
                   $compteurTypesMandats = $this->getDoctrine()
             ->getRepository(TypesMandats::class)
             ->findAll(); 
     		 			}
   				 }
 		 }
 	
return $this->redirectToRoute('import');

/*

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
            'compteurTypesMandats' => $compteurTypesMandats
        ]);
        */
     }
}