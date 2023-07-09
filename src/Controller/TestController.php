<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Test;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
    		// ******* ENREGISTREMENT NOUVELLE LIGNE
    	     $entityManager = $this->getDoctrine()->getManager();

    	     $test = new Test();
    	     $test->setA('nom de A');
    	     $test->setB('7');

    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($test);

   			 //on exécute la requête insert
    		 $entityManager->flush();

    		 //return new Response('Nouvel objet de test ok'.$test->getId());


    		 //******** SELECT ... ET AFFICHAGE 
    		 $testResultat = $this->getDoctrine()
    		 ->getRepository(Test::class)
    		 ->find(1); 

    		// return new Response('premiere ligne : '.$testResultat->getA());

    		 // renvoie vers template avec variable 
        return $this->render('test/index.html.twig', [
            'var' =>  $testResultat ]);
    }
}
