<?php

session_start();

if(!isset($_SESSION['id'])) 
{
    header("Location: index.php");
}

$nombre=$_SESSION['nombre'];
$tipo_usuario=$_SESSION['tipo_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SISTEMA MIPROFESOR</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="principal.php">SISTEMA MIPROFESOR</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nombre;?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">configuracion</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!--<div class="sb-sidenav-menu-heading">Core</div>-->
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                PANEL DE CONTROL
                            </a>
							<?php if ($tipo_usuario == 1) { ?>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <?php } ?>
							<!--agregado para formar adherir paginas de mi profesor-->
                            <?php if ($tipo_usuario == 1 or $tipo_usuario == 2) { ?>
                            <div class="sb-sidenav-menu-heading">GESTION ACADEMICA</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Consulta de datos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listado_materia.php">Listado de materias</a>
									<a class="nav-link" href="listado_alumno.php">Listado de alumnos</a>
									<a class="nav-link" href="listado_curso.php">Listado de cursos</a>
									<a class="nav-link" href="listado_docente.php">Listado de docentes</a>
									<a class="nav-link" href="formulario_planilla.php">Planilla de curso</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Formularios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Formulario alumno
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Ingreso nuevo alumno</a>
                                            <!--<a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>-->
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Formulario curso
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Ingreso nuevo curso</a>
                                            <!--<a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>-->
                                        </nav>
                                    </div>
									<!--agregado para formulario  de mi profesor-->
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Formulario docente
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Ingreso nuevo docente</a>
                                            <!--<a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>-->
                                        </nav>
                                    </div>
									<!--agregado para formulario  de mi profesor-->
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Formulario materia
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Ingreso nueva materia</a>
                                            <!--<a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>-->
                                        </nav>
                                    </div>
                                    <!--hasta aca-->

                                </nav>
                            </div>
							<?php } ?>
                            <!--Se agrega comentario para indicar que se da permiso solo al administrador de ver esta parte de  addons-->
                            <?php if ($tipo_usuario == 1) { ?>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <?php } ?>
                            <a class="nav-link" href="tabla.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Usuario y contraseñas
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $nombre;?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4" >
                        <h3 class="mt-4">CONSULTAS</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">LISTADOS</li>
                        </ol>
                            <section>
                            <div >
                                <div class="col-xl-12 col-md-4"style="align-content: center"><div>
                                        <h6 class="mt-4">PLANILLA ESCOLAR DE LA MATERIA</h6>
                                        <p class="placeholder-wave">
                                        <span class="placeholder col-12"></span>
                                        </p>      
    <?php
    include("class/clase_planilla.php");
    $id=$_REQUEST['id'];
    $nombre=$_REQUEST['nombre'];
    $apellido=$_REQUEST['apellido'];
    $nombre_curso=$_REQUEST['nombre_curso'];
    $nombre_materia=$_REQUEST['nombre_materia'];

    $nota1_1=$_REQUEST['nota1_1'];
    $nota1_2=$_REQUEST['nota1_2'];
    $nota1_3=$_REQUEST['nota1_3'];
    $promedio_pri_cuatri_1=$_REQUEST['promedio_pri_cuatri_1'];
    $recuperacion_1=$_REQUEST['recuperacion_1'];

    $promedio_pri_cuatri_2=$_REQUEST['promedio_pri_cuatri_2'];
    $nota2_1=$_REQUEST['nota2_1'];
    $nota2_2=$_REQUEST['nota2_2'];
    $nota2_3=$_REQUEST['nota2_3'];
    $promedio_seg_cuatri_1=$_REQUEST['promedio_seg_cuatri_1'];
    $recuperacion_2=$_REQUEST['recuperacion_2'];    
    $promedio_seg_cuatri_2=$_REQUEST['promedio_seg_cuatri_2'];

    $calificacion_final=$_REQUEST['calificacion_final'];
    $fort_dic=$_REQUEST['fort_dic'];
    $feb=$_REQUEST['feb'];
    $promedio_final=$_REQUEST['promedio_final'];

    /*$obj_libreta=new planilla("","","","","","","","","","","","","","","","");
    $obj_libreta->edicion_planilla($id);*/
    ?>
<br>
<br>
<?php
$mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
$cadena="SELECT a.idalumno, a.nombre, a.apellido, a.nombre_curso, a.nombre_materia, c.nota1_1, c.nota1_2, c.nota1_3, c.promedio_pri_cuatri_1, c.recuperacion_1, c.promedio_pri_cuatri_2, cs.nota2_1, cs.nota2_2, cs.nota2_3, cs.promedio_seg_cuatri_1, cs.recuperacion_2, cs.promedio_seg_cuatri_2,  cf.calificacion_final, cf.fort_dic, cf.feb, cf.promedio_final   FROM alumnos a INNER JOIN calificaciones c ON a.idalumno=c.idalumno  INNER JOIN calificaciones_seg cs ON a.idalumno=cs.idalumno  INNER JOIN calificaciones_fin cf ON a.idalumno=cf.idalumno WHERE a.idalumno='$id'";
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
    echo"<td>F.D</td>";
    echo"<td>R.F</td>";
    echo"<td>P.Final</td>";   
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

    /*$id=$_REQUEST['id'];*/
    ?>
    <BR>
    <h6 class="mt-4">REALIZAR EDICION DE DATOS</h6>
<form action="procesa_actualizar.php" method="POST">
    <h6 class="mt-4">Notas primer cuatrimeste</h6>
    <input type="hidden" name="txt_idalumno" value="<?php echo $id;?>">
    NOMBRE    :<input type="text" name="txt_nombre" value="<?php echo $nombre;?>">
    APELLIDO  :<input type="text" name="txt_apellido" value="<?php echo $apellido;?>">   
    CURSO     :<input type="text" name="txt_curso" value="<?php echo $nombre_curso;?>">
    MATERIA   :<input type="text" name="txt_materia" value="<?php echo $nombre_materia;?>">
    <BR>
    <BR>
    Nota 1    :<input type="text" name="txt_nota1_1" value="<?php echo $nota1_1;?>">
    Nota 2    :<input type="text" name="txt_nota1_2" value="<?php echo $nota1_2;?>">   
    Nota 3    :<input type="text" name="txt_nota1_3" value="<?php echo $nota1_3;?>">
    Promedio 1 :<input type="text" name="txt_promedio_pri_cuatri_1" value="<?php echo $promedio_pri_cuatri_1;?>">
    <BR>
    <BR>
    Recuperacion 1  :<input type="text" name="txt_recuperacion_1" value="<?php echo $recuperacion_1;?>">
    Promedio 2 :<input type="text" name="txt_promedio_pri_cuatri_2" value="<?php echo $promedio_pri_cuatri_2;?>">
    <h6 class="mt-4">Notas segundo cuatrimeste</h6>    
    Nota 1     :<input type="text" name="txt_nota2_1" value="<?php echo $nota2_1;?>">
    Nota 2     :<input type="text" name="txt_nota2_2" value="<?php echo $nota2_2;?>">    
    Nota 3     :<input type="text" name="txt_nota2_3" value="<?php echo $nota2_3;?>">
    Promedio 1 :<input type="text" name="txt_promedio_seg_cuatri_1" value="<?php echo $promedio_seg_cuatri_1;?>">
    <br>
    <br>
    Recuperacion 1  :<input type="text" name="txt_recuperacion_2" value="<?php echo $recuperacion_2;?>">
    Promedio 2 :<input type="text" name="txt_promedio_seg_cuatri_2" value="<?php echo $promedio_seg_cuatri_2;?>">
    <br>
    <br>
    <hr>
    Cal. Final     :<input type="text" name="txt_calificacion_final" value="<?php echo $calificacion_final;?>"> 
    Fort.Dic     :<input type="text" name="txt_fort_dic" value="<?php echo $fort_dic;?>">    
    R.Febre    :<input type="text" name="txt_feb" value="<?php echo $feb;?>">    
    P.Final     :<input type="text" name="txt_promedio_final" value="<?php echo $promedio_final;?>">

<br>
<br>
<br>
<div class="btn-group" role="group" aria-label="Basic outlined example"> 
<input type="submit" value="GUARDAR CAMBIOS"class="btn btn-outline-primary">
<a href="formulario_planilla.php" class="btn btn-secondary" style="align-content: center">VOLVER</a>
</div>
</div>
</form>
    <br>   
    
</div>
                            </section>          
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2025 por Miguel Castillo Desarrollador de Software</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
