<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\AgentFonction;

class AgentFonctionController extends AbstractController
{
    /**
     * @Route("/agent/fonction", name="agent_fonction")
     */
    public function index(): Response
    {
 if (isset($_POST["agent_fonction"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 

    		      if ($colonne[21]  == "" AND $colonne[22] == "" )
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{


           $testDoublon = $this->getDoctrine()
             ->getRepository(AgentFonction::class)
             ->findBy(["ZZGRADE" => $colonne[21]]); 

        if($testDoublon)
        {}
        else
                     {
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $agentFonction = new AgentFonction();
    	     $agentFonction->setZZGRADE($colonne[21]);
    	     $agentFonction->setZZGRADETXT($colonne[22]);
    	
    	     
    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($agentFonction);

   			 //on exécute la requête insert
    		 $entityManager->flush();
                }

                }
    		 				}

                    // requete pour récperer tout les AgentFonction en BDD (pour le compteur)
              $compteurAgentFonction = $this->getDoctrine()
             ->getRepository(AgentFonction::class)
             ->findAll(); 
     		 			}
   				 }
 		 }
    
 	

return $this->redirectToRoute('import');

/*

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
             'compteurAgentFonction' => $compteurAgentFonction
        ]);
        */
     }
}

