<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\AgentCpi;

class AgentCpiController extends AbstractController
{
    /**
     * @Route("/agent/cpi", name="agent_cpi")
     */
    public function index(): Response
    {

  if (isset($_POST["Agent_Cpi"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 

    		      if ($colonne[40]  == "" AND $colonne[41] == ""  AND $colonne[42] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{

            $testDoublon = $this->getDoctrine()
             ->getRepository(AgentCpi::class)
             ->findBy(["CPI_SERV" => $colonne[40]]); 

        if($testDoublon)
        {}
        else
                     {
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $agentCpi = new AgentCpi();
    	     $agentCpi->setCPISERV($colonne[40]);
    	     $agentCpi->setCPISERVLIBEL($colonne[41]);
    	     $agentCpi->setCPISERVCAMPUS($colonne[42]);
    	     
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($agentCpi);

   			 //on exécute la requête insert
    		 $entityManager->flush();
            }
    
}
    		 				}
                           $compteurAgentCpi = $this->getDoctrine()
             ->getRepository(AgentCpi::class)
             ->findAll(); 
     		 			}
   				 }
 		 }
 	
       // requete pour récperer tout les AgentCpi en BDD (pour le compteur)
           

return $this->redirectToRoute('import');

     }
}

