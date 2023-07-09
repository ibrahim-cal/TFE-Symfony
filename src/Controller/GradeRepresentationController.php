<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use  App\Entity\GradeRepresentation;

class GradeRepresentationController extends AbstractController
{
    /**
     * @Route("/grade/representation", name="grade_representation")
     */
  public function index(): Response
    {
 if (isset($_POST["grade_representation"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 
    				
    			
    		     if ($colonne[24]  == "" AND $colonne[23] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{



                $testDoublon = $this->getDoctrine()
             ->getRepository(GradeRepresentation::class)
             ->findBy(["ZZREPGRADE" => $colonne[23]]); 

        if($testDoublon)
        {}
        else
                     {
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $gradeRepresentation = new GradeRepresentation();
    	     $gradeRepresentation->setZZREPGRADE($colonne[23]);
    	     $gradeRepresentation->setZZREPGRADETXT($colonne[24]);
    

    	
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($gradeRepresentation);

   			 //on exécute la requête insert
    		 $entityManager->flush();
          }


        
            }
          
    		 				}
                            // requete pour récperer tout les GradeRepresentation en BDD (pour le compteur)
              $compteurGradeRepresentation = $this->getDoctrine()
             ->getRepository(GradeRepresentation::class)
             ->findAll();
     		 			}
   				 }
 		 }

return $this->redirectToRoute('import');

/*

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
            'compteurGradeRepresentation' => $compteurGradeRepresentation
        ]);
        */
     }
}