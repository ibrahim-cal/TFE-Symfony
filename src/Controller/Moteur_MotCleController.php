<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\TypesMandats;
use App\Entity\BTRTL;
use App\Entity\WERKS;
use App\Entity\Unit;
use  App\Entity\PATGS;
use  App\Entity\GradeRepresentation;
use  App\Entity\Categories;
use  App\Entity\AgentService;
use  App\Entity\AgentFonction;
use  App\Entity\AgentCpi;


use Dompdf\Dompdf;
use Dompdf\Options;


class Moteur_MotCleController extends AbstractController
{
    /**
     * @Route("/moteur", name="moteur")
     */
       public function index(): Response
    		{
    	if (isset($_POST["moteur"])) {

	$motCle = ($_POST["moteur"]);


            // ****  requête pour récupérer les infos 
            //des UNIT sur base du motCle entré 
              $listeTypeMandat =$this->getDoctrine()
             ->getRepository(TypesMandats::class)
            -> findLike($motCle);


    		     // ****  requête pour récupérer les infos 
		       	//des WERKS sur base du motCle entré 
    		  $listeWERKS =$this->getDoctrine()
    		 ->getRepository(WERKS::class)
    		-> findLike($motCle);

               // ****  requête pour récupérer les infos 
            //des UNIT sur base du motCle entré 
              $listeUnit =$this->getDoctrine()
             ->getRepository(Unit::class)
            -> findLike($motCle);


            // ****  requête pour récupérer les infos 
            //des PATGSsur base du motCle entré 
              $listePATGS =$this->getDoctrine()
             ->getRepository(PATGS::class)
            -> findLike($motCle);


         // ****  requête pour récupérer les infos 
            //des grade representation sur base du motCle entré 
              $listeGradeRepresentation =$this->getDoctrine()
             ->getRepository(GradeRepresentation::class)
            -> findLike($motCle);


         // ****  requête pour récupérer les infos 
            //des Categories sur base du motCle entré 
              $listeCategories =$this->getDoctrine()
             ->getRepository(Categories::class)
            -> findLike($motCle);

                                 // ****  requête pour récupérer les infos 
            //des BTRTL sur base du motCle entré 
              $listeBTRTL =$this->getDoctrine()
             ->getRepository(BTRTL::class)
            -> findLike($motCle);


             // ****  requête pour récupérer les infos 
            //des Agent service sur base du motCle entré 
           $listeAgentService =$this->getDoctrine()
           ->getRepository(AgentService::class)
         -> findLike($motCle);

                  // ****  requête pour récupérer les infos 
            //des AgentFonction sur base du motCle entré 
              $listeAgentFonction =$this->getDoctrine()
          ->getRepository(AgentFonction::class)
           -> findLike($motCle);

                     // ****  requête pour récupérer les infos 
            //des Agent CPI sur base du motCle entré 
              $listeAgentCpi =$this->getDoctrine()
          ->getRepository(AgentCpi::class)
           -> findLike($motCle);
		}
    		
        return $this->render('moteur/index.html.twig', [
            'WERKS' => $listeWERKS,
            'TypeMandat' =>  $listeTypeMandat,
            'Unit' =>  $listeUnit,
             'patgs' =>  $listePATGS,
             'GradeRepresentation' =>  $listeGradeRepresentation,
             'Categories' =>  $listeCategories,
             'btrtl' =>  $listeBTRTL,
     'agentService' =>  $listeAgentService,
          'agentFonction' =>  $listeAgentFonction,
          'agentCpi' =>  $listeAgentCpi,
           'motCle' =>  $motCle
        ]);

    }




   /**
     * @Route("/pdfMoteurMotCle", name="pdfMoteurMotCle")
     */
    public function pdf()
    {
        
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        

  $motCle = ($_POST["moteur"]);


            // ****  requête pour récupérer les infos 
            //des UNIT sur base du motCle entré 
              $listeTypeMandat =$this->getDoctrine()
             ->getRepository(TypesMandats::class)
            -> findLike($motCle);


             // ****  requête pour récupérer les infos 
            //des WERKS sur base du motCle entré 
          $listeWERKS =$this->getDoctrine()
         ->getRepository(WERKS::class)
        -> findLike($motCle);

               // ****  requête pour récupérer les infos 
            //des UNIT sur base du motCle entré 
              $listeUnit =$this->getDoctrine()
             ->getRepository(Unit::class)
            -> findLike($motCle);


            // ****  requête pour récupérer les infos 
            //des PATGSsur base du motCle entré 
              $listePATGS =$this->getDoctrine()
             ->getRepository(PATGS::class)
            -> findLike($motCle);


         // ****  requête pour récupérer les infos 
            //des grade representation sur base du motCle entré 
              $listeGradeRepresentation =$this->getDoctrine()
             ->getRepository(GradeRepresentation::class)
            -> findLike($motCle);


         // ****  requête pour récupérer les infos 
            //des Categories sur base du motCle entré 
              $listeCategories =$this->getDoctrine()
             ->getRepository(Categories::class)
            -> findLike($motCle);

                                 // ****  requête pour récupérer les infos 
            //des BTRTL sur base du motCle entré 
              $listeBTRTL =$this->getDoctrine()
             ->getRepository(BTRTL::class)
            -> findLike($motCle);


             // ****  requête pour récupérer les infos 
            //des Agent service sur base du motCle entré 
           $listeAgentService =$this->getDoctrine()
           ->getRepository(AgentService::class)
         -> findLike($motCle);

                  // ****  requête pour récupérer les infos 
            //des AgentFonction sur base du motCle entré 
              $listeAgentFonction =$this->getDoctrine()
          ->getRepository(AgentFonction::class)
           -> findLike($motCle);

                     // ****  requête pour récupérer les infos 
            //des Agent CPI sur base du motCle entré 
              $listeAgentCpi =$this->getDoctrine()
          ->getRepository(AgentCpi::class)
           -> findLike($motCle);
    


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('moteur/index.html.twig', [
              'WERKS' => $listeWERKS,
            'TypeMandat' =>  $listeTypeMandat,
            'Unit' =>  $listeUnit,
             'patgs' =>  $listePATGS,
             'GradeRepresentation' =>  $listeGradeRepresentation,
             'Categories' =>  $listeCategories,
             'btrtl' =>  $listeBTRTL,
     'agentService' =>  $listeAgentService,
          'agentFonction' =>  $listeAgentFonction,
          'agentCpi' =>  $listeAgentCpi,
           'motCle' =>  $motCle
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("ResultatsMotCle.pdf", [
            "Attachment" => true
        ]);
    }










}
