<?php
class alumno {
    public $idalumno;
    public $apellido;
    public $nombre;
    public $fecha_nacimiento;
    public $telefonopadre;
    public $escuela;
    public $modalidad;
    public $nombre_curso;
    public $nombre_materia;

    public function __construct($ape,$nom,$fec,$tel,$es,$mo,$nom_cu,$mat)
    {
        $this->apellido=$ape;
        $this->nombre=$nom;
        $this->fecha_nacimiento=$fec;
        $this->telefonopadre=$tel;
        $this->escuela=$es;
        $this->modalidad=$mo;
        $this->nombre_curso=$nom_cu;
        $this->nombre_materia=$mat;
    }

    public function guardar()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        if ($mysql->connect_error)
        die('Problemas con la conexion a la base de datos');

        $cadena='insert into alumnos(idalumno,apellido,nombre,fecha_nacimiento,telefonopadre,escuela,modalidad,nombre_curso,nombre_materia) values (null,"'.$this->apellido.'","'.$this->nombre.'","'.$this->fecha_nacimiento.'","'.$this->telefonopadre.'","'.$this->escuela.'","'.$this->modalidad.'","'.$this->nombre_curso.'","'.$this->nombre_materia.'")';

        $mysql->query($cadena) or die($mysql->error);

        $mysql->close();
    }

    public function listar()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="select idalumno,apellido,nombre,fecha_nacimiento,telefonopadre,escuela,modalidad,nombre_curso,nombre_materia  from alumnos  where modalidad='secundaria comun' order by idalumno";
        $registros=$mysql->query($cadena) or die($mysql->error);
            echo"<table class='table table-striped' border=1>";
            echo"<td>idalumno</td>";
            echo"<td>Apellido</td>";
            echo"<td>Nombre</td>";
            echo"<td>Fecha N.</td>";
            echo"<td>Contacto tel.</td>";
            echo"<td>Escuela</td>";
            echo"<td>Modalidad</td>";
            echo"<td>Curso</td>";
            echo"<td>Materia</td>";
            echo"<td>Operacion</td>";
            echo"<td>ABRIR</td>";
            echo"<td>ABRIR</td>";
            echo"<td>ABRIR</td>";
        while ($reg = $registros->fetch_array()) {
            echo "<tr>";
            echo "<td>".$reg['idalumno']."</td>";
            echo "<td>".$reg['apellido']."</td>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['fecha_nacimiento']."</td>";
            echo "<td>".$reg['telefonopadre']."</td>";
            echo "<td>".$reg['escuela']."</td>";
            echo "<td>".$reg['modalidad']."</td>";
            echo "<td>".$reg['nombre_curso']."</td>";
            echo "<td>".$reg['nombre_materia']."</td>";
            echo '<td><a class="btn btn-primary btn-sm" href="eliminar_alumno.php?id='.$reg["idalumno"].'">Eliminar</td>';
            echo '<td><a class="btn btn-secondary btn-sm" href="carga_calificacion.php?id='.$reg["idalumno"].'&alumno='.$reg['apellido'].'">PRIMERO</td>';
            echo '<td><a class="btn btn-secondary btn-sm" href="carga_calificacion_seg.php?id='.$reg["idalumno"].'&alumno='.$reg['apellido'].'">SEGUNDO</td>';
            echo '<td><a class="btn btn-secondary btn-sm" href="carga_calificacion_fin.php?id='.$reg["idalumno"].'&alumno='.$reg['apellido'].'">FINAL</td>';
            echo "</tr>";
            }
            echo "</table>";
            echo "Listado de alumnos de secundaria comun.";
            $mysql->close();
    }
    public function listar1()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="select idalumno,apellido,nombre,fecha_nacimiento,telefonopadre,escuela,modalidad,nombre_curso,nombre_materia  from alumnos  where modalidad='secundaria tecnica' order by idalumno";
        $registros=$mysql->query($cadena) or die($mysql->error);
            echo"<table class='table table-striped' border=1>";
            echo"<td>idalumno</td>";
            echo"<td>Apellido</td>";
            echo"<td>Nombre</td>";
            echo"<td>Fecha N.</td>";
            echo"<td>Contacto tel.</td>";
            echo"<td>Escuela</td>";
            echo"<td>Modalidad</td>";
            echo"<td>Curso</td>";
            echo"<td>Materia</td>";
            echo"<td>Operacion</td>";
            echo"<td>ABRIR CALIFICACION</td>";
            echo"<td>ABRIR CALIFICACION</td>";
            echo"<td>ABRIR CALIFICACION</td>";
            echo"<td>CALIFICACION FINAL</td>";
        while ($reg = $registros->fetch_array()) {
            echo "<tr>";
            echo "<td>".$reg['idalumno']."</td>";
            echo "<td>".$reg['apellido']."</td>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['fecha_nacimiento']."</td>";
            echo "<td>".$reg['telefonopadre']."</td>";
            echo "<td>".$reg['escuela']."</td>";
            echo "<td>".$reg['modalidad']."</td>";
            echo "<td>".$reg['nombre_curso']."</td>";
            echo "<td>".$reg['nombre_materia']."</td>";
            echo '<td><a class="btn btn-primary btn-sm" href="eliminar_alumno.php?id='.$reg["idalumno"].'">Eliminar</td>';
            echo '<td><a class="btn btn-secondary btn-sm" href="carga_calificacion1.php?id='.$reg["idalumno"].'&alumno='.$reg['apellido'].'">1 CUATRIMESTRE</td>';
            echo '<td><a class="btn btn-secondary btn-sm" href="carga_calificacion1_seg.php?id='.$reg["idalumno"].'&alumno='.$reg['apellido'].'">2 CUATRIMESTRE</td>';
            echo "</tr>";
            }
            echo "</table>";
            echo "Listado de alumnos de secundaria técnica.";
            $mysql->close();
    }
    public function mostrar_alumno($id)
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="select idalumno,apellido,nombre,fecha_nacimiento,telefonopadre,escuela,modalidad, nombre_curso,nombre_materia from alumnos where idalumno=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        if ($reg = $registros->fetch_array()) {
            echo "Idalumno:".$reg['idalumno'];
            echo "<br>Apellido:  ".$reg['apellido'];
            echo "<br>";
            echo "Nombre:  ".$reg['nombre'];
            echo "<br>";
            echo "Fecha Nacimiento:  ".$reg['fecha_nacimiento'];
            echo "<br>";
            echo "Telefono padre:  ".$reg['telefonopadre'];
            echo "<br>";
            echo "Escuela:  ".$reg['escuela'];
            echo "<br>";
            echo "Modalidad:  ".$reg['modalidad'];
            echo "<br>";
            echo "Curso:  ".$reg['nombre_curso'];
            echo "<br>";
            echo "MATERIA:  ".$reg['nombre_materia']; 
            echo "<br>";
            echo "<hr>";
            }
            else
            {
                echo "No se encuentra el registro";
            }
            $mysql->close();
    }  
    public function eliminar($id)
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        /*$cadena="DELETE calificaciones.*,alumnos.* from calificaciones
JOIN alumnos
ON alumnos.idalumno = calificaciones.idalumno
WHERE alumnos.idalumno='$id'";*/
if ($mysql->connect_error)
die('Problemas con la conexion a la base de datos');
//para validar que no esten agregadas antes las calificaciones.
$validar="SELECT * from calificaciones WHERE idalumno='$id'";
$validando=$mysql->query($validar) or die($mysql->error);
if($validando->num_rows > 0)
    { 
    //para BORRAR datos de ambas tablas.
    $cadena="DELETE calificaciones.*,alumnos.* from calificaciones
    JOIN alumnos
    ON alumnos.idalumno = calificaciones.idalumno
    WHERE alumnos.idalumno='$id'";
    $registros=$mysql->query($cadena) or die($mysql->error);
    echo "Se elimino el registro....";

    }
    else
    {  
    //para BORRAR datos de la tabla alumnos.    
    $cadena="DELETE alumnos.* from alumnos WHERE idalumno='$id'";
    $registros=$mysql->query($cadena) or die($mysql->error);
    echo "Se elimino el registro";
    }
    $mysql->close();
}
}
?>