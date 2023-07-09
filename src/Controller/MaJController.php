<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Unit;
use App\Entity\ZFac;
use App\Entity\AgentService;
use App\Entity\ZService;
use App\Entity\AgentFonction;
use App\Entity\Fonction;

class MaJController extends AbstractController
{
    /**
     * @Route("/MaJ", name="MaJ")
     */
    public function index(): Response
    {
        return $this->render('maj_inv/index.html.twig', [
        ]);
    }



        /**
     * @Route("/MaJ_Unit_Zfac_Liste", name="MaJ_Unit_Zfac_Liste")
     */
    public function MaJ_Unit_Zfac_Liste(): Response
    {
    	     $AllUnitAsc= $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findAllIdAsc(); 


                $AllZFacAsc= $this->getDoctrine()
             ->getRepository(ZFac::class)
             ->findAllIdAsc(); 

        

        return $this->render('maj_inv/MaJ_Unit_Zfac_Liste.html.twig', [
        	 'AllUnitAsc' => $AllUnitAsc,
        	 'AllZFacAsc' => $AllZFacAsc
        ]);
    }





       /**
     * @Route("/MaJ_AgentService_ZService", name="MaJ_AgentService_ZService")
     */
    public function MaJ_AgentService_ZService(): Response
    {
    	     $AllAgentService= $this->getDoctrine()
             ->getRepository(AgentService::class)
             ->findAllAsc(); 


                $AllZServicecAsc= $this->getDoctrine()
             ->getRepository(ZService::class)
             ->findAllAsc(); 


        return $this->render('maj_inv/MaJ_AgentService_ZService.html.twig', [
        	 'AllAgentService' => $AllAgentService,
        'AllZServicecAsc' => $AllZServicecAsc
        ]);
    }





       /**
     * @Route("/MaJ_AgentFonction_FonctionCV", name="MaJ_AgentFonction_FonctionCV")
     */
    public function MaJ_AgentFonction_FonctionCV(): Response
    {
    	     $AllAgentFonction= $this->getDoctrine()
             ->getRepository(AgentFonction::class)
             ->findAllAsc(); 


                $AllFonctioncAsc= $this->getDoctrine()
             ->getRepository(Fonction::class)
             ->findAllAsc(); 


        return $this->render('maj_inv/MaJ_AgentFonction_FonctionCV.html.twig', [
        	 'AllAgentFonction' => $AllAgentFonction,
        'AllFonctioncAsc' => $AllFonctioncAsc
        ]);
    }








 
    

    /**
     * @Route("/MaJ_AgentService_ZService_REQUETE", name="MaJ_AgentService_ZService_REQUETE")
     */
    public function UpdateZService()
    {

               $UpdateZService= 
      $this->getDoctrine()
             ->getRepository(ZService::class)
             ->UpdateZService(); 


        
	     $AllAgentService= $this->getDoctrine()
             ->getRepository(AgentService::class)
             ->findAllAsc(); 


                $AllZServicecAsc= $this->getDoctrine()
             ->getRepository(ZService::class)
             ->findAllAsc(); 



        return $this->render('maj_inv/MaJ_AgentService_ZService.html.twig', [
        	 'AllAgentService' => $AllAgentService,
        'AllZServicecAsc' => $AllZServicecAsc
        ]);
    }    



    /**
     * @Route("/MaJ_Unit_Zfac_Liste_REQUETE", name="MaJ_Unit_Zfac_Liste_REQUETE")
     */
    public function UpdateZFac()
    {
           $UpdateZFac= 
        	   $this->getDoctrine()
             ->getRepository(ZFac::class)
             ->UpdateZFac(); 



	    		 $AllUnitAsc= $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findAllIdAsc();  

                $AllZFacAsc= $this->getDoctrine()
             ->getRepository(ZFac::class)
             ->findAllIdAsc(); 


        return $this->render('maj_inv/MaJ_Unit_Zfac_Liste.html.twig', [
     	 'AllUnitAsc' => $AllUnitAsc,
        	 'AllZFacAsc' => $AllZFacAsc
        ]);
    }   



       /**
     * @Route("/MaJ_AgentFonction_FonctionCV_REQUETE", name="MaJ_AgentFonction_FonctionCV_REQUETE")
     */
    public function UpdateFonction(): Response
    {


    	   $UpdateFonction= 
        	   $this->getDoctrine()
             ->getRepository(Fonction::class)
             ->UpdateFonction(); 

    	     $AllAgentFonction= $this->getDoctrine()
             ->getRepository(AgentFonction::class)
             ->findAllAsc(); 


                $AllFonctioncAsc= $this->getDoctrine()
             ->getRepository(Fonction::class)
             ->findAllAsc(); 


        return $this->render('maj_inv/MaJ_AgentFonction_FonctionCV.html.twig', [
        	 'AllAgentFonction' => $AllAgentFonction,
        'AllFonctioncAsc' => $AllFonctioncAsc
        ]);
    }






}