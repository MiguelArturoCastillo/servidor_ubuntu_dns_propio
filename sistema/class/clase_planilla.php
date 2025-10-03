<?php
class planilla {
    public $idalumno;
    public $nombre_materia;
    public $apellido;
    public $nombre;
    public $nombre_curso;
    public $nota1_1;
    public $nota1_2;
    public $nota1_3;
    public $promedio_pri_cuatri_1;
    public $recuperacion_1;
    public $promedio_pri_cuatri_2;
    public $nota2_1;
    public $nota2_2;
    public $nota2_3;
    public $promedio_seg_cuatri_1;
    public $recuperacion_2;
    public $promedio_seg_cuatri_2;
    public $nota3_1;
    public $nota3_2;
    public $nota3_3;
    public $promedio_ter_cuatri_1;
    public $recuperacion_3;
    public $promedio_ter_cuatri_2;
    public $calificacion_final;
    public $fort_dic;
    public $reg_feb;
    public $promedio_final;

    public function __construct($mat,$ape,$nom,$nom_cu,$no1_1,$no1_2,$no1_3,$pr_cu1,$re1,$pr_cu2,$no2_1,$no2_2,$no2_3,$seg_cu1,$re2,$seg_cu2,$no3_1,$no3_2,$no3_3,$ter_cu1,$re3,$ter_cu2,$calif_fin,$fo_di,$re_fe,$pr_fn)
    {
        $this->nombre_materia=$mat;
        $this->apellido=$ape;
        $this->nombre=$nom;
        $this->nombre_curso=$nom_cu;
        $this->nota1_1=$no1_1;
        $this->nota1_2=$no1_2;
        $this->nota1_3=$no1_3;
        $this->promedio_pri_cuatri_1=$pr_cu1;
        $this->recuperacion_1=$re1;
        $this->promedio_pri_cuatri_2=$pr_cu2;
        $this->nota2_1=$no2_1;
        $this->nota2_2=$no2_2;
        $this->nota2_3=$no2_3;
        $this->promedio_seg_cuatri_1=$seg_cu1;
        $this->recuperacion_2=$re2;
        $this->promedio_seg_cuatri_2=$seg_cu2;
        $this->nota3_1=$no3_1;
        $this->nota3_2=$no3_2;
        $this->nota3_3=$no3_3;
        $this->promedio_ter_cuatri_1=$ter_cu1;
        $this->recuperacion_3=$re3;
        $this->promedio_ter_cuatri_2=$ter_cu2;
        $this->calificacion_final=$calif_fin;
        $this->fort_dic=$fo_di;
        $this->feb=$re_fe;
        $this->promedio_final=$pr_fn;
    }
    
    public function listar_planilla($nom_cu,$es,$mo)
    {   
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="SELECT a.idalumno, a.nombre, a.apellido, a.nombre_curso, a.nombre_materia, c.nota1_1, c.nota1_2, c.nota1_3, c.promedio_pri_cuatri_1, c.recuperacion_1, c.promedio_pri_cuatri_2, cs.nota2_1, cs.nota2_2, cs.nota2_3, cs.promedio_seg_cuatri_1, cs.recuperacion_2, cs.promedio_seg_cuatri_2,  cf.calificacion_final, cf.fort_dic, cf.feb, cf.promedio_final   FROM alumnos a INNER JOIN calificaciones c ON a.idalumno=c.idalumno  INNER JOIN calificaciones_seg cs ON a.idalumno=cs.idalumno  INNER JOIN calificaciones_fin cf ON a.idalumno=cf.idalumno WHERE nombre_curso='$nom_cu' and escuela='$es'";
        $registros=$mysql->query($cadena) or die($mysql->error);
            echo "<table class='table table-striped' border=1>";
            /*echo"<td>Materias</td>";*/
            echo"<td>idalumno</td>";
            echo"<td>Nombre</td>";
            echo"<td>Apellido</td>";
            echo"<td>Curso</td>";
            echo"<td>Materia</td>";
            echo"<td>n1</td>";
            echo"<td>n2</td>";
            echo"<td>n3</td>";
            echo"<td>P1</td>";
            echo"<td>R1</td>";
            echo"<td>P2</td>";
            echo"<td>n1</td>";
            echo"<td>n2</td>";
            echo"<td>n3</td>";
            echo"<td>P1</td>";
            echo"<td>R2</td>";
            echo"<td>P2</td>";
            echo"<td>Calif. Final</td>";
            echo"<td>Fo.Dic</td>";
            echo"<td>Feb.</td>";
            echo"<td>P.F</td>";
            echo"<td>OPERACION</td>";
        while ($reg = $registros->fetch_array()) 
            {
            echo "<tr>";
            /*echo "<td>".$reg['nombre_materia']."</td>";*/
            echo "<td>".$reg['idalumno']."</td>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['apellido']."</td>";
            echo "<td>".$reg['nombre_curso']."</td>";
            echo "<td>".$reg['nombre_materia']."</td>"; 
            echo "<td>".$reg['nota1_1']."</td>";
            echo "<td>".$reg['nota1_2']."</td>";
            echo "<td>".$reg['nota1_3']."</td>"; 
            echo "<td>".$reg['promedio_pri_cuatri_1']."</td>";
            echo "<td>".$reg['recuperacion_1']."</td>";
            echo "<td>".$reg['promedio_pri_cuatri_2']."</td>";
            echo "<td>".$reg['nota2_1']."</td>";
            echo "<td>".$reg['nota2_2']."</td>";
            echo "<td>".$reg['nota2_3']."</td>"; 
            echo "<td>".$reg['promedio_seg_cuatri_1']."</td>";
            echo "<td>".$reg['recuperacion_2']."</td>";
            echo "<td>".$reg['promedio_seg_cuatri_2']."</td>"; 
            echo "<td>".$reg['calificacion_final']."</td>";
            echo "<td>".$reg['fort_dic']."</td>";
            echo "<td>".$reg['feb']."</td>";
            echo "<td>".$reg['promedio_final']."</td>";          
            echo '<td><a class="btn btn-secondary btn-sm" href="listado_planilla.php?id='.$reg["idalumno"].'&nombre='.$reg["nombre"].'&apellido='.$reg["apellido"].'&nombre_curso='.$reg["nombre_curso"].'&nombre_materia='.$reg["nombre_materia"].'&nota1_1='.$reg["nota1_1"].'&nota1_2='.$reg["nota1_2"].'&nota1_3='.$reg["nota1_3"].'&promedio_pri_cuatri_1='.$reg["promedio_pri_cuatri_1"].'&recuperacion_1='.$reg["recuperacion_1"].'&promedio_pri_cuatri_2='.$reg["promedio_pri_cuatri_2"].'&nota2_1='.$reg["nota2_1"].'&nota2_2='.$reg["nota2_2"].'&nota2_3='.$reg["nota2_3"].'&promedio_seg_cuatri_1='.$reg["promedio_seg_cuatri_1"].'&recuperacion_2='.$reg["recuperacion_2"].'&promedio_seg_cuatri_2='.$reg["promedio_seg_cuatri_2"].'&calificacion_final='.$reg["calificacion_final"].'&fort_dic='.$reg["fort_dic"].'&feb='.$reg["feb"].'&promedio_final='.$reg["promedio_final"].'">EDITAR</td>';        
            echo "</tr>";
            }
            echo "</table>";        
            $mysql->close();
    } 
    public function listar_planilla1($nom_cu,$es,$mo)
    {   
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="SELECT a.idalumno, a.nombre, a.apellido, a.nombre_curso, a.nombre_materia, c.nota1_1, c.nota1_2, c.nota1_3, c.promedio_pri_cuatri_1, c.recuperacion_1, c.promedio_pri_cuatri_2, cs.nota2_1, cs.nota2_2, cs.nota2_3, cs.promedio_seg_cuatri_1, cs.recuperacion_2, cs.promedio_seg_cuatri_2,  ct.nota3_1, ct.nota3_2, ct.nota3_3, ct.promedio_ter_cuatri_1, ct.recuperacion_3, ct.promedio_ter_cuatri_2, cf.calificacion_final, cf.fort_dic, cf.feb, cf.promedio_final   FROM alumnos a INNER JOIN calificaciones c ON a.idalumno=c.idalumno  INNER JOIN calificaciones_seg cs ON a.idalumno=cs.idalumno INNER JOIN calificaciones_ter ct ON a.idalumno=ct.idalumno INNER JOIN calificaciones_fin cf ON a.idalumno=cf.idalumno WHERE nombre_curso='$nom_cu' and escuela='$es'";
        $registros=$mysql->query($cadena) or die($mysql->error);
            echo "<table class='table table-striped' border=1>";
            /*echo"<td>Materias</td>";*/
            echo"<td>id</td>";
            echo"<td>Nombre</td>";
            echo"<td>Apellido</td>";
            echo"<td>n1</td>";
            echo"<td>n2</td>";
            echo"<td>n3</td>";
            echo"<td>P1</td>";
            echo"<td>R1</td>";
            echo"<td>P2</td>";
            echo"<td>n1</td>";
            echo"<td>n2</td>";
            echo"<td>n3</td>";
            echo"<td>P1</td>";
            echo"<td>R2</td>";
            echo"<td>P2</td>";
            echo"<td>n1</td>";
            echo"<td>n2</td>";
            echo"<td>n3</td>";
            echo"<td>P1</td>";
            echo"<td>R3</td>";
            echo"<td>P2</td>";
            echo"<td>Calif. Final</td>";
            echo"<td>Fo.Dic</td>";
            echo"<td>Feb.</td>";
            echo"<td>P.F</td>";
            echo"<td>OPERACION</td>";
        while ($reg = $registros->fetch_array()) 
            {
            echo "<tr>";
            /*echo "<td>".$reg['nombre_materia']."</td>";*/
            echo "<td>".$reg['idalumno']."</td>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['apellido']."</td>";
            echo "<td>".$reg['nota1_1']."</td>";
            echo "<td>".$reg['nota1_2']."</td>";
            echo "<td>".$reg['nota1_3']."</td>"; 
            echo "<td>".$reg['promedio_pri_cuatri_1']."</td>";
            echo "<td>".$reg['recuperacion_1']."</td>";
            echo "<td>".$reg['promedio_pri_cuatri_2']."</td>";
            echo "<td>".$reg['nota2_1']."</td>";
            echo "<td>".$reg['nota2_2']."</td>";
            echo "<td>".$reg['nota2_3']."</td>"; 
            echo "<td>".$reg['promedio_seg_cuatri_1']."</td>";
            echo "<td>".$reg['recuperacion_2']."</td>";
            echo "<td>".$reg['promedio_seg_cuatri_2']."</td>";
            echo "<td>".$reg['nota3_1']."</td>";
            echo "<td>".$reg['nota3_2']."</td>";
            echo "<td>".$reg['nota3_3']."</td>"; 
            echo "<td>".$reg['promedio_ter_cuatri_1']."</td>";
            echo "<td>".$reg['recuperacion_3']."</td>";
            echo "<td>".$reg['promedio_ter_cuatri_2']."</td>";
            echo "<td>".$reg['calificacion_final']."</td>";
            echo "<td>".$reg['fort_dic']."</td>";
            echo "<td>".$reg['feb']."</td>";
            echo "<td>".$reg['promedio_final']."</td>";
            echo '<td><a class="btn btn-secondary btn-sm" href="listado_planilla1.php?id='.$reg["idalumno"].'&nombre='.$reg["nombre"].'&apellido='.$reg["apellido"].'&nombre_curso='.$reg["nombre_curso"].'&nombre_materia='.$reg["nombre_materia"].'&nota1_1='.$reg["nota1_1"].'&nota1_2='.$reg["nota1_2"].'&nota1_3='.$reg["nota1_3"].'&promedio_pri_cuatri_1='.$reg["promedio_pri_cuatri_1"].'&recuperacion_1='.$reg["recuperacion_1"].'&promedio_pri_cuatri_2='.$reg["promedio_pri_cuatri_2"].'&nota2_1='.$reg["nota2_1"].'&nota2_2='.$reg["nota2_2"].'&nota2_3='.$reg["nota2_3"].'&promedio_seg_cuatri_1='.$reg["promedio_seg_cuatri_1"].'&recuperacion_2='.$reg["recuperacion_2"].'&promedio_seg_cuatri_2='.$reg["promedio_seg_cuatri_2"].'&nota3_1='.$reg["nota3_1"].'&nota3_2='.$reg["nota3_2"].'&nota3_3='.$reg["nota3_3"].'&promedio_ter_cuatri_1='.$reg["promedio_ter_cuatri_1"].'&recuperacion_3='.$reg["recuperacion_3"].'&promedio_ter_cuatri_2='.$reg["promedio_ter_cuatri_2"].'&calificacion_final='.$reg["calificacion_final"].'&fort_dic='.$reg["fort_dic"].'&feb='.$reg["feb"].'&promedio_final='.$reg["promedio_final"].'">EDITAR</td>';        
            echo "</tr>";
            }
            echo "</table>";        
            $mysql->close();
    }    
    public function edicion_planilla($id)
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="ELECT a.idalumno, a.nombre, a.apellido, a.nombre_curso, a.nombre_materia, c.nota1_1, c.nota1_2, c.nota1_3, c.promedio_pri_cuatri_1, c.recuperacion_1, c.promedio_pri_cuatri_2, cs.nota2_1, cs.nota2_2, cs.nota2_3, cs.promedio_seg_cuatri_1, cs.recuperacion_2, cs.promedio_seg_cuatri_2,  cf.calificacion_final, cf.fort_dic, cf.feb, cf.promedio_final   FROM alumnos a INNER JOIN calificaciones c ON a.idalumno=c.idalumno  INNER JOIN calificaciones_seg cs ON a.idalumno=cs.idalumno  INNER JOIN calificaciones_fin cf ON a.idalumno=cf.idalumno WHERE a.idalumno='$id'";
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "<table class='table table-striped' border=1>";
            /*echo"<td>Materias</td>";*/
            echo"<td>idalumno</td>";
            echo"<td>Nombre</td>";
            echo"<td>Apellido</td>";
            echo"<td>Curso</td>";
            echo"<td>Materia</td>";
            echo"<td>n1</td>";
            echo"<td>n2</td>";
            echo"<td>n3</td>";
            echo"<td>prom.1</td>";
            echo"<td>recup.1</td>";
            echo"<td>Prom.2</td>";
            echo"<td>n1</td>";
            echo"<td>n2</td>";
            echo"<td>n3</td>";
            echo"<td>Prom.1</td>";
            echo"<td>recup.2</td>";
            echo"<td>Prom.2</td>"; 
            echo"<td>Calif. Final</td>";
            echo"<td>Fo.Dic</td>";
            echo"<td>Feb.</td>";
            echo"<td>P.F</td>"; 
        while ($reg = $registros->fetch_array()) {
            echo "<tr>";
            /*echo "<td>".$reg['nombre_materia']."</td>";*/
            echo "<td>".$reg['idalumno']."</td>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['apellido']."</td>";
            echo "<td>".$reg['nombre_curso']."</td>";
            echo "<td>".$reg['nombre_materia']."</td>"; 
            echo "<td>".$reg['nota1_1']."</td>";
            echo "<td>".$reg['nota1_2']."</td>";
            echo "<td>".$reg['nota1_3']."</td>"; 
            echo "<td>".$reg['promedio_pri_cuatri_1']."</td>";
            echo "<td>".$reg['recuperacion_1']."</td>";
            echo "<td>".$reg['promedio_pri_cuatri_2']."</td>";
            echo "<td>".$reg['nota2_1']."</td>";
            echo "<td>".$reg['nota2_2']."</td>";
            echo "<td>".$reg['nota2_3']."</td>"; 
            echo "<td>".$reg['promedio_seg_cuatri_1']."</td>";
            echo "<td>".$reg['recuperacion_2']."</td>";
            echo "<td>".$reg['promedio_seg_cuatri_2']."</td>";
            echo "<td>".$reg['calificacion_final']."</td>";
            echo "<td>".$reg['fort_dic']."</td>";
            echo "<td>".$reg['feb']."</td>";
            echo "<td>".$reg['promedio_final']."</td>";       
            echo "</tr>";   
            }
            echo "</table>";
            $mysql->close();     
    }        
}  
?>