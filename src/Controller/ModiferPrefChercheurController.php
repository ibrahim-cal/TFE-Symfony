<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\BaseAgentAdresse;
use App\Entity\Unit;

class ModiferPrefChercheurController extends AbstractController
{
    /**
     * @Route("/recherche/nom/chercheur", name="recherche_nom_chercheur")
     */
    public function nomFamille(): Response
    {
        if (isset($_POST["recherche"])) {
            $Nom = ($_POST["recherche"]);

             // ****  requête pour récupérer les infos 
            //des chercheurs sur base du nom entré
            $listeChercheurNom =$this->getDoctrine()
            ->getRepository(BaseAgentAdresse::class)
            -> findLike($Nom);
        }
        return $this->render('recherche_nom_chercheur/index.html.twig', [
           'listeChercheurNom' =>  $listeChercheurNom,
           'Nom' =>  $Nom
       ]);
    }
    /**
     * @Route("/modifer/pref/chercheur", name="modifer_pref_chercheur")
     */
    public function index(): Response
    {
        if ( isset($_POST["idChercheur"])) {

           $ID = ($_POST['idChercheur']);

    	             // ****  requête pour récupérer les infos 
            //du chercheur selectionne
           $chercheurSelectionne =$this->getDoctrine()
           ->getRepository(BaseAgentAdresse::class)
           -> findOneBy(["PERSONID_EXT" => $ID]); 

           return $this->render('modifer_pref_chercheur/index.html.twig', [
               'chercheurSelectionne' => $chercheurSelectionne,
               'ID' => $ID
           ]);
       }

       else if ( 		
           isset($_POST["nom"])  
           AND  isset($_POST["prenom"]))
       { 

           $Nom = ($_POST['nom']);
           $Prenom = ($_POST['prenom']);
           $Matricule = ($_POST['matricule']);

    	             // ****  requête pour modifier nom Pref
           $ModifNom =$this->getDoctrine()
           ->getRepository(BaseAgentAdresse::class)
           -> UpdateNomPref($Nom, $Matricule); 

                      // ****  requête pour modifier prénom Pref
           $ModifPrenom =$this->getDoctrine()
           ->getRepository(BaseAgentAdresse::class)
           -> UpdatePrenomPref($Prenom, $Matricule); 
       }
       return $this->redirectToRoute('chercheur');
       
   }
}
