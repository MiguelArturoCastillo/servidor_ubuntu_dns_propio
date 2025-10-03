<?php
class calificaciones {
    public $idcalificacion;
    public $idalumno;
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

    public function __construct($idalu,$no1_1,$no1_2,$no1_3,$pr_cu1,$re1,$pr_cu2,$no2_1,$no2_2,$no2_3,$seg_cu1,$re2,$seg_cu2)
    {
        $this->idalumno=$idalu;
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
    }

    
    public function eliminar($id)
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="delete from calificaciones where idcalificacion=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "Se elimino el registro";
        $mysql->close();
    }
    public function listar_calificaciones()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="select idcalificacion,idalumno,nota1_1,nota1_2,nota1_3,promedio_pri_cuatri_1,recuperacion_1,promedio_pri_cuatri_2,nota2_1,nota2_2,nota2_3,promedio_seg_cuatri_1,recuperacion_2,promedio_seg_cuatri_2 from calificaciones order by idcalificacion";
        $registros=$mysql->query($cadena) or die($mysql->error);
        while ($reg = $registros->fetch_array()) 
            {
            echo "<br>IDcalificacion:".$reg['idcalificacion'];
            echo "<br>";
            echo "Idalumno:".$reg['idalumno'];           
            echo "<br>";
            echo "Nota 1_1:".$reg['nota1_1'];
            echo "<br>";
            echo "Nota 1_2:".$reg['nota1_2'];
            echo "<br>";
            echo "Nota 1_3:".$reg['nota1_3'];
            echo "<br>";
            echo "Promedio 1 P.C:".$reg['promedio_pri_cuatri_1'];
            echo "<br>";
            echo "Recuperacion 1:".$reg['recuperacion_1'];
            echo "<br>";
            echo "promedio_seg_cuatri_2:".$reg['promedio_pri_cuatri_2'];
            echo "<br>";
            echo "Nota 2_1:".$reg['nota2_1'];
            echo "<br>";
            echo "Nota 2_2:".$reg['nota2_2'];
            echo "<br>";
            echo "Nota 2_3:".$reg['nota2_3'];
            echo "<br>";
            echo "Promedio 1 S.C:".$reg['promedio_seg_cuatri_1'];
            echo "<br>";
            echo "Recuperacion 2:".$reg['recuperacion_2'];
            echo "<br>";
            echo "Promedio 2 S.C:".$reg['promedio_seg_cuatri_2'];
            echo "<hr>";
            }
            $mysql->close();
    }
    
}
?>