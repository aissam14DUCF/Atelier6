<?php session_start();

require('fpdf/fpdf.php');
class PDF extends FPDF{
    function Header()
    {
        $this->Image('R.jpg',0,0,210,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(80);
        $this->Cell(30,100,'Bintal',0,0,'C');
        $this->Ln(20);
        $this->SetXY(10,50);
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,50,'Semlalia'.$this->PageNo().' ',0,0,'C');

    }
}
function Recupire(){
     require('Connexion.php');
     $re="SELECT * FROM ETUDIANT WHERE id=?";
     $stat=$con->prepare($re);
     $stat->
}
echo $_GET['id'];
$pdf=new PDF();
$pdf->AddPage();
$pdf->Cell(0,50,$name,0,1);
$pdf->SetXY(10,90);
$pdf->Cell(35,10,'',0,0);
$pdf->Cell(55,20,'Module',1,0);
$pdf->Cell(55,20,'Note',1,0);
$pdf->Cell(35,20,'',0,1);

    $pdf->Cell(35,10,'',0,0);
    $pdf->Cell(55,10,'Math',1,0);
    $pdf->Cell(55,10,$math,1,0);
    $pdf->Cell(35,10,'',0,1);

    $pdf->Cell(35,10,'',0,0);
    $pdf->Cell(55,10,'informatique',1,0);
    $pdf->Cell(55,10,$info,1,0);
    $pdf->Cell(35,10,'',0,1);

    $pdf->Cell(35,10,'',0,0);
    $pdf->Cell(55,10,'Moyenne',1,0);
    $pdf->Cell(55,10,(float)($math+$info)/2,1,0);
    $pdf->Cell(35,10,'',0,1);

    $pdf->Cell(35,10,'',0,0);
    $pdf->Cell(55,10,'Mention',1,0);
    $pdf->Cell(55,10,$mention,1,0);
    $pdf->Cell(35,10,'',0,1);


$pdf->Output();

?>