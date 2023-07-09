<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Academique;

class AcademiqueController extends AbstractController
{
    /**
     * @Route("/academique", name="academique")
     */
 public function index(): Response
    {

 if (isset($_POST["academique"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 

    		      if ($colonne[25]  == "" AND $colonne[26] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{


          $testDoublon = $this->getDoctrine()
             ->getRepository(Academique::class)
             ->findBy(["ZZACAD_ECRAN" => $colonne[25]]); 

        if($testDoublon)
        {}
        else
                     {

    	  $entityManager = $this->getDoctrine()->getManager();

    	     $academique = new Academique();
    	     $academique->setZZACADECRAN($colonne[25]);
    	     $academique->setZZACADTXTAUTO($colonne[26]);
    	     
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($academique);

   			 //on exécute la requête insert
    		 $entityManager->flush();
            }


  
            }
    		 				}
                            // requete pour récperer tout les Academique en BDD (pour le compteur)
              $compteurAcademique = $this->getDoctrine()
             ->getRepository(Academique::class)
             ->findAll(); 
     		 			}
   				 }
 		 }
 	

return $this->redirectToRoute('import');

/*
        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
             'compteurAcademique' => $compteurAcademique
        ]);
        */
     }
}
