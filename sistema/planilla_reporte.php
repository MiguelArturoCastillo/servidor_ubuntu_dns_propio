<?php
$nom_cu=$_REQUEST['txt_nom'];
$es=$_REQUEST['txt_esc'];  
include("class/clase_reporte.php");        
//llamo o realizo la peticion previa conexion a la base de datos.
$mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
$cadena="SELECT a.idalumno, a.nombre, a.apellido, a.nombre_curso, a.nombre_materia, c.nota1_1, c.nota1_2, c.nota1_3, c.promedio_pri_cuatri_1, c.recuperacion_1, c.promedio_pri_cuatri_2, c.nota2_1, c.nota2_2, c.nota2_3, c.promedio_seg_cuatri_1, c.recuperacion_2, c.promedio_seg_cuatri_2  FROM alumnos a INNER JOIN calificaciones c ON a.idalumno=c.idalumno WHERE nombre_curso='$nom_cu' and escuela='$es'";
$registros=$mysql->query($cadena) or die($mysql->error);
// Creación del objeto de la clase heredada
//$pdf = new PDF();//
$pdf = new PDF('L'); // 'L' para paisaje [2, 3]
//$pdf = new FPDF('P', 'mm', 'Legal'); // define tamaño de papel Legal
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(8,8,8);
$pdf->cell(45,10,'Curso: '.$nom_cu,0,0,'L',0);
$pdf->Ln(10);
$pdf->cell(45,10,'Escuela: '.$es,0,0,'L',0);
$pdf->Ln(10);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(158, 146, 140);
$pdf->SetFont('Arial','',9);
$pdf->cell(7,10,'id',0,0,'C',1);
$pdf->cell(40,10,'Nombre',0,0,'L',1);
$pdf->cell(40,10,'Apellido',0,0,'L',1);
//$pdf->cell(13,10,'Curso',0,0,'C',1);
//$pdf->cell(12,10,'Materia',0,0,'C',1);
$pdf->cell(15,10,'n1',0,0,'C',1);
$pdf->cell(15,10,'n2',0,0,'C',1);
$pdf->cell(15,10,'n3',0,0,'C',1);
$pdf->cell(15,10,'P.1',0,0,'C',1);
$pdf->cell(15,10,'Rec.1',0,0,'C',1);
$pdf->cell(15,10,'PF.1',0,0,'C',1);
$pdf->cell(15,10,'n1',0,0,'C',1);
$pdf->cell(15,10,'n2',0,0,'C',1);
$pdf->cell(15,10,'n3',0,0,'C',1);
$pdf->cell(15,10,'P.2',0,0,'C',1);
$pdf->cell(15,10,'Rec.2',0,0,'C',1);
$pdf->cell(15,10,'PF.1',0,1,'C',1);

//realizo la tabla que se va a imprimir
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(8,8,8);
$pdf->SetFillColor(253,135,39);
while($row = $registros->fetch_assoc()){
    $pdf->cell(7,10,$row['idalumno'],'B',0,'C',0);
    $pdf->cell(40,10,$row['nombre'],'B',0,'L',0);
    $pdf->cell(40,10,$row['apellido'],'B',0,'L',0);
    //$pdf->cell(13,10,$row['nombre_curso'],'B',0,'C',0);
    //$pdf->cell(12,10,$row['nombre_materia'],'B',0,'C',0);
    $pdf->cell(15,10,$row['nota1_1'],'B',0,'C',0);
    $pdf->cell(15,10,$row['nota1_2'],'B',0,'C',0);
    $pdf->cell(15,10,$row['nota1_3'],'B',0,'C',0);
    $pdf->cell(15,10,$row['promedio_pri_cuatri_1'],'B',0,'C',0);
    $pdf->cell(15,10,$row['recuperacion_1'],'B',0,'C',0);
    $pdf->cell(15,10,$row['promedio_pri_cuatri_2'],'B',0,'C',0);
    $pdf->cell(15,10,$row['nota2_1'],'B',0,'C',0);
    $pdf->cell(15,10,$row['nota2_2'],'B',0,'C',0);
    $pdf->cell(15,10,$row['nota2_3'],'B',0,'C',0);
    $pdf->cell(15,10,$row['promedio_seg_cuatri_1'],'B',0,'C',0);
    $pdf->cell(15,10,$row['recuperacion_2'],'B',0,'C',0);
    $pdf->cell(15,10,$row['promedio_seg_cuatri_2'],'B',1,'C',0);
}
    
$pdf->Output();
?>

