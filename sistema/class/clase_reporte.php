<?php
require ("pdf/fpdf.php");
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    //$this->SetFillcolor(253,135,39);
    $this->SetFillcolor(158, 146, 140);
    $this->Rect(0,0,320,20,'F');
    //$this->SetFillcolor(192,192,192);
    //$this->Rect(0,0,40,25,'F');
    $this->SetFont('Arial','B',20);
    $this->Image('soyprofesor1.jpeg',5,3,15);
    $this->SetTextColor(255,255,255);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(35,4,utf8_decode('SOYPROFESOR'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->SetTextColor(0,0,0);
    $this->Cell(45,4,utf8_decode('REPORTE PLANILLA DE NOTAS'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    $this->SetFillcolor(253,135,39);
    $this->Rect(0,260,220,30,'F');
    //$this->SetY(-10);
    //$this->SetFont('Arial','B',10);
    //$this->SetTextColor(255,255,255);
    //$this->Cell(80);
    //$this->Cell(35,10,utf8_decode('Creado por desarrollador Miguel Castillo'),0,0,'C');
    // Posición: a 1,5 cm del final
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->SetY(-20);
    // Número de página
    $this->Cell(0,10,utf8_decode('Desarrollo de software y programación por Miguel Castillo.'),0,0,'L');
    $this->SetY(-20);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


?>