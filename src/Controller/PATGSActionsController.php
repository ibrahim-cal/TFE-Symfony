<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\PATGS;

class PATGSActionsController extends AbstractController
{

     /**
     * @Route("/patgsListe", name="patgsListe")
     */
    public function index(): Response
    {
    	     // requete pour récperer tout les PATGS
              $allPATGS = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->findAllAsc(); 


        return $this->render('patgs_actions/patgs_liste.html.twig', [
             'allPATGS' =>  $allPATGS
        ]);
    }


     /**
     * @Route("/patgsSupprimer", name="patgsSupprimer")
     */
    public function delete(): Response
    {

if ( isset($_POST["PERSK"])) {

	$persk = ($_POST['PERSK']);

    	  // requete pour supprimer la ligne avec PERSK reçu
              $deletePATGS = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->deletePATGS($persk); 


                // requete pour récperer tout les PATGS
              $allPATGS = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->findAllAsc(); 


   return $this->redirectToRoute('patgsListe');
      }
    }


     /**
     * @Route("/patgsInsert", name="patgsInsert")
     */
    public function insert(): Response
    {

if ( isset($_POST["PERSK"])) {

    $PERSK = ($_POST['PERSK']);
     $PERSKLIB = ($_POST['PERSKLIB']);

         
             $entityManager = $this->getDoctrine()
            ->getManager();

             $newPATGS = new PATGS();
             $newPATGS->setPERSK($PERSK);
             $newPATGS->setPERSKLIB($PERSKLIB);

             // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
             $entityManager->persist($newPATGS);
             //on exécute la requête insert
             $entityManager->flush();


                // requete pour récperer tout les PATGS
              $allPATGS = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->findAllAsc(); 


   return $this->redirectToRoute('patgsListe');
      }
    }




}
