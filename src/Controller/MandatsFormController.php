<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use  App\Entity\WERKS;
use  App\Entity\BTRTL;

use  App\Entity\Categories;

use  App\Entity\TypesMandats;


class MandatsFormController extends AbstractController
{
    /**
     * @Route("/mandats/form", name="mandats_form")
     */
    public function index(): Response
    {


    	       $AllBTRTLAsc= $this->getDoctrine()
             ->getRepository(BTRTL::class)
             ->findAllAsc(); 



                   $findAllAsc= $this->getDoctrine()
             ->getRepository(Categories::class)
             ->findAllAsc(); 


                      $AllTypesMandatAsc= $this->getDoctrine()
             ->getRepository(TypesMandats::class)
             ->findAllAsc(); 




        return $this->render('import/mandatsform.html.twig', [
            'controller_name' => 'MandatsFormController',
               'AllBTRTLAsc' => $AllBTRTLAsc,
               'AllCategoriesAsc' => $findAllAsc,
                'AllTypesMandatAsc' => $AllTypesMandatAsc
        ]);
    }
}
