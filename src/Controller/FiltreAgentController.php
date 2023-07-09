<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\BaseAgentAdresse;
use App\Entity\Unit;

use Dompdf\Dompdf;
use Dompdf\Options;

class FiltreAgentController extends AbstractController
{
    /**
     * @Route("/filtre/agent", name="filtre_agent")
     */
    public function index(): Response
    {
    	if (isset($_POST["listeUnit"])) {

	$uniteSelectionnee = $_POST['listeUnit'];


    		 // ****  requête pour récupérer les infos 
			//d'un chercheur sur base de l'unité selectionnée
    		  $selectChercheur =$this->getDoctrine()
    		 ->getRepository(BaseAgentAdresse::class)
    		 ->findAllByUnit($uniteSelectionnee); 
             
}
    		
        return $this->render('filtre_agent/index.html.twig', [
            'chercheurByUnit' => $selectChercheur,
            'uniteSel' => $uniteSelectionnee
        ]);
    }




        /**
     * @Route("/chercheur", name="chercheur")
     */
    public function Chercheur_Unite(): Response
    {

             $AllUnitAsc= $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findAllAsc(); 
 


        return $this->render('import/chercheur.html.twig', [
            'AllUnitAsc' => $AllUnitAsc
        ]);
    }




     /**
     * @Route("/pdfChercheurUnite", name="pdfChercheurUnite")
     */
    public function pdf()
    {
         $uniteSelectionnee = $_POST['listeUnit'];
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        

    $uniteSelectionnee = $_POST['listeUnit'];


             // ****  requête pour récupérer les infos 
            //d'un chercheur sur base de l'unité selectionnée
              $selectChercheur =$this->getDoctrine()
             ->getRepository(BaseAgentAdresse::class)
             ->findAllByUnit($uniteSelectionnee); 




        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('filtre_agent/index.html.twig', [
                 'chercheurByUnit' => $selectChercheur,
            'uniteSel' => $uniteSelectionnee
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }

    







}
