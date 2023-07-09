<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\Localite;

class LocaliteController extends AbstractController
{
    /**
     * @Route("/localite", name="localite")
     */

      public function index(): Response
    {
 if (isset($_POST["localite"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {
    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					                        {

ini_set('max_execution_time', 5); 

    			
    					

    		     if ($colonne[0]  == "" AND $colonne[1] == ""  AND $colonne[2] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
						                                                          	{
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $localite = new localite();
    	     $localite->setCodePostal($colonne[0]);
    	     $localite->setLocalite($colonne[1]);
    	     $localite->setSousCommune($colonne[2]);
    	     $localite->setCommunePrincipale($colonne[3]);
    	     $localite->setProvince($colonne[4]);
    	
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($localite);

   			 //on exécute la requête insert
    		 $entityManager->flush();
    		 				                                                     }



                // requete pour récperer tout les Localite en BDD (pour le compteur)
              $compteurLocalite = $this->getDoctrine()
             ->getRepository(Localite::class)
             ->findAll(); 
                }

                                                 }
     		 		}
   				 
        	   }
        

return $this->redirectToRoute('import');

/*

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
            'compteurLocalite' => $compteurLocalite
        ]);
        */
     }
}