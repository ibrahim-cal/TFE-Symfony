<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\PATGS;

class PATGSController extends AbstractController
{
    /**
     * @Route("/p/a/t/g/s", name="p_a_t_g_s")
     */
public function index(): Response
    {

 if (isset($_POST["PATGS"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 
    					

    		      if ($colonne[12]  == "" AND $colonne[13] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{

                  $testDoublon = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->findBy(["PERSK" => $colonne[12]]); 

        if($testDoublon)
        {}
        else
                     {
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $patgs = new PATGS();
    	     $patgs->setPERSK($colonne[12]);
    	     $patgs->setPERSKLIB($colonne[13]);
    	     
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($patgs);

   			 //on exécute la requête insert
    		 $entityManager->flush();
                    }


                     // requete pour récperer tout les PATGS en BDD (pour le compteur)
          
                    }
    		 				}
                    $compteurPATGS = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->findAll(); 
     		 			}
   				 }
 		 }
 	
return $this->redirectToRoute('import');

     }
}
