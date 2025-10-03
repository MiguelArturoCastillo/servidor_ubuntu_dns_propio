<?php
class docente {
    public $iddocente;
    public $apellido_nombre;
    public $celular;
    public $mail;

    public function __construct($ape,$cel,$mai)
    {
        $this->apellido_nombre=$ape;
        $this->celular=$cel;
        $this->mail=$mai;
    }

    public function guardar()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        if ($mysql->connect_error)
        die('Problemas con la conexion a la base de datos');

        $cadena="UPDATE `docentes` SET `celular`='$this->celular',`mail`='$this->mail' WHERE `iddocente`='1'";
        $mysql->query($cadena) or die($mysql->error);

        $mysql->close();
    }


    public function listar()
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="select iddocente,apellido_nombre,celular,mail from docentes order by iddocente";
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "<table table class='table table-striped' border=1>";
            echo"<td>iddocente</td>";
            echo"<td>Nombre y apellido</td>";
            echo"<td>Celular</td>";
            echo"<td>Mail</td>";
        while ($reg = $registros->fetch_array()) 
            {
            echo "<tr>";
            echo "<td>".$reg['iddocente']."</td>";
            echo "<td>".$reg['apellido_nombre']."</td>";
            echo "<td>".$reg['celular']."</td>";
            echo "<td>".$reg['mail']."</td>";
            echo '<td><a class="btn btn-primary btn-sm" href="eliminar_docente.php?id='.$reg["iddocente"].'">Eliminar</td>';
            echo "</tr>";
            }
            echo "</table>";
            $mysql->close();
    }
    public function mostrar_docente($id)
    {
        $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
        $cadena="select iddocente,apellido_nombre,celular,mail from docentes where iddocente=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        if ($reg = $registros->fetch_array()) 
            {
            echo "Iddocente :".$reg['iddocente'];
            echo "<br>Apellido y Nombre :".$reg['apellido_nombre'];
            echo "<br>";
            echo "Nombre :".$reg['celular'];
            echo "<br>";
            echo "Mail :".$reg['mail'];
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
        $cadena="delete from docentes where iddocente=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "Se elimino el registro";
        $mysql->close();
    }
}
?>