<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Mandats;

class FiltreMandatController extends AbstractController
{
    /**
     * @Route("/filtre/mandat", name="filtre_mandat")
     */
    public function index(): Response
    {

// ***********************        BTRTL   ET   CATEGORIE  et TYPE **********
if (   !empty($_POST["listeBTRTL"])
    AND     !empty($_POST["listeCategories"])
      AND     empty($_POST["listeTypesMandat"])

){ 

 //   if (    (isset($_POST["listeBTRTL"]))   AND   
   //            (isset($_POST["listeCategories"]))   
   // ) {
    $TEST = $_POST['listeBTRTL'];
     $Cat = $_POST['listeCategories'];

             // ****  requête pour récupérer les infos 
            //d'un Mandatsur base du BTRTL ET TYPE
              $findAllByBtrtl_Categorie =$this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAllByBtrtl_Categorie($TEST,$Cat); 

        return $this->render('filtre_mandat/filtre_btrtl_categorie.html.twig', [
            'MandatByBtrtl_Categorie' => $findAllByBtrtl_Categorie,
            'BTRTLSelectionne' => $TEST,
            'CatSelectionne' => $Cat
        ]);
    }









        // ***********************       BTRTL    ET   TYPE     **********


else if (   !empty($_POST["listeBTRTL"])
        AND     !empty($_POST["listeTypesMandat"])
         AND     empty($_POST["listeCategories"])
){ 
    //(    (isset($_POST["listeBTRTL"]))   AND   
   //         (isset($_POST["listeTypesMandat"]))   
   // ) {
    $TEST = $_POST['listeBTRTL'];
     $TypeM = $_POST['listeTypesMandat'];

             // ****  requête pour récupérer les infos 
            //d'un Mandatsur base du BTRTL et type mandat
              $findAllByBtrtl_Type =$this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAllByBtrtl_Type($TEST,$TypeM); 
         
        return $this->render('filtre_mandat/filtre_btrtl_type.html.twig', [
            'MandatByByBtrtl_Type' => $findAllByBtrtl_Type,
            'BTRTLSelectionne' => $TEST,
            'TypeSelectionne' => $TypeM
        ]);
    }





  // ***********************        TYPES      ET     CATEGORIE      **********

else if (  !empty($_POST["listeCategories"])
        AND      !empty($_POST["listeTypesMandat"])
         AND     empty($_POST["listeBTRTL"])
){ 
  // (    (isset($_POST["listeCategories"]))   AND   
    //           (isset($_POST["listeTypesMandat"]))   
    //) {
        $Cat = $_POST['listeCategories'];
        $TypeM = $_POST['listeTypesMandat'];
     

             // ****  requête pour récupérer les infos 
            //d'un Mandatsur base du TYPE ET CATEGORIE
              $findAllByType_Categorie =$this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAllByType_Categorie($Cat,$TypeM);   

        return $this->render('filtre_mandat/filtre_type_categorie.html.twig', [
            'MandatByByType_Categorie' => $findAllByType_Categorie,
             'CatSelectionne' => $Cat,
            'TypeSelectionne' => $TypeM
            
                 ]);
    }
      



else if (   !empty($_POST["listeBTRTL"])
    AND      !empty($_POST["listeCategories"])
        AND      !empty($_POST["listeTypesMandat"])
){ 
   // 	else if (    (isset($_POST["listeBTRTL"]))   AND   
     //          (isset($_POST["listeCategories"]))  AND
       //     (isset($_POST["listeTypesMandat"]))   
    //) {

	$TEST = $_POST['listeBTRTL'];
     $Cat = $_POST['listeCategories'];
     $TypeM = $_POST['listeTypesMandat'];

    		 // ****  requête pour récupérer les infos 
			//d'un Mandatsur base du BTRTL selectionné
    		  $selectMandatBtrtl_Type_Categorie =$this->getDoctrine()
    		 ->getRepository(Mandats::class)
    		 ->findAllByBtrtl_Type_Categorie($TEST, $Cat, $TypeM); 

        return $this->render('filtre_mandat/filtre_trois_ensemble.html.twig', [
            'MandatByBtrtl_Type_Categorie' => $selectMandatBtrtl_Type_Categorie,
            'BTRTLSelectionne' => $TEST,   
            'CatSelectionne' => $Cat,
            'TypeSelectionne' => $TypeM
    ]);
    }




    




else if (   !empty($_POST["listeCategories"])
    AND     empty($_POST["listeBTRTL"])
    AND     empty($_POST["listeTypesMandat"])

){ 
     // else  if (isset($_POST["listeCategories"])   ) {

   $Cat = $_POST['listeCategories'];

                 // ****  requête pour récupérer les infos 
            //d'un Mandatsur base de la categorie selectionné
              $selectMandatCategorie =$this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAllByCategories($Cat); 

    return $this->render('filtre_mandat/filtre_categories.html.twig', [
            'MandatByCategories' => $selectMandatCategorie,
            'CatSelectionne' => $Cat,
        ]);
    }



else if (   !empty($_POST["listeTypesMandat"])
        AND     empty($_POST["listeBTRTL"])
    AND     empty($_POST["listeCategories"])
){ 

   // else    if (isset($_POST["listeTypesMandat"])) {

   $TypeM = $_POST['listeTypesMandat'];



                 // ****  requête pour récupérer les infos 
            //d'un Mandatsur base de la categorie selectionné
              $selectMandatTypesMandat =$this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAllByType($TypeM); 

          return $this->render('filtre_mandat/filtre_typesMandat.html.twig', [
            'MandatByType' => $selectMandatTypesMandat,
            'TypeSelectionne' => $TypeM,
        ]);
    }



else if (   !empty($_POST["listeBTRTL"])
            AND     empty($_POST["listeTypesMandat"])
    AND     empty($_POST["listeCategories"])

){ 

   // else    if (isset($_POST["listeTypesMandat"])) {

   $Btrtl = $_POST['listeBTRTL'];



                 // ****  requête pour récupérer les infos 
            //d'un Mandatsur base de la categorie selectionné
              $selectMandatBtrtl =$this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAllByBTRTL($Btrtl); 

          return $this->render('filtre_mandat/filtre_btrtl.html.twig', [
            'MandatByBTRTL' => $selectMandatBtrtl,
            'BTRTLSelectionne' => $Btrtl
        ]);
    }




else{}




}    		

}

