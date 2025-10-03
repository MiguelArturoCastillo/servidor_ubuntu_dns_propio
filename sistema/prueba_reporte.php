<?php 
include("class/clase_reporte.php");
//llamo o realizo la peticion previa conexion a la base de datos.
$mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
$cadena="select idalumno,apellido,nombre,fecha_nacimiento,telefonopadre,escuela,nombre_curso,nombre_materia  from alumnos order by idalumno";
$registros=$mysql->query($cadena) or die($mysql->error);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(79,78,79);
$pdf->SetFont('Arial','',8);
$pdf->cell(10,10,'id',0,0,'C',1);
$pdf->cell(25,10,'Apellido',0,0,'C',1);
$pdf->cell(25,10,'Nombre',0,0,'C',1);
$pdf->cell(25,10,'fecha nacimiento',0,0,'C',1);
$pdf->cell(25,10,'Telefonopadre',0,0,'C',1);
$pdf->cell(30,10,'Escuela',0,0,'C',1);
$pdf->cell(25,10,'Nombre curso',0,0,'C',1);
$pdf->cell(25,10,'Nombre materia',0,1,'C',1);

//realizo la tabla que se va a imprimir
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(8,8,8);
$pdf->SetFillColor(79,78,277);
while($row = $registros->fetch_assoc()){
    $pdf->cell(10,10,$row['idalumno'],'B',0,'C',0);
    $pdf->cell(25,10,$row['apellido'],'B',0,'L',0);
    $pdf->cell(25,10,$row['nombre'],'B',0,'L',0);
    $pdf->cell(25,10,$row['fecha_nacimiento'],'B',0,'C',0);
    $pdf->cell(25,10,$row['telefonopadre'],'B',0,'C',0);
    $pdf->cell(30,10,$row['escuela'],'B',0,'C',0);
    $pdf->cell(25,10,$row['nombre_curso'],'B',0,'C',0);
    $pdf->cell(25,10,$row['nombre_materia'],'B',1,'C',0);
}
$pdf->Output();
?>

