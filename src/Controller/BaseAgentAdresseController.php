<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\BaseAgentAdresse;

class BaseAgentAdresseController extends AbstractController
{
    /**
     * @Route("/base/agent/adresse", name="base_agent_adresse")
     */
  public function index(): Response
    {
 if (isset($_POST["Base_Agent_Adresse"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 

   $testDoublon = $this->getDoctrine()
             ->getRepository(BaseAgentAdresse::class)
             ->findBy(["PERSONID_EXT" => $colonne[3]]); 

        if($testDoublon)   {}
        else {
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $baseAgentAdresse = new BaseAgentAdresse();
    	     $baseAgentAdresse->setPERSONIDEXT($colonne[3]);
    	     $baseAgentAdresse->setFkUnit($colonne[29]);
    	     $baseAgentAdresse->setFkAgentService($colonne[37]);
    	     $baseAgentAdresse->setFkAgentCpi($colonne[40]);
    	     $baseAgentAdresse->setZRSZRR($colonne[4]);
    	     $baseAgentAdresse->setPrenom($colonne[5]);
    	     $baseAgentAdresse->setPrenomPref($colonne[6]);
    	     $baseAgentAdresse->setNom($colonne[7]);
    	     $baseAgentAdresse->setNomPref($colonne[8]);
    	     $baseAgentAdresse->setDoc($colonne[9]);

    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($baseAgentAdresse);

   			 //on exécute la requête insert
    		 $entityManager->flush();
                }   }	}
          // requete pour récperer tout les BaseAgentAdresse en BDD (pour le compteur)
              $compteurBaseAgentAdresse = $this->getDoctrine()
             ->getRepository(BaseAgentAdresse::class)
             ->findAll(); 

   				 }
 		 }

         return $this->redirectToRoute('import');
     }
}
