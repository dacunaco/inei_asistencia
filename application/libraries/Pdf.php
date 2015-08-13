<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
//            $this->pdf= new FPDF('P', 'mm', array(200, 200));
            $this->pdf= new FPDF();
        }
        // El encabezado del PDF
        public function Header(){
            
//            $this->SetFont('Times','BU',16);
//            $this->Cell(30);
//            $this->Cell(120,10,'SOL PERUANO EXPRES S.A.C',0,0,'C');
//            $this->Ln(8);
       }
       // El pie del pdf
//       public function Footer(){
//           $this->SetY(-15);
//           $this->SetFont('Times','I',14);
//           $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
//      }
    }
?>