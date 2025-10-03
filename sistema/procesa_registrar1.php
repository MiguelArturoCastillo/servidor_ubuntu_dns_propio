
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
                        <h3 class="mt-4">CARGA DE DATOS</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">ESTADO DE DATOS</li>
                        </ol>
                            <section>
                            <div >
                                <div class="col-xl-12 col-md-4"style="align-content: center"><div>
                                        <h6 class="mt-4">PLANILLA DE NOTAS FINALES DE LA MATERIA:</h6>
                                        <p class="placeholder-wave">
                                        <span class="placeholder col-12"></span>
                                        </p>
<?php
$n1=$_REQUEST['txt_calificacion1_1'];
$n2=$_REQUEST['txt_calificacion1_2'];
$n3=$_REQUEST['txt_calificacion1_3'];
$re_1=$_REQUEST['txt_recuperacion1'];
$n=0;
$suma1=0;
if(!empty($n1))
{
$n=$n+1;
$suma1=$n1;
}
if(!empty($n2))
{
$n=$n+1;
$suma1=$n1+$n2;
} 
if(!empty($n3))
{
$n=$n+1;
$suma1=$n1+$n2+$n3;
}

$prom_uno=($suma1)/$n;

$prom_1 = number_format($prom_uno, 2);
$prom_1_1="";
if ($prom_1>=6)
{
    $prom_1_1=$prom_1;
}
else
{
    $prom_1_1="AD";
}
echo "EL RESULTADO OBTENIDO EN PROMEDIO FINAL DEL PRIMER TRIMESTRE ES: ".$prom_1_1;
echo "<br>";
$m1=$_REQUEST['txt_calificacion2_1'];
$m2=$_REQUEST['txt_calificacion2_2'];
$m3=$_REQUEST['txt_calificacion2_3'];
$re_2=$_REQUEST['txt_recuperacion2'];
$m=0;
$suma2=0;
if(!empty($m1))
{
$m=$m+1;
$suma2=$m1;
}
if(!empty($m2))
{
$m=$m+1;
$suma2=$m1+$m2;
} 
if(!empty($m3))
{
$m=$m+1;
$suma2=$m1+$m2+$m3;
}               
//$prom_1=($suma1)/$n;
$prom_dos=($suma2)/$m;

$prom_2 = number_format($prom_dos, 2);
$prom_1_2="";
if ($prom_2>=6)
{
    $prom_1_2=$prom_2;
}
else
{
    $prom_1_2="AD";
}

echo "EL RESULTADO OBTENIDO EN PROMEDIO FINAL DEL SEGUNDO TRIMESTRE ES: ".$prom_1_2;
echo "<br>";
$t1=$_REQUEST['txt_calificacion3_1'];
$t2=$_REQUEST['txt_calificacion3_2'];
$t3=$_REQUEST['txt_calificacion3_3'];
$re_3=$_REQUEST['txt_recuperacion3'];
$t=0;
$suma3=0;
if(!empty($t1))
{
$t=$t+1;
$suma3=$t1;
}
if(!empty($t2))
{
$t=$t+1;
$suma3=$t1+$t2;
} 
if(!empty($t3))
{
$t=$t+1;
$suma3=$t1+$t2+$t3;
}               
//$prom_1=($suma1)/$n;
//$prom_2=($suma2)/$m;
$prom_tres=($suma3)/$t;

$prom_3 = number_format($prom_tres, 2);
$prom_1_3="";
if ($prom_3>=6)
{
    $prom_1_3=$prom_3;
}
else
{
    $prom_1_3="AD";
}

echo "EL RESULTADO OBTENIDO EN PROMEDIO FINAL DEL TERCER TRIMESTRE ES: ".$prom_1_3;
echo "<br>";
echo "Cantidad de notas guardadas del primer cuatrimestre es: ".$n;
echo "<br>";
echo "Cantidad de notas guardadas del segundo cuatrimestre es: ".$m;
echo "<br>";
echo "Cantidad de notas guardadas del segundo cuatrimestre es: ".$t;
echo "<br>";



 $mysql = new mysqli("localhost", "root", "", "bdescuela",3308);
 if ($mysql->connect_error)
 die('Problemas con la conexion a la base de datos');

 $cadena='insert into calificaciones(idcalificacion,idalumno,nota1_1,nota1_2,nota1_3,promedio_pri_cuatri_1,recuperacion_1,promedio_pri_cuatri_2,nota2_1,nota2_2,nota2_3,promedio_seg_cuatri_1,recuperacion_2,promedio_seg_cuatri_2,nota3_1,nota3_2,nota3_3,promedio_ter_cuatri_1,recuperacion_3,promedio_ter_cuatri_2) values (null,"'.$_REQUEST['txt_idalumno'].'","'.$_REQUEST['txt_calificacion1_1'].'","'.$_REQUEST['txt_calificacion1_2'].'","'.$_REQUEST['txt_calificacion1_3'].'","'.$prom_1.'","'.$re_1.'","'.$prom_1_1.'","'.$_REQUEST['txt_calificacion2_1'].'","'.$_REQUEST['txt_calificacion2_2'].'","'.$_REQUEST['txt_calificacion2_3'].'","'.$prom_2.'","'.$re_2.'","'.$prom_1_2.'","'.$_REQUEST['txt_calificacion3_1'].'","'.$_REQUEST['txt_calificacion3_2'].'","'.$_REQUEST['txt_calificacion3_3'].'","'.$prom_3.'","'.$re_3.'","'.$prom_1_3.'")';

 $mysql->query($cadena) or die($mysql->error);

 $mysql->close();
?>
<h3>LAS CALIFICACIONES SE GUARDARON EXITOSAMENTE</H3>
<br>
<a href="principal.php"class="btn btn-secondary" style="align-content: center" >VOLVER AL REGISTRO DE ALUMNOS</a>

</div>
                            </div>                                
                    </div>
                    </section>
            </div>
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