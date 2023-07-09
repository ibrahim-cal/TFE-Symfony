<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CovidController extends AbstractController
{
    /**
     * @Route("/covid", name="covid")
     */
    public function index(): Response
    {
    
        return $this->render('import/covid.html.twig', [
        ]);
    }


}
