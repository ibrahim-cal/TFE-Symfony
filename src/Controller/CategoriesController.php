<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use  App\Entity\Categories;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
  public function index(): Response
    {
if (isset($_POST["categorie"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 
    					 
    			
    		     if ($colonne[10]  == "" AND $colonne[11] == "")
							{} // condition if pour éviter d'insérer une ligne vide
				  else
							{

              $testDoublon = $this->getDoctrine()
             ->getRepository(Categories::class)
             ->findBy(["PERSG" => $colonne[10]]); 

        if($testDoublon)
        {}
        else
                     {
                      
    	  $entityManager = $this->getDoctrine()->getManager();

    	     $categories = new Categories();
    	     $categories->setPERSG($colonne[10]);
    	     $categories->setPERSGLIB($colonne[11]);
    	     $categories->setSorti($colonne[44]);

    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($categories);

   			 //on exécute la requête insert
    		 $entityManager->flush();
        }


        
}
    		 				}
                          // requete pour récperer tout les Categories en BDD (pour le compteur)
              $compteurCategories = $this->getDoctrine()
             ->getRepository(Categories::class)
             ->findAll(); 
     		 			}
   				 }
 		 }
 	
     return $this->redirectToRoute('import');

/*

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
             'compteurCategories' => $compteurCategories
        ]);
        */
     }
}
