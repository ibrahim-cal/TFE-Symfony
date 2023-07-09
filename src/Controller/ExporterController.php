<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use  App\Entity\WERKS;
use  App\Entity\BTRTL;
use  App\Entity\PATGS;
use App\Entity\Academique;
use  App\Entity\AgentCpi;
use  App\Entity\AgentFonction;
use  App\Entity\AgentService;
use App\Entity\BaseAgentAdresse;
use  App\Entity\Categories;
use  App\Entity\GradeRepresentation;
use App\Entity\Mandats;
use  App\Entity\TypesMandats;
use  App\Entity\Unit;
use  App\Entity\Localite;
use App\Entity\ZFac;
use App\Entity\Fonction;
use App\Entity\ZService;


// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

class ExporterController extends AbstractController
{
    
    
    

        private function getDataZService(): array
    {
        /**
         * @var $ZService ZService[]
         */
        $list = [];

            // requete pour récperer tout les ZService en BDD 
              $ListeZService = $this->getDoctrine()
             ->getRepository(ZService::class)
             ->findAllAsc(); 

        foreach ($ListeZService as $ZService) {
            $list[] = [
                $ZService->getSHORTSERV(),
                $ZService->getLONGSERV(),
                $ZService->getLIBELSERV()
        
            ];
        }
        return $list;
    }


         /**
     * @Route("/excelZService", name="excelZService")
     */
    public function excelZService()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("ZFac");
        
        $sheet->setCellValue('A1', 'SHORT_SERV');
        $sheet->setCellValue('B1', 'LONG_SERV');
        $sheet->setCellValue('C1', 'LIBEL_SERV');
 


         // Increase row cursor after header write
         $sheet->fromArray($this->getDataZService(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'ZService.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }













        private function getDataFonctionCV(): array
    {
        /**
         * @var $fonction Fonction[]
         */
        $list = [];

            // requete pour récperer tout les Fonction en BDD 
              $ListeFonction = $this->getDoctrine()
             ->getRepository(Fonction::class)
             ->findAllAsc(); 

        foreach ($ListeFonction as $Fonction) {
            $list[] = [
                $Fonction->getIdFonction(),
                    $Fonction->getLibelleDuFonction(),
                $Fonction->getActif(),
        
            ];
        }
        return $list;
    }


         /**
     * @Route("/excelFonctionCV", name="excelFonctionCV")
     */
    public function excelFonctionCV()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("ZFac");
        
        $sheet->setCellValue('A1', 'idFonction');
        $sheet->setCellValue('B1', 'libelle_du_fonction');
        $sheet->setCellValue('C1', 'actif');
 


         // Increase row cursor after header write
         $sheet->fromArray($this->getDataFonctionCV(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'fonction_CV_chercheurs.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }









     private function getDataZFac(): array
    {
        /**
         * @var $Zfac Zfac[]
         */
        $list = [];

            // requete pour récperer tout les Zfac en BDD 
              $ListeZfac = $this->getDoctrine()
             ->getRepository(Zfac::class)
             ->findAllIdAsc(); 

        foreach ($ListeZfac as $Zfac) {
            $list[] = [
                $Zfac->getFac(),
                    $Zfac->getFaculte(),
                $Zfac->getFaculteUK(),
                    $Zfac->getSigle(),
                $Zfac->getDMaj(),
                    $Zfac->getCC(),
                $Zfac->getInfofin(),
                    $Zfac->getIdFac(),
                $Zfac->getActif(),
                    $Zfac->getGroupe()
            ];
        }
        return $list;
    }


         /**
     * @Route("/excelZFac", name="excelZFac")
     */
    public function ExcelZFac()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("ZFac");
        
        $sheet->setCellValue('A1', 'Fac');
        $sheet->setCellValue('B1', 'Faculte');
        $sheet->setCellValue('C1', 'FaculteUK');
        $sheet->setCellValue('D1', 'Sigle');
        $sheet->setCellValue('E1', 'DMaj');
        $sheet->setCellValue('F1', 'CC');
        $sheet->setCellValue('G1', 'Infofin');
        $sheet->setCellValue('H1', 'IdFac');
        $sheet->setCellValue('I1', 'Actif');
        $sheet->setCellValue('J1', 'Groupe');
        $sheet->setCellValue('K1', 'Invent20');


         // Increase row cursor after header write
         $sheet->fromArray($this->getDataZFac(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'ZFac.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }









    /**
     * @Route("/exporter", name="exporter")
     */
    public function index(): Response
    {

        return $this->render('exporter/index.html.twig', [
        ]);
    }


     /**
     * @Route("/pdfDD", name="pdfDD")
     */
    public function pdfDD()
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        $pdfOptions->set('enable_html5_parser', true);
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('exporter/dictionnaireDonnees.html.twig', [
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("Dictionnaire_donnees.pdf", [
            "Attachment" => true
        ]);
    }










       private function getData(): array
    {
        /**
         * @var $Acad Academique[]
         */
        $list = [];

    	    // requete pour récperer tout les Academique en BDD 
              $ListeAcademique = $this->getDoctrine()
             ->getRepository(Academique::class)
             ->findAll(); 

        foreach ($ListeAcademique as $Acad) {
            $list[] = [
                $Acad->getZZACADECRAN(),
                $Acad->getZZACADTXTAUTO()
            ];
        }
        return $list;
    }



     /**
     * @Route("/excelAcad", name="excelAcad")
     */
    public function ExcelAcad()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("Académique");
        
        $sheet->setCellValue('A1', 'ZZACAD_ECRAN');
        $sheet->setCellValue('B1', 'ZZACAD_ECRANTXT');

         // Increase row cursor after header write
         $sheet->fromArray($this->getData(),null, 'A2', true);

        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Academique.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }








// **********************   EXPORT    AGENT    CPI ******************** //
           private function getDataCpi(): array
    {
        /**
         * @var $agentCpi AgentCpi[]
         */
        $listCpi = [];
    
    	    // requete pour récperer tout les AgentCpi en BDD 
              $ListeAgentCpi = $this->getDoctrine()
             ->getRepository(AgentCpi::class)
             ->findAllAsc(); 
        

        foreach ($ListeAgentCpi as $agentCpi) {
            $listCpi[] = [
                $agentCpi->getCPISERV(),
                $agentCpi->getCPISERVLIBEL(),
                $agentCpi->getCPISERVCAMPUS()
            ];
        }
        return $listCpi;
    }

     /**
     * @Route("/excelCpi", name="excelCpi")
     */
    public function ExcelCpi()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("Agent_Cpi");
        
        $sheet->setCellValue('A1', 'CPI_SERV');
        $sheet->setCellValue('B1', 'CPI_SERV_LIBEL');
          $sheet->setCellValue('C1', 'CPI_SERV_CAMPUS');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataCpi(),null, 'A2', true);
       
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Agent_CPi.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }












    // **********************   EXPORT    AGENT   FONCTION ******************** //
           private function getDataFonction(): array
    {
        /**
         * @var $agentFonction AgentFonction[]
         */
        $listFonction = [];
    
    	    // requete pour récperer tout les AgentFonction en BDD 
              $ListeAgentFonction = $this->getDoctrine()
             ->getRepository(AgentFonction::class)
             ->findAllAsc(); 

        foreach ($ListeAgentFonction as $agentFonction) {
            $listFonction[] = [
                $agentFonction->getZZGRADE(),
                $agentFonction->getZZGRADETXT()
            ];
        }
        return $listFonction;
    }





     /**
     * @Route("/excelFonction", name="excelFonction")
     */
    public function ExcelFonction()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("Agent_Fonction");
        
        $sheet->setCellValue('A1', 'ZZGRADE');
        $sheet->setCellValue('B1', 'ZZGRADE_TXT');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataFonction(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Agent_Fonction.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }













    // **********************   EXPORT    AGENT   SERVICE ******************** //
           private function getDataService(): array
    {
        /**
         * @var $agentService AgentService[]
         */
        $listService = [];
    
    	    // requete pour récperer tout les AgentService en BDD 
              $ListeAgentService = $this->getDoctrine()
             ->getRepository(AgentService::class)
             ->findAllAsc(); 

        foreach ($ListeAgentService as $agentService) {
            $listService[] = [
                $agentService->getSHORTSERV(),
                $agentService->getLONGSERV(),
                $agentService->getLIBELSERV()
            ];
        }
        return $listService;
    }


     /**
     * @Route("/excelService", name="excelService")
     */
    public function ExcelService()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("Agent_Service");
        
        $sheet->setCellValue('A1', 'SHORT_SERV');
        $sheet->setCellValue('B1', 'LONG_SERV');
         $sheet->setCellValue('C1', 'LIBEL_SERV');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataService(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Agent_Service.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }









    // **********************   EXPORT    BTRTL ******************** //
           private function getDataBTRTL(): array
    {
        /**
         * @var $btrtl BTRTL[]
         */
        $ListeB = [];
    
            // requete pour récperer tout les BTRTL en BDD 
              $ListeBTRTL = $this->getDoctrine()
             ->getRepository(BTRTL::class)
             ->findAllAsc(); 

        foreach ($ListeBTRTL as $btrtl) {
            $ListeB[] = [
                $btrtl->getBTRTL(),
                $btrtl->getFkWERKS(),
                $btrtl->getNomSousDomaine()
            ];
        }
        return $ListeB;
    }


     /**
     * @Route("/excelBTRTL", name="excelBTRTL")
     */
    public function ExcelBTRTL()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("BTRTL");
        
        $sheet->setCellValue('A1', 'BTRTL');
        $sheet->setCellValue('B1', 'Fk_WERKS');
         $sheet->setCellValue('C1', 'Nom_SousDomaine');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataBTRTL(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'BTRTL.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }






    // **********************   EXPORT   Categories ******************** //
           private function getDataCategories(): array
    {
        /**
         * @var $cat Categories[]
         */
        $ListeCat = [];
    
            // requete pour récperer tout les Categories en BDD 
              $ListeCategories = $this->getDoctrine()
             ->getRepository(Categories::class)
             ->findAllAsc(); 

        foreach ($ListeCategories as $cat) {
            $ListeCat[] = [
                $cat->getPERSG(),
                $cat->getPERSGLIB(),
                $cat->getSorti()
            ];
        }
        return $ListeCat;
    }


     /**
     * @Route("/excelCategories", name="excelCategories")
     */
    public function ExcelCategories()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("Categories");
        
        $sheet->setCellValue('A1', 'PERSG');
        $sheet->setCellValue('B1', 'PERSGLIB');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataCategories(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Categories.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }






    // **********************   EXPORT   GradeRepresentation ******************** //
           private function getDataGradeRepresentation(): array
    {
        /**
         * @var $g GradeRepresentation[]
         */
        $ListeGrade = [];
    
            // requete pour récperer tout les GradeRepresentation en BDD 
              $ListeGradeRepresentation = $this->getDoctrine()
             ->getRepository(GradeRepresentation::class)
             ->findAllAsc(); 

        foreach ($ListeGradeRepresentation as $Grade) {
            $ListeGrade[] = [
                $Grade->getZZREPGRADE(),
                $Grade->getZZREPGRADETXT()
            ];
        }
        return $ListeGrade;
    }


     /**
     * @Route("/excelGradeRepresentation", name="excelGradeRepresentation")
     */
    public function ExcelGradeRepresentation()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("GradeRepresentation");
        
        $sheet->setCellValue('A1', 'ZZREPGRADE');
        $sheet->setCellValue('B1', 'ZZREPGRADE_TXT');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataGradeRepresentation(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'GradeRepresentation.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }






    // **********************   EXPORT   PATGS ******************** //
           private function getDataPATGS(): array
    {
        /**
         * @var $p ListePATGS[]
         */
        $ListePATGS = [];
    
            // requete pour récperer tout les PATGS en BDD 
              $ListePATGS = $this->getDoctrine()
             ->getRepository(PATGS::class)
             ->findAllAsc(); 

        foreach ($ListePATGS as $Patgs) {
            $ListeP[] = [
                $Patgs->getPERSK(),
                $Patgs->getPERSKLIB()
            ];
        }
        return $ListeP;
    }

     /**
     * @Route("/excelPATGS", name="excelPATGS")
     */
    public function ExcelPATGS()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("PATGS");
        
        $sheet->setCellValue('A1', 'PERSK');
        $sheet->setCellValue('B1', 'PERSKLIB');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataPATGS(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'PATGS.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }








    // **********************   EXPORT   TypesMandats ******************** //
           private function getDataTypesMandats(): array
    {
        /**
         * @var $L ListeTypesMandats[]
         */
        $ListeTypesMandats = [];
    
            // requete pour récperer tout les TypesMandats en BDD 
              $ListeTypesMandats = $this->getDoctrine()
             ->getRepository(TypesMandats::class)
             ->findAllAsc(); 

        foreach ($ListeTypesMandats as $TypesMandats) {
            $ListeTypes[] = [
                $TypesMandats->getANSVH(),
                $TypesMandats->getAnsvhLib()
            ];
        }
        return $ListeTypes;
    }

     /**
     * @Route("/excelTypesMandats", name="excelTypesMandats")
     */
    public function ExcelTypesMandats()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("TypesMandats");
        
        $sheet->setCellValue('A1', 'ANSVH');
        $sheet->setCellValue('B1', 'ansvh_lib');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataTypesMandats(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'TypesMandats.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }








    // **********************   EXPORT   WERKS ******************** //
           private function getDataWERKS(): array
    {
        /**
         * @var $L ListeWERKS[]
         */
        $ListeWERKS = [];
    
            // requete pour récperer tout les WERKS en BDD 
              $ListeWERKS = $this->getDoctrine()
             ->getRepository(WERKS::class)
             ->findAllAsc(); 

        foreach ($ListeWERKS as $WERKS) {
            $ListeW[] = [
                $WERKS->getWERKS(),
                $WERKS->getNomDomaine()
            ];
        }
        return $ListeW;
    }

     /**
     * @Route("/excelWERKS", name="excelWERKS")
     */
    public function ExcelWERKS()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("WERKS");
        
        $sheet->setCellValue('A1', 'WERKS');
        $sheet->setCellValue('B1', 'Nom_Domaine');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataWERKS(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'WERKS.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }









    // **********************   EXPORT   Unit ******************** //
           private function getDataUnit(): array
    {
        /**
         * @var $L ListeUnit[]
         */
        $ListeUnit = [];
    
            // requete pour récperer tout les Unit en BDD 
              $ListeUnit = $this->getDoctrine()
             ->getRepository(Unit::class)
             ->findAllIdAsc(); 

        foreach ($ListeUnit as $Unit) {
            $ListeU[] = [
                $Unit->getIDUNIT(),
                $Unit->getIDUNITTXT()
            ];
        }
        return $ListeU;
    }


     /**
     * @Route("/excelUnit", name="excelUnit")
     */
    public function ExcelUnit()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("Unit");
        
        $sheet->setCellValue('A1', 'IDUNIT');
        $sheet->setCellValue('B1', 'IDUNIT_TXT');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataUnit(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Unit.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }







    // **********************   EXPORT   BaseAgentAdresse ******************** //
           private function getDataBaseAgentAdresse(): array
    {
        /**
         * @var $L ListeBaseAgentAdresse[]
         */
        $ListeBaseAgentAdresse = [];
    
            // requete pour récperer tout les BaseAgentAdresse en BDD 
              $ListeBaseAgentAdresse = $this->getDoctrine()
             ->getRepository(BaseAgentAdresse::class)
             ->findAllAsc(); 

        foreach ($ListeBaseAgentAdresse as $BaseAgentAdresse) {
            $ListeBase[] = [
                $BaseAgentAdresse->getPERSONIDEXT(),
                $BaseAgentAdresse->getFkAgentFonction(),
                $BaseAgentAdresse->getFkUnit(),
                $BaseAgentAdresse->getFkAgentService(),
                $BaseAgentAdresse->getFkAgentCpi(),
                $BaseAgentAdresse->getZRSZRR(),
                $BaseAgentAdresse->getPrenom(),
                $BaseAgentAdresse->getPrenomPref(),
                $BaseAgentAdresse->getNom(),
                $BaseAgentAdresse->getNomPref(),
                $BaseAgentAdresse->getDoc()
            ];
        }
        return $ListeBase;
    }


     /**
     * @Route("/excelBaseAgentAdresse", name="excelBaseAgentAdresse")
     */
    public function ExcelBaseAgentAdresse()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("BaseAgentAdresse");
        
        $sheet->setCellValue('A1', 'PERSONID_EXT');
        $sheet->setCellValue('B1', 'Fk_Agent_Fonction');
        $sheet->setCellValue('C1', 'Fk_Unit');
        $sheet->setCellValue('D1', 'Fk_Agent_Service');
        $sheet->setCellValue('E1', 'Fk_Agent_Cpi');
        $sheet->setCellValue('F1', 'ZRSZRR');
        $sheet->setCellValue('G1', 'Prenom');
        $sheet->setCellValue('H1', 'Prenom_pref');
        $sheet->setCellValue('I1', 'Nom');
        $sheet->setCellValue('J1', 'Nom_pref');
        $sheet->setCellValue('K1', 'Doc');

         // Increase row cursor after header write
         $sheet->fromArray($this->getDataBaseAgentAdresse(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'BaseAgentAdresse.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }













    // **********************   EXPORT   Mandats ******************** //
           private function getDataMandats(): array
    {
        /**
         * @var $L ListeMandats[]
         */
        $ListeMandats = [];
    
            // requete pour récperer tout les Mandats en BDD 
              $ListeMandats = $this->getDoctrine()
             ->getRepository(Mandats::class)
             ->findAllAsc(); 

        foreach ($ListeMandats as $Mandats) {
            $ListeM[] = [
                $Mandats->getPERNR(),
                $Mandats->getFkPERSONIDEXT(),
                $Mandats->getFkWERKS(),
                $Mandats->getFkBTRTL(),
                $Mandats->getFkPERSG(),
                $Mandats->getFkPERSK(),
                $Mandats->getFkANSVH(),
                $Mandats->getFkZZREPGRADE(),
                $Mandats->getFkZZACADECRAN(),
                $Mandats->getBEGDA(),
                $Mandats->getENDDA(),
                $Mandats->getTERMN(),
                $Mandats->getPA0016BEGDA(),
                $Mandats->getPA0016CTEDT(),
                $Mandats->getZZCHARGEHADM(),
                $Mandats->getZZCHARGEHOCC(),
                $Mandats->getIDS(),
                $Mandats->getIDO(),
                $Mandats->getETPADMINPOSTE(),
                $Mandats->getETPOCCPOSTE(),
                $Mandats->getAFFECTETPSERV(),
                $Mandats->getRelation(),
                $Mandats->getAEDTM()
            ];
        }
        return $ListeM;
    }

     /**
     * @Route("/excelMandats", name="excelMandats")
     */
    public function ExcelMandats()
    {
        $spreadsheet = new Spreadsheet();
        
        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();

         $sheet->setTitle("Mandats");
        
        $sheet->setCellValue('A1', 'Id_Mandat');
        $sheet->setCellValue('B1', 'PERNR');
        $sheet->setCellValue('C1', 'Fk_PERSONID_EXT');
        $sheet->setCellValue('D1', 'Fk_WERKS');
        $sheet->setCellValue('E1', 'Fk_BTRTL');
        $sheet->setCellValue('F1', 'Fk_PERSG');
        $sheet->setCellValue('G1', 'Fk_PERSK');
        $sheet->setCellValue('H1', 'Fk_ANSVH');
        $sheet->setCellValue('I1', 'Fk_ZZREPGRADE');
        $sheet->setCellValue('J1', 'Fk_ZZACAD_ECRAN');
        $sheet->setCellValue('K1', 'BEGDA');

        $sheet->setCellValue('L1', 'ENDDA');
        $sheet->setCellValue('M1', 'TERMN');
        $sheet->setCellValue('N1', 'PA0016_BEGDA');

        $sheet->setCellValue('O1', 'PA0016_CTEDT');
        $sheet->setCellValue('P1', 'ZZCHARGE_H_ADM');
        $sheet->setCellValue('Q1', 'ZZCHARGE_H_OCC');

        $sheet->setCellValue('R1', 'ID_S');
        $sheet->setCellValue('S1', 'ID_O');
        $sheet->setCellValue('T1', 'ETP_ADMIN_POSTE');
           
         $sheet->setCellValue('U1', 'ETP_OCC_POSTE');
         $sheet->setCellValue('V1', 'AFFECT_ETP_SERV');
         $sheet->setCellValue('W1', 'relation');
         $sheet->setCellValue('X1', 'AEDTM');


         // Increase row cursor after header write
         $sheet->fromArray($this->getDataMandats(),null, 'A2', true);
         
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);
        
        // Create a Temporary file in the system
        $fileName = 'Mandats.csv';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        
        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);
        
        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName);
    }


}
