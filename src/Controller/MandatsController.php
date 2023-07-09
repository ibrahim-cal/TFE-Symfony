<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Mandats;

class MandatsController extends AbstractController
{
    /**
     * @Route("/mandats", name="mandats")
     */
  public function index(): Response
    {
 if (isset($_POST["Mandats"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");


    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE)
    					 {ini_set('max_execution_time', 5); 
   //on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs




if($colonne[36] !==0){
$relation = str_pad($colonne[36], 3, "0", STR_PAD_LEFT);
}else{}



if($colonne[14] !==0){
$begda = new \DateTime($colonne[14]);
}else{}

if($colonne[15] ==0){

$endda =  NULL;
}else{
     $endda = new \DateTime($colonne[15]);
}

if($colonne[16] ==0){
$termn = NULL;
}else{
  $termn = new \DateTime($colonne[16]);
}

if($colonne[17] ==0){
$pabegda = NULL;
}else{

  $pabegda = new \DateTime($colonne[17]);
}

if($colonne[18] ==0){
$pactedt = NULL;
}else{
  $pactedt = new \DateTime($colonne[18]);
}

if($colonne[19] ==0){
$aedtm = NULL;
}else{
  $aedtm = new \DateTime($colonne[43]);
}


$ido =$colonne[32];
if($colonne[32] == NULL){
$ido= 0;
}else{}

if($colonne[33] ==NULL){    
$colonne[33] = 0;
 }else{}

 if($colonne[34] ==NULL){    
$colonne[34] = 0;
 }else{}

 if($colonne[35] ==NULL){    
$colonne[35] = 0;
 }else{}



    	  $entityManager = $this->getDoctrine()->getManager();

    	     $mandats = new Mandats();
           $mandats->setFkWERKS($colonne[0]);
    	     $mandats->setPERNR($colonne[2]);

    	     $mandats->setFkPERSONIDEXT($colonne[3]);
    	     $mandats->setFkBTRTL($colonne[1]);
    	     $mandats->setFkPERSG($colonne[10]);
    	     $mandats->setFkPERSK($colonne[12]);
    	     $mandats->setFkANSVH($colonne[19]);
    	     $mandats->setFkZZREPGRADE($colonne[23]);
    	     $mandats->setFkZZACADECRAN($colonne[25]);
    	     $mandats->setBEGDA($begda); 
    	     $mandats->setENDDA($endda);
    	     $mandats->setTERMN($termn);
    	     $mandats->setPA0016BEGDA($pabegda);
    	     $mandats->setPA0016CTEDT($pactedt);
    	     $mandats->setZZCHARGEHADM($colonne[27]);
    	     $mandats->setZZCHARGEHOCC($colonne[28]);
    	     $mandats->setIDS($colonne[31]);
    	     $mandats->setIDO($ido);
    	     $mandats->setETPADMINPOSTE($colonne[33]);
    	     $mandats->setETPOCCPOSTE($colonne[34] );
    	     $mandats->setAFFECTETPSERV($colonne[35]);
    	     $mandats->setRelation($relation );    	     
    	     $mandats->setAEDTM($aedtm);

    	     // dire à Doctrine qu'on veut éventuellement sauvegarder l'objet
   			 $entityManager->persist($mandats);

   			 //on exécute la requête insert
    		 $entityManager->flush();

                }
    		 				
     		 			}
   				 }  // requete pour récperer tout les Mandats en BDD (pour le compteur)
                    $compteurMandats = $this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAll(); 
 		 }
 	
return $this->redirectToRoute('import');

     }
}
