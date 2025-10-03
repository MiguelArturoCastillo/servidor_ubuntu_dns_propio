<?php
class curso {
    public $idcurso;
    public $nombre_curso;
    public $turno;
    public $ciclo_escolar;

    public function __construct($nom_cu,$tur,$ciclo)
    {
        $this->nombre_curso=$nom_cu;
        $this->turno=$tur;
        $this->ciclo_escolar=$ciclo;
    }
    
    public function guardar()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        if ($mysql->connect_error)
        die('Problemas con la conexion a la base de datos');

        $cadena='insert into cursos(idcurso,nombre_curso,turno,ciclo_escolar) values (null,"'.$this->nombre_curso.'","'.$this->turno.'","'.$this->ciclo_escolar.'")';

        $mysql->query($cadena) or die($mysql->error);

        $mysql->close();
    }

    public function listar()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="select idcurso,nombre_curso,turno,ciclo_escolar from cursos order by idcurso";
        $registros=$mysql->query($cadena) or die($mysql->error);
            echo "<table class='table table-striped' border=1>"; 
            echo"<td>idcurso</td>";
            echo"<td>Curso</td>";
            echo"<td>Turno</td>";
            echo"<td>Ciclo</td>";
            echo"<td>Operacion</td>";        
        while ($reg = $registros->fetch_array()) {
            echo "<tr>";
            echo "<td>".$reg['idcurso']."</td>";
            echo "<td>".$reg['nombre_curso']."</td>";
            echo "<td>".$reg['turno']."</td>";
            echo "<td>".$reg['ciclo_escolar']."</td>";
            echo '<td><a class="btn btn-secondary btn-sm" href="eliminar_curso.php?id='.$reg["idcurso"].'">Eliminar</td>';
            echo "</tr>";
            }
            echo "</table>";
            $mysql->close();
    }
    public function eliminar($id)
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="delete from cursos where idcurso=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "Se elimino el registro";
        $mysql->close();
    }
    
}
?>