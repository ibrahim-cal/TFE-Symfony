<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\AgentService;

class AgentServiceController extends AbstractController
{
    /**
     * @Route("/agent/service", name="agent_service")
     */
   public function index(): Response
    {
 if (isset($_POST["Agent_Service"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 

    		     if ($colonne[37]  == "" AND $colonne[38] == ""  AND $colonne[39] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{

   $testDoublon = $this->getDoctrine()
             ->getRepository(AgentService::class)
             ->findBy(["SHORT_SERV" => $colonne[37]]); 

        if($testDoublon)
        {}
        else
                     {
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $agentService = new agentService();
    	     $agentService->setSHORTSERV($colonne[37]);
    	     $agentService->setLONGSERV($colonne[38]);
    	     $agentService->setLIBELSERV($colonne[39]);
    	
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($agentService);

   			 //on exécute la requête insert
    		 $entityManager->flush();
                }


   

                }
    		 				}
                                 // requete pour récperer tout les AgentService en BDD (pour le compteur)
              $compteurAgentService = $this->getDoctrine()
             ->getRepository(AgentService::class)
             ->findAll(); 
     		 			}
   				 }
 		 }
 	
return $this->redirectToRoute('import');

/*

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
            'compteurAgentService' => $compteurAgentService
        ]);
        */
     }
}