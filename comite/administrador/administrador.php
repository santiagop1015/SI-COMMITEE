<!DOCTYPE html>
<?php
session_start();
@$buscart = $_POST['buscart'];
@$buscar = $_POST['buscar'];

date_default_timezone_set('America/Bogota');
$fecha = date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha . '+3 month'));
$pr = $_SESSION['id'];
extract($_GET);

require("../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);
while ($arreglo = mysqli_fetch_array($query)) {
    utf8_decode($programa = $arreglo[11]);
    $admindir = $arreglo[4];
    $pasadmin = $arreglo[5];

    if ($arreglo[2] != 'Administrador') {
        require("../desconectar.php");
        header("Location:../Login/index.html");
    }
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Administrador </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>


    <link rel="stylesheet" href="css/frag.css">


    <!-- Ayuda -- CSS -->
    <script rel="stylesheet" src="dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="dist/css/Help/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/Help/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/Help/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">

    <script type="text/javascript" src="js/cambiarPestanna.js"></script>
    <script type="text/javascript" src="js/EditarTesis.js"></script>

</head>
<?php
if (isset($pes)) {
    echo '<body onload="javascript:cambiarPestanna(pestanas,pestana' . $pes . ');" class="hold-transition sidebar-mini">';
} else {
    echo '<body onload="javascript:cambiarPestanna(pestanas,pestana1);" class="hold-transition sidebar-mini">';
}
?>

<!--<body onload="javascript:cambiarPestanna(pestanas,pestana1);" class="hold-transition sidebar-mini">-->

<div class="loader"></div>

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#B42A2A; color: white;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars white"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="" href="../desconectar.php" style="color: white">Cerrar
                    Sesión</i></a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #B42A2A; color: white">
        <!-- Brand Logo -->
        <a href="director.php" class="brand-link" style="background-color: #343a40; color: white">
            <img src="dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SI-COMMITEE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="background-color: #B42A2A; color: white">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="color: white;"><?php echo $_SESSION['user']  ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <div id="pestanas">
                    <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li id="pestana1" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana1);Recargar(1);' class="nav-link">
                                <i class="nav-icon fa fa-user-md white"></i>
                                <p class="white">
                                    Generar Acta
                                </p>
                            </a>
                        </li>
                        <li id="pestana2" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana2);Recargar(2);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Evaluar
                                </p>
                            </a>
                        </li>
                        <li id="pestana3" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana3);Recargar(3);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Proceso
                                </p>
                            </a>
                        </li>
                        <li id="pestana4" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana4);Recargar(4);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Aplazado
                                </p>
                            </a>
                        </li>
                        <li id="pestana5" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana5);Recargar(5);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Rechazado
                                </p>
                            </a>
                        </li>
                        <li id="pestana6" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana6);Recargar(6);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Vencer
                                </p>
                            </a>
                        </li>
                        <li id="pestana7" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana7);Recargar(7);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    VoBo
                                </p>
                            </a>
                        </li>
                        <li id="pestana8" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana8);Recargar(8);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Cartas-Solicitudes-Otros
                                </p>
                            </a>
                        </li>
                        <li id="pestana9" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana9);Recargar(9);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Semillero
                                </p>
                            </a>
                        </li>
                        <li id="pestana10" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana10);Recargar(10);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Posgrado
                                </p>
                            </a>
                        </li>
                        <li id="pestana11" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana11);Recargar(11);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Auxiliares de Investigación
                                </p>
                            </a>
                        </li>
                        <li id="pestana12" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana12);Recargar(12);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Documentos en Curso
                                </p>
                            </a>
                        </li>
                        <li id="pestana13" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana13);Recargar(13);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Ver Actas
                                </p>
                            </a>
                        </li>
                        <li id="pestana14" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana14);Recargar(14);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Buscar
                                </p>
                            </a>
                        </li>
                        <li id="pestana15" class="nav-item">
                            <a href='javascript:cambiarPestanna(pestanas,pestana15);Recargar(15);' class="nav-link">
                                <i class="nav-icon fa fa-edit white"></i>
                                <p class="white">
                                    Listados Estudiantes
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 id="Text">Monografías/Poster para Evaluar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li id="General" class="breadcrumb-item"><a href="../Login/index.html">Home</a></li>
                            <li id="Especifico" class="breadcrumb-item active">Documentos Registrados</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <section class="content">

            <div id="contenidopestanas">
                <div id="cpestana1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header" style="background-color: #343a40; color: white">
                                    <h5 class="card-title">Espacio para la generación - Acta del Comité, por favor seleccione las fechas inicial y final correspondientes para su Acta</h5>
                                </div>
                                <div class="card-body">
                                    <?php $fecha = date("Y-m-d"); ?>
                                    <form id="loginForm1" action="pdf/generalminutes.php" method="post">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Fecha Actual</label>
                                                    <input type="text" name="fecha" class="form-control" value="<?php echo $fecha; ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Fecha Inicial</label>
                                                    <input type="text" name="fi" class="form-control" placeholder="AAAA-MM-DD" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Fecha Final</label>
                                                    <input type="text" name="ff" class="form-control" placeholder="AAAA-MM-DD" required>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Programa</label>
                                                    <input type="text" name="programa" class="form-control" value="<?php echo $programa ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <input type="text" name="idc" class="form-control" value="<?php echo $pr; ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Disposiciones</label>
                                                    <textarea class="form-control" rows="6" name="disposiciones" cols="29" placeholder="Escriba las disposiciones del comité para esta acta.." aria-required="true"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <center> <button type="submit" id="login2" class="btn btn-primary mr-2" style="background-color: green; margin-bottom: 10px ">Generar Acta</button>
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="cpestana2">
                    <div class="card card-warning">
                        <div class="card-body">
                            <?php
                            $total = 0;
                            // $sql=("SELECT * FROM tesis  limit 10"); //ToDo: delete query
                            /* $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and (terminado=0 or terminado=6) and observaciones='Por definir' and (aprob_dir='SI' or ID_directores='No aplica' or ID_directores='Por definir') and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Poster' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Poster' or ID_estado='Solicitud opción de grado' or ID_estado='Certificado terminacion Materias') ORDER BY  fecha_propuesta DESC");
                                */
                            $sql = ("SELECT * FROM tesis");
                            $query = mysqli_query($mysqli, $sql);

                            ?>

                            <div class="box-body table-responsive no-padding">
                                <table class="table table-striped">
                                    <thead>

                                        <tr>
                                            <th>Titulo</th>
                                            <th>Director</th>
                                            <th>Tipo</th>
                                            <th>Archivo</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else if ($arreglo[6] == "Certificado de Notas") {
                                                $alma = "./certinotas";
                                            } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                $alma = "./certimat";
                                            } else if ($arreglo[6] == "Prorroga") {
                                                $alma = "./prorrogas";
                                            } else {
                                                $alma = "./otros";
                                            }
                                            echo "<tr>";

                                            echo "<td>$arreglo[3]</td>";
                                            echo "<td>$arreglo[5]</td>";

                                            //Validacion para color del estado
                                            if ($arreglo[6] == 'Entrega Propuesta') {
                                                echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Proyecto') {
                                                echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";
                                            } else {
                                                echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";
                                            }
                                            //Fin Validacion para color del estado

                                            echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a></td>";
                                        ?>
                                            <td>
                                                <?php
                                                $direccion_act_tesis = '"pages/act_tesis_coor.php?"';
                                                $complemento_act_tesis = '"id=';
                                                $parametro_act_tesis = $arreglo[0] . '"';
                                                $img_act_tesis = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                                echo "<button onclick='CenterWindow($direccion_act_tesis, $complemento_act_tesis$parametro_act_tesis, 800, 650)'>$img_act_tesis</button>";

                                                // echo "<td><a href='act_tesis_coor?id=$arreglo[0]' target='contenido'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
                                                ?>
                                            </td>
                                        <?php
                                            $direccion_elim_tesis_Evaluar = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Evaluar = '"id=';
                                            $parametro_elim_tesis_Evaluar = $arreglo[0] . '"';
                                            $img_elim_tesis_Evaluar = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Evaluar, $complemento_elim_tesis_Evaluar$parametro_elim_tesis_Evaluar, 900, 650)'>$img_elim_tesis_Evaluar</button></td>";
                                            //  echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
                                            echo "</tr>";
                                            $total++;
                                        }
                                        echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
                                        ?>

                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                </div>
                <div id="cpestana3">

                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">

                            <div class="card-body">

                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="3">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <?php
                                    $total1 = 0;
                                    $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%' and terminado=1 and (ID_estado='Entrega Poster' or ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto'  or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Solicitud opción de grado' or ID_estado='Certificado de Notas')  ORDER BY  ID_tesis DESC");
                                    // $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%'");
                                    $query = mysqli_query($mysqli, $sql);
                                    ?>
                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col" width='8%'>Id Est</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Borrar</th>
                                                <th scope="col">Eval</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody> <tr>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else if ($arreglo[6] == "Certificado de Notas") {
                                                $alma = "./certinotas";
                                            } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                $alma = "./certimat";
                                            } else if ($arreglo[6] == "Prorroga") {
                                                $alma = "./prorrogas";
                                            } else {
                                                $alma = "./otros";
                                            }


                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</font></td>";
                                            echo "<td>$arreglo[1]</font></td>";

                                            //Validacion para color del estado
                                            if ($arreglo[6] == 'Entrega Propuesta') {
                                                echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Proyecto') {
                                                echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";
                                            } else {
                                                echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";
                                            }
                                            //Fin Validacion para color del estado

                                            echo "<td><a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a></td>";

                                            $direccion_act_tesis_Proceso = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Proceso = '"id=';
                                            $parametro_act_tesis_Proceso = $arreglo[0] . '"';
                                            $img_act_tesis_Proceso = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Proceso, $complemento_act_tesis_Proceso$parametro_act_tesis_Proceso, 800, 650)'>$img_act_tesis_Proceso</button></td>";

                                            $direccion_elim_tesis_Proceso = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Proceso = '"id=';
                                            $parametro_elim_tesis_Proceso = $arreglo[0] . '"';
                                            $img_elim_tesis_Proceso = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Proceso, $complemento_elim_tesis_Proceso$parametro_elim_tesis_Proceso, 900, 650)'>$img_elim_tesis_Proceso</button></td>";

                                            //echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
                                            if ($arreglo[6] == 'Entrega Proyecto') {
                                                echo "<td><a href='./pdf/verevalproy.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='30'  height='30'  class='img-rounded'></a></td>";
                                            } else if ($arreglo[6] == 'Entrega Poster') {
                                                echo "<td><a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='30'  height='30'  class='img-rounded'></a></td>";
                                            } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='30'  height='30'  class='img-rounded'></a></td>";
                                            } else {
                                                echo "<td><img src='images/noaplica.png' width='30'  height='30'  class='img-rounded'></td>";
                                            }
                                            echo "</tr>";
                                            $total1++;
                                        }
                                        echo "</tbody></table>";

                                        echo "<center><font color='red' size='3'>Total registros: $total1</font><br></center>";

                                        ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="cpestana4">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="4">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">

                                    <?php
                                    $total2 = 0;
                                    //ToDo: Delete query
                                    $sql = ("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and terminado=3  ORDER BY  ID_tesis DESC");
                                    //$sql = ("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and programa='$programa' and terminado=3  ORDER BY  ID_tesis DESC  ");
                                    $query = mysqli_query($mysqli, $sql);
                                    ?>

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Disposiciones</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Editar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody> <tr>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else if ($arreglo[6] == "Certificado de Notas") {
                                                $alma = "./certinotas";
                                            } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                $alma = "./certimat";
                                            } else if ($arreglo[6] == "Prorroga") {
                                                $alma = "./prorrogas";
                                            } else {
                                                $alma = "./otros";
                                            }
                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</td>";

                                            //Validacion para color del estado
                                            if ($arreglo[6] == 'Entrega Propuesta') {
                                                echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Proyecto') {
                                                echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";
                                            } else {
                                                echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";
                                            }
                                            //Fin Validacion para color del estado

                                            echo "<td>$arreglo[7]</td>";
                                            echo "<td> <a href='$alma/$arreglo[8]' target='_blank'>$arreglo[8]</a> </td>";

                                            $direccion_act_tesis_Aplazado = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Aplazado = '"id=';
                                            $parametro_act_tesis_Aplazado = $arreglo[0] . '"';
                                            $img_act_tesis_Aplazado = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Aplazado, $complemento_act_tesis_Aplazado$parametro_act_tesis_Aplazado, 800, 650)'>$img_act_tesis_Aplazado</button></td>";
                                            //   echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $total2++;
                                            echo "</tr>";
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total2</font><br></center>";
                                        extract($_GET);
                                        ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cpestana5">
                    <div class="card card-warning">

                        <div class="card-body">


                            <form autocomplete="off">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Buscar por titulo:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input type="submit" value="Buscar" class="btn btn-dark">
                                            </div>
                                            <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                            <input type="text" style="display: none;" class="form-control" name="pes" value="5">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">

                                <?php
                                $total2 = 0;

                                //ToDo: Delete query
                                $sql = ("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and terminado=4  ORDER BY  ID_tesis DESC");
                                //$sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%'  and programa='$programa' and terminado=4  ORDER BY  ID_tesis DESC  ");
                                $query = mysqli_query($mysqli, $sql);

                                ?>

                                <table class="table table-bordered  table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Título</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Disposiciones</th>
                                            <th scope="col">Archivo</th>
                                            <th scope="col">Editar</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    echo "<tbody>";
                                    while ($arreglo = mysqli_fetch_array($query)) {
                                        $titu = $arreglo[3];
                                        if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                            $alma = "./propuestas";
                                        } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                            $alma = "./anteproyectos";
                                        } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                            $alma = "./proyectos";
                                        } else if ($arreglo[6] == "Certificado de Notas") {
                                            $alma = "./certinotas";
                                        } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                            $alma = "./certimat";
                                        } else if ($arreglo[6] == "Prorroga") {
                                            $alma = "./prorrogas";
                                        } else {
                                            $alma = "./otros";
                                        }
                                        echo "<tr>";
                                        echo "<td>$arreglo[3]</td>";

                                        //Validacion para color del estado
                                        if ($arreglo[6] == 'Entrega Propuesta') {
                                            echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";
                                        } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                            echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";
                                        } else if ($arreglo[6] == 'Entrega Proyecto') {
                                            echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";
                                        } else {
                                            echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";
                                        }
                                        //Fin Validacion para color del estado

                                        echo "<td>$arreglo[7]</td>";
                                        echo "<td> <a href='$alma/$arreglo[8]' target='_blank'>$arreglo[8]</a> </td>";

                                        $direccion_act_tesis_Rechazado = '"pages/act_tesis_coor.php?"';
                                        $complemento_act_tesis_Rechazado = '"id=';
                                        $parametro_act_tesis_Rechazado = $arreglo[0] . '"';
                                        $img_act_tesis_Rechazado = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                        echo "<td><button onclick='CenterWindow($direccion_act_tesis_Rechazado, $complemento_act_tesis_Rechazado$parametro_act_tesis_Rechazado, 800, 650)'>$img_act_tesis_Rechazado</button></td>";

                                        //echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
                                        echo "</tr>";
                                        $total2++;
                                    }
                                    echo "</tbody></table>";
                                    echo "<center><font color='red' size='3'>Total registros: $total2</font><br></center>";
                                    extract($_GET);
                                    ?>

                            </div>
                        </div>

                    </div>
                </div>
                <div id="cpestana6">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">


                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="6">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">

                                    <?php
                                    $total3 = 0;

                                    $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%' and (terminado!=0 and terminado != 6 and terminado !=2 and terminado !=7) and (fecha_aprob_propuesta between '$fecha' and '$nuevafecha' or fecha_ent_anteproyecto between '$fecha' and '$nuevafecha' or proyecto between '$fecha ' and '$nuevafecha')  ORDER BY  ID_tesis DESC");
                                    $query = mysqli_query($mysqli, $sql);
                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Disposiciones</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Msg</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else if ($arreglo[6] == "Certificado de Notas") {
                                                $alma = "./certinotas";
                                            } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                $alma = "./certimat";
                                            } else if ($arreglo[6] == "Prorroga") {
                                                $alma = "./prorrogas";
                                            } else {
                                                $alma = "./otros";
                                            }
                                            echo "<tr>";
                                            echo "<td><p>$arreglo[3]</p></td>";

                                            //Validacion para color del estado
                                            if ($arreglo[6] == 'Entrega Propuesta') {
                                                echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Proyecto') {
                                                echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";
                                            } else {
                                                echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";
                                            }
                                            //Fin Validacion para color del estado

                                            echo "<td>$arreglo[7]</td>";
                                            echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";

                                            $direccion_act_tesis_Vencer = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Vencer = '"id=';
                                            $parametro_act_tesis_Vencer = $arreglo[0] . '"';
                                            $img_act_tesis_Vencer = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Vencer, $complemento_act_tesis_Vencer$parametro_act_tesis_Vencer, 800, 650)'>$img_act_tesis_Vencer</button></td>";

                                            // echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_enviar_msg_vencer = '"pages/enviar_msg_vencer.php?"';
                                            $complemento_enviar_msg_vencer = '"id=';
                                            $parametro_enviar_msg_vencer = $arreglo[0] . '"';
                                            $img_enviar_msg_vencer = "<img src='images/msg.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_enviar_msg_vencer, $complemento_enviar_msg_vencer$parametro_enviar_msg_vencer, 800, 650)'>$img_enviar_msg_vencer</button></td>";

                                            // echo "<td><a href='enviar_msg_vencer.php?ID_estudiante=$arreglo[1]&programa=$programa'><img src='../images/msg.png' width='30'  height='30' class='img-rounded'</td>";
                                            echo "</tr>";
                                            $total3++;
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total3</font><br></center>";
                                        extract($_GET);
                                        ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="cpestana7">

                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">


                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="7">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">

                                    <?php
                                    $total4 = 0;

                                    $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%' and (terminado=6 or terminado=0) and observaciones='Por definir' and aprob_dir='' and ID_directores!='No aplica' and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
                                    // $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%'  and programa='$programa' and (terminado=6 or terminado=0) and observaciones='Por definir' and aprob_dir='' and ID_directores!='No aplica' and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
                                    $query = mysqli_query($mysqli, $sql);
                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col">Director</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Propuesta</th>
                                                <th scope="col">Editar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else if ($arreglo[6] == "Certificado de Notas") {
                                                $alma = "./certinotas";
                                            } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                $alma = "./certimat";
                                            } else if ($arreglo[6] == "Prorroga") {
                                                $alma = "./prorrogas";
                                            } else {
                                                $alma = "./otros";
                                            }
                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</td>";
                                            echo "<td>$arreglo[5]</td>";

                                            //Validacion para color del estado
                                            if ($arreglo[6] == 'Entrega Propuesta') {
                                                echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Proyecto') {
                                                echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";
                                            } else {
                                                echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";
                                            }
                                            //Fin Validacion para color del estado

                                            echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                                            echo "<td>$arreglo[9]</td>";

                                            $direccion_act_tesis_VoBo = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_VoBo = '"id=';
                                            $parametro_act_tesis_VoBo = $arreglo[0] . '"';
                                            $img_act_tesis_VoBo = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_VoBo, $complemento_act_tesis_VoBo$parametro_act_tesis_VoBo, 800, 650)'>$img_act_tesis_VoBo</button></td>";

                                            //echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
                                            echo "</tr>";
                                            $total4++;
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
                                        extract($_GET);

                                        ?>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div id="cpestana8">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="8">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">

                                    <?php
                                    $total4 = 0;

                                    //ToDo: Delete Query
                                    $sql = ("SELECT * FROM tesis where titulo_tesis like '%$buscar%'and (ID_estado='Prorroga' or ID_estado='Solicitud opción de grado' or ID_estado='Renuncia al Proyecto' or ID_estado='Certificado de Notas' or ID_estado='Cancelar Anteproyecto' or ID_estado='Cancelar Proyecto' or ID_estado='Certificado terminacion Materias' or ID_estado='Cancelar Propuesta' or ID_estado='Solicitud opción de grado') and terminado=0 ORDER BY  ID_tesis DESC");
                                    //$sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%'  and (ID_estado='Prorroga' or ID_estado='Solicitud opción de grado' or ID_estado='Renuncia al Proyecto' or ID_estado='Certificado de Notas' or ID_estado='Cancelar Anteproyecto' or ID_estado='Cancelar Proyecto' or ID_estado='Certificado terminacion Materias' or ID_estado='Cancelar Propuesta' or ID_estado='Solicitud opción de grado') and programa='$programa' and terminado=0 ORDER BY  ID_tesis DESC");
                                    $query = mysqli_query($mysqli, $sql);

                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Fecha Registro</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";

                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else if ($arreglo[6] == "Certificado de Notas") {
                                                $alma = "./certinotas";
                                            } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                $alma = "./certimat";
                                            } else if ($arreglo[6] == "Prorroga") {
                                                $alma = "./prorrogas";
                                            } else {
                                                $alma = "./otros";
                                            }
                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</td>";

                                            //Validacion para color del estado
                                            if ($arreglo[6] == 'Entrega Propuesta') {
                                                echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";
                                            } else if ($arreglo[6] == 'Entrega Proyecto') {
                                                echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";
                                            } else {
                                                echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";
                                            }
                                            //Fin Validacion para color del estado

                                            echo "<td > <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                                            echo "<td>$arreglo[9]</td>";

                                            $direccion_act_tesis_Otros = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Otros = '"id=';
                                            $parametro_act_tesis_Otros = $arreglo[0] . '"';
                                            $img_act_tesis_Otros = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Otros, $complemento_act_tesis_Otros$parametro_act_tesis_Otros, 800, 650)'>$img_act_tesis_Otros</button></td>";

                                            // echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_elim_tesis_Otros = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Otros = '"id=';
                                            $parametro_elim_tesis_Otros = $arreglo[0] . '"';
                                            $img_elim_tesis_Otros = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Otros, $complemento_elim_tesis_Otros$parametro_elim_tesis_Otros, 900, 650)'>$img_elim_tesis_Otros</button></td>";

                                            // echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
                                            echo "</tr>";
                                            $total4++;
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
                                        extract($_GET);
                                        ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="cpestana9">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="9">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <?php
                                    $total = 0;
                                    //ToDo: Delete query
                                    $sql = ("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and ID_Estudiante2=1  and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
                                    //$sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%'  and programa='$programa' and ID_Estudiante2=1  and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
                                    $query = mysqli_query($mysqli, $sql);
                                    ?>
                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col">Director</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Disposiciones</th>
                                                <th scope="col">CIFI</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            $ID_tesis = $arreglo[0];

                                            /*$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
				                               $query=mysqli_query($mysqli,$sql);
				                               while($arreglo1=mysqli_fetch_array($query)){
				                                $certi_CIFI=$arreglo1[5];
				                                
				                               }*/
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else {
                                                $alma = "./otros";
                                            }

                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</td>";
                                            echo "<td>$arreglo[5]</td>";
                                            echo "<td>$arreglo[6]</td>";

                                            //Validacion Color estado
                                            if ($arreglo[7] != 'Por definir') {
                                                echo "<td><font color='green'>$arreglo[7]</font></td>";
                                            } else {
                                                echo "<td>$arreglo[7]</td>";
                                            }
                                            //Fin Validacion Color estado

                                            echo "<td></td>";
                                            echo "<td > <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";

                                            $direccion_act_tesis_Semillero = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Semillero = '"id=';
                                            $parametro_act_tesis_Semillero = $arreglo[0] . '"';
                                            $img_act_tesis_Semillero = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Semillero, $complemento_act_tesis_Semillero$parametro_act_tesis_Semillero, 800, 650)'>$img_act_tesis_Semillero</button></td>";
                                            //echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_elim_tesis_Semillero = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Semillero = '"id=';
                                            $parametro_elim_tesis_Semillero = $arreglo[0] . '"';
                                            $img_elim_tesis_Semillero = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Semillero, $complemento_elim_tesis_Semillero$parametro_elim_tesis_Semillero, 900, 650)'>$img_elim_tesis_Semillero</button></td>";
                                            //echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";

                                            echo "</tr>";
                                            $total++;
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";

                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cpestana10">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="10">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <?php
                                    $total4 = 0;
                                    $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%' and ID_Estudiante2=4  ORDER BY  ID_tesis DESC");
                                    // $sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%'  and programa='$programa' and ID_Estudiante2=4  ORDER BY  ID_tesis DESC");
                                    $query = mysqli_query($mysqli, $sql);

                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Fecha Registro</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else if ($arreglo[6] == "Certificado de Notas") {
                                                $alma = "./certinotas";
                                            } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                $alma = "./certimat";
                                            } else if ($arreglo[6] == "Prorroga") {
                                                $alma = "./prorrogas";
                                            } else {
                                                $alma = "./otros";
                                            }

                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</td>";
                                            //Validacion Color estado
                                            if ($arreglo[7] != 'Por definir') {
                                                echo "<td><font color='green'>$arreglo[6]</font></td>";
                                            } else {
                                                echo "<td>$arreglo[6]</td>";
                                            }
                                            //Fin Validacion Color estado
                                            echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                                            echo "<td>$arreglo[9]</td>";

                                            $direccion_act_tesis_Postgrado = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Postgrado = '"id=';
                                            $parametro_act_tesis_Postgrado = $arreglo[0] . '"';
                                            $img_act_tesis_Postgrado = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Postgrado, $complemento_act_tesis_Postgrado$parametro_act_tesis_Postgrado, 800, 650)'>$img_act_tesis_Postgrado</button></td>";
                                            //echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_elim_tesis_Postgrado = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Postgrado = '"id=';
                                            $parametro_elim_tesis_Postgrado = $arreglo[0] . '"';
                                            $img_elim_tesis_Postgrado = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Postgrado, $complemento_elim_tesis_Postgrado$parametro_elim_tesis_Postgrado, 900, 650)'>$img_elim_tesis_Postgrado</button></td>";
                                            //echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";

                                            echo "</tr>";


                                            $total4++;
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
                                        extract($_GET);

                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cpestana11">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="11">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <?php
                                    $total = 0;
                                    //ToDo: Delete query
                                    $sql = ("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and ID_Estudiante2=3 and (ID_estado='Entrega Monografia' or ID_estado='Entrega Propuesta' or ID_estado='Correccion Propuesta' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto' or ID_estado='Entrega Anteproyecto' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");

                                    //$sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%' and programa='$programa' and ID_Estudiante2=3 and (ID_estado='Entrega Monografia' or ID_estado='Entrega Propuesta' or ID_estado='Correccion Propuesta' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto' or ID_estado='Entrega Anteproyecto' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
                                    $query = mysqli_query($mysqli, $sql);
                                    $certi_CIFI = ""; //ToDo            
                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Disposiciones</th>
                                                <th scope="col">CIFI</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            $ID_tesis = $arreglo[0];

                                            /*	$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
				                                $query=mysqli_query($mysqli,$sql);
				                                while($arreglo1=mysqli_fetch_array($query)){
				                                 $certi_CIFI=$arreglo1[5];
				                                 
				                                }*/
                                            if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                $alma = "./proyectos";
                                            } else {
                                                $alma = "./otros";
                                            }
                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</td>";
                                            echo "<td>$arreglo[6]</td>";
                                            echo "<td>$arreglo[7]</td>";
                                            echo "<td>$certi_CIFI</td>";
                                            echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";

                                            $direccion_act_tesis_Auxiliar = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Auxiliar = '"id=';
                                            $parametro_act_tesis_Auxiliar = $arreglo[0] . '"';
                                            $img_act_tesis_Auxiliar = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Auxiliar, $complemento_act_tesis_Auxiliar$parametro_act_tesis_Auxiliar, 800, 650)'>$img_act_tesis_Auxiliar</button></td>";
                                            //echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_elim_tesis_Auxiliar = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Auxiliar = '"id=';
                                            $parametro_elim_tesis_Auxiliar = $arreglo[0] . '"';
                                            $img_elim_tesis_Auxiliar = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Auxiliar, $complemento_elim_tesis_Auxiliar$parametro_elim_tesis_Auxiliar, 900, 650)'>$img_elim_tesis_Auxiliar</button></td>";
                                            //echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";

                                            echo "</tr>";
                                            $total++;
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";

                                        ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div id="cpestana12">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="12">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <?php
                                    $total = 0;
                                    //ToDo: Delete query
                                    $sql = ("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and ID_Estudiante2=2 and (ID_estado='Entrega Monografia' or ID_estado='Correccion Monografia' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
                                    //$sql = ("SELECT * FROM tesis  where titulo_tesis like '%$buscar%' and  programa='$programa' and ID_Estudiante2=2 and (ID_estado='Entrega Monografia' or ID_estado='Correccion Monografia' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
                                    $query = mysqli_query($mysqli, $sql);
                                    $certi_CIFI = ""; //ToDo            
                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Disposiciones</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $titu = $arreglo[3];
                                            if ($arreglo[6] == "Entrega Propuesta") {
                                                $alma = "./propuestas";
                                            } else if ($arreglo[6] == "Entrega Anteproyecto") {
                                                $alma = "./anteproyectos";
                                            } else if ($arreglo[6] == "Entrega Proyecto") {
                                                $alma = "./proyectos";
                                            } else {
                                                $alma = "./otros";
                                            }
                                            echo "<tr>";
                                            echo "<td>$arreglo[3]</td>";
                                            echo "<td>$arreglo[6]</td>";
                                            echo "<td>$arreglo[7]</td>";
                                            echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";

                                            $direccion_act_tesis_Curso = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Curso = '"id=';
                                            $parametro_act_tesis_Curso = $arreglo[0] . '"';
                                            $img_act_tesis_Curso = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Curso, $complemento_act_tesis_Curso$parametro_act_tesis_Curso, 800, 650)'>$img_act_tesis_Curso</button></td>";
                                            //echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_elim_tesis_Curso = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Curso = '"id=';
                                            $parametro_elim_tesis_Curso = $arreglo[0] . '"';
                                            $img_elim_tesis_Curso = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Curso, $complemento_elim_tesis_Curso$parametro_elim_tesis_Curso, 900, 650)'>$img_elim_tesis_Curso</button></td>";
                                            //echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";


                                            echo "</tr>";
                                            $total++;
                                        }
                                        echo "</tbody></table>";
                                        echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";

                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cpestana13">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <div class="row">

                                    <?php
                                    $total4 = 0;


                                    $sql = ("SELECT * FROM actas where programa='$programa' ORDER BY  numero DESC");
                                    $query = mysqli_query($mysqli, $sql);

                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Acta No.</th>
                                                <th scope="col">Fecha Publicación</th>
                                                <th scope="col">Ver Acta</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {

                                            echo "<tr>";
                                            echo "<td >$arreglo[1]</td>";
                                            echo "<td>$arreglo[4]</td>";
                                            echo "<td><a href='pdf/$arreglo[6]'><img src='images/pdf.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_elim_acta_coor = '"pages/elim_acta_coor.php?"';
                                            $complemento1_elim_acta_coor = '"numero=';
                                            $complemento2_elim_acta_coor = 'id=';
                                            $parametro1_elim_acta_coor = $complemento1_elim_acta_coor . $arreglo[1] . '&' . $complemento2_elim_acta_coor . $arreglo[0] . '"';
                                            $img_elim_acta_coor = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_acta_coor, $parametro1_elim_acta_coor , 900, 650)'>$img_elim_acta_coor</button></td>";
                                            // echo "<td><a href='elim_acta_coor.php?numero=$arreglo[1]&id=$arreglo[0]&programa=$programa'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody></table>";
                                        ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cpestana14">
                    <div class="card card-warning">
                        <div class="box-body table-responsive no-padding">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Buscar por titulo:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <input type="submit" value="Buscar" class="btn btn-dark">
                                                </div>
                                                <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                                <input type="text" style="display: none;" class="form-control" name="pes" value="14">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">

                                    <?php
                                    $total = 0;
                                    //ToDo: Delete query
                                    $sql = ("SELECT * FROM tesis where  Titulo_tesis like '%$buscar%' ORDER BY  ID_tesis DESC LIMIT 20");
                                    $query = mysqli_query($mysqli, $sql);
                                    ?>

                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Estudiante</th>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $Correo = $arreglo[4];
                                            echo "<tr>";
                                            echo "<tr>";
                                            echo "<td >$arreglo[0]</td>";

                                            require("../connect_db.php");
                                            $sql2 = ("SELECT * FROM login where id='$arreglo[1]'");
                                            $query2 = mysqli_query($mysqli, $sql2);
                                            while ($arregloe = mysqli_fetch_array($query2)) {
                                                utf8_decode($nombre = $arregloe[3]);
                                                $arreglo[1] = $nombre;
                                            }

                                            echo "<td>$arreglo[1]</td>";


                                            //echo "<td>$arreglo[2]</td>";
                                            echo "<td>$arreglo[3]</td>";
                                            echo "<td>$arreglo[6]</td>";
                                            /*echo "<td>".utf8_decode("$arreglo[4]")."</td>";
                                             echo "<td>$arreglo[10]</td>";
                                             echo "<td>$arreglo[11]</td>";
                                             echo "<td>$arreglo[12]</td>";*/
                                            /*echo "<td><a href='actualizarusercoor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";*/

                                            $direccion_act_tesis_Buscar = '"pages/act_tesis_coor.php?"';
                                            $complemento_act_tesis_Buscar = '"id=';
                                            $parametro_act_tesis_Buscar = $arreglo[0] . '"';
                                            $img_act_tesis_Buscar = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_act_tesis_Buscar, $complemento_act_tesis_Buscar$parametro_act_tesis_Buscar, 800, 650)'>$img_act_tesis_Buscar</button></td>";
                                            //echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                                            $direccion_elim_tesis_Buscar = '"pages/elim_tesis_coor.php?"';
                                            $complemento_elim_tesis_Buscar = '"id=';
                                            $parametro_elim_tesis_Buscar = $arreglo[0] . '"';
                                            $img_elim_tesis_Buscar = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_tesis_Buscar, $complemento_elim_tesis_Buscar$parametro_elim_tesis_Buscar, 900, 650)'>$img_elim_tesis_Buscar</button></td>";
                                            //echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";

                                            /*echo "<td><a href='estado_est.php?est=$arreglo[0]'><img src='images/user.png' width='40'  height='40' class='img-rounded'</td>";
                           echo "</tr>";*/
                                            $total = $total + 1;
                                        }
                                        echo "</tbody></table>";
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="cpestana15">
                    <div class="card card-warning">

                        <div class="card-body">
                            <form autocomplete="off">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Buscar por nombre:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input type="submit" value="Buscar" class="btn btn-dark">
                                            </div>
                                            <input type="text" class="form-control" name="buscar" value="<?php echo $buscar ?>">
                                            <input type="text" style="display: none;" class="form-control" name="pes" value="15">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <?php
                                $total = 0;

                                $sql = ("SELECT * FROM login where  user like '%$buscar%' and tipoUsuario='Estudiante' ORDER BY  Id DESC");
                                $query = mysqli_query($mysqli, $sql);

                                ?>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Cedula</th>
                                                <th scope="col">Tipo Usuario</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Telefono</th>
                                                <th scope="col">Programa</th>
                                                <th scope="col">Fc Nacimiento</th>
                                                <th scope="col">Borrar</th>
                                                <th scope="col">Msg</th>
                                                <th scope="col">Estado</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        echo "<tbody>";
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $Correo = $arreglo[4];
                                            echo "<tr>";
                                            echo "<td>$arreglo[0]</td>";
                                            echo "<td>$arreglo[1]</td>";
                                            echo "<td>$arreglo[2]</td>";
                                            echo "<td>$arreglo[3]</td>";
                                            echo "<td>" . utf8_decode("$arreglo[4]") . "</td>";
                                            echo "<td>$arreglo[10]</td>";
                                            echo "<td>$arreglo[11]</td>";
                                            echo "<td>$arreglo[12]</td>";
                                            /*echo "<td><a href='actualizarusercoor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";*/

                                            //
                                            $direccion_elim_user_coorp_ListEstudiante = '"pages/elim_user_coorp.php?"';
                                            $complemento_elim_user_coorp_ListEstudiante = '"id=';
                                            $parametro_elim_user_coorp_ListEstudiante = $arreglo[0] . '"';
                                            $img_elim_user_coorp_ListEstudiante = "<img src='images/eliminar.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_elim_user_coorp_ListEstudiante, $complemento_elim_user_coorp_ListEstudiante$parametro_elim_user_coorp_ListEstudiante, 800, 650)'>$img_elim_user_coorp_ListEstudiante</button></td>";
                                            //echo "<td><a href='elim_user_coorp.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";

                                            $direccion_enviar_msg_coor_ListEstudiante = '"pages/enviar_msg_coor.php?"';
                                            $complemento_enviar_msg_coor_ListEstudiante = '"id=';
                                            $parametro_enviar_msg_coor_ListEstudiante = $arreglo[0] . '"';
                                            $img_enviar_msg_coor_ListEstudiante = "<img src='images/msg.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_enviar_msg_coor_ListEstudiante, $complemento_enviar_msg_coor_ListEstudiante$parametro_enviar_msg_coor_ListEstudiante, 900, 650)'>$img_enviar_msg_coor_ListEstudiante</button></td>";
                                            // echo "<td><a href='enviar_msg_coor.php?Correo=$arreglo[4]&programa=$programa'><img src='../images/msg.png' width='30'  height='30' class='img-rounded'</td>";

                                            $direccion_estado_est_ListEstudiante = '"pages/estado_est.php?"';
                                            $complemento_estado_est_ListEstudiante = '"id=';
                                            $parametro_estado_est_ListEstudiante = $arreglo[0] . '"';
                                            $img_estado_est_ListEstudiante = "<img src='images/user.png' width='30'  height='30' class='img-rounded'>";

                                            echo "<td><button onclick='CenterWindow($direccion_estado_est_ListEstudiante, $complemento_estado_est_ListEstudiante$parametro_estado_est_ListEstudiante, 900, 650)'>$img_estado_est_ListEstudiante</button></td>";
                                            //echo "<td><a href='estado_est.php?est=$arreglo[0]'><img src='../images/user.png' width='30'  height='30' class='img-rounded'</td>";
                                            //

                                            echo "</tr>";
                                            $total = $total + 1;
                                        }
                                        echo "</tbody></table>";

                                        ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>2020</b>
        </div>
        <strong>Universidad Libre - <a href="Universidad Libre">SI-COMMITEE</a>.</strong>
    </footer>

</div>



</body>

</html>