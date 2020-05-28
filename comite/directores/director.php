<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../Login/index.html");
}
date_default_timezone_set('America/Bogota');
$fecha = date("d-m-Y H:i:s");
$pr = $_SESSION['id'];
$jur = $_SESSION['user'];
$asd = 0;

extract($_GET);
require("../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);

while ($arreglo = mysqli_fetch_array($query)) {
    $programa = $arreglo[11];
    if ($arreglo[2] != 'Director') {
        require("../desconectar.php");
        header("Location:../Login/index.html");
    }
}

$dir = $_SESSION['user'];

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Director</title>
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


    <!---->
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

    <script type="text/javascript" src="js/cambiarPestanna.js"></script>
    <script type="text/javascript" src="js/EditarTesis.js"></script>




</head>
<style>
    .white {
        color: white;
    }
</style>

<body onload="javascript:cambiarPestanna(pestanas,pestana1);" class="hold-transition sidebar-mini">

    <div class="loader"></div>
    <!--Formulario Start-->


    <!--FormularioEnd-->
    <div class="wrapper">
        <!-- Navbar -->
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

                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" style="color: white">Home</a>
                </li> -->

            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            -->

            <!-- Right navbar links -->
            <!--<ul class="navbar-nav ml-auto">-->
            <!-- Messages Dropdown Menu -->

            <!--<li class="nav-item">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../desconectar.php" class="nav-link" style="color: white">Cerrar Sesión</a>
            </li>
            </li>
            </ul>-->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
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
                                <a href='javascript:cambiarPestanna(pestanas,pestana1);' class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        VoBo
                                    </p>
                                </a>
                            </li>
                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);' class="nav-link">
                                    <i class="nav-icon fa fa-edit white"></i>
                                    <p class="white">
                                        Dirección
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana3);" class="nav-link">
                                    <i class="nav-icon fas fa-copy white"></i>
                                    <p class="white">
                                        Monografias/Poster
                                    </p>
                                </a>
                            </li>
                            <li id="pestana4" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana4);" class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Anteproyectos
                                    </p>
                                </a>
                            </li>
                            <li id="pestana5" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana5);" class="nav-link">
                                    <i class="nav-icon fas fa-copy white"></i>
                                    <p class="white">
                                        Proyectos
                                    </p>
                                </a>
                            </li>
                            <li id="pestana6" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana6);" class="nav-link">
                                    <i class="nav-icon fa fa-edit white"></i>
                                    <p class="white">
                                        Evaluados
                                    </p>
                                </a>
                            </li>
                            <li id="pestana7" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana7);" class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas de Comité
                                    </p>
                                </a>
                            </li>
                            <li id="pestana8" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana8);" class="nav-link">
                                    <i class="nav-icon fa fa-edit white"></i>
                                    <p class="white">
                                        Act. Datos
                                    </p>
                                </a>
                            </li>
                            <li id="pestana9" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana9);" class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Ayuda
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 id="Text">Monografías/Poster para Evaluar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="director.php">Home</a></li>
                                <li id="Guia" class="breadcrumb-item active">Documentos Registrados</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>



            <section class="content">


                <!--  <div class="row">
                        <div class="col-12"> -->
                <div id="contenidopestanas">
                    <!--Empieza pestana1-->
                    <div id="cpestana1">

                        <!--Start-->

                        <div class="card card-warning">

                            <div class="card-body">

                                <?php

                                require("../connect_db.php");
                                $total = 0;
                                $sql = ("SELECT * FROM tesis where ID_directores='$dir' and Aprob_Dir='' ORDER BY id_tesis DESC ");
                                $query = mysqli_query($mysqli, $sql);
                                //var_dump($query);
                                ?>

                                <div class="box">

                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>

                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Aprob_Dir</th>
                                                    <th>Documento</th>
                                                    <th>Fecha_Entrega</th>
                                                    <th>Archivo</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                $total1 = 0;
                                                while ($arreglo = mysqli_fetch_array($query)) {
                                                    $id = $arreglo[1];
                                                    $titu = $arreglo[3];

                                                    // var_dump($arreglo);
                                                    if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $total1++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <?php

                                                        if ($arreglo[4] != "" and $total == 0) {
                                                            ++$total;
                                                        ?>
                                                            <td><?php echo "$arreglo[4] "; ?> </td>
                                                            <div class="alert alert-info"><strong>¡Atención!</strong> usted
                                                                tiene <strong>direcciones</strong> por aprobar y
                                                                <strong>documentos</strong> por evaluar...</div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><?php echo "$arreglo[4]"; ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?php echo "$arreglo[6] "; ?> </td>
                                                        <td><?php echo "$arreglo[9] "; ?></td>
                                                        <!--<td><?php echo "$arreglo[12]"; ?></td>-->
                                                        <td>
                                                            <?php echo "<a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> "; ?>
                                                        </td>
                                                        <td>
                                                            <?php //echo "<a href='actualizartesisdir.php?id=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                            ?>
                                                            <?php

                                                            $direccion = '"pages/actualizartesisdir.php?"';
                                                            $complemento = '"id="';
                                                            $parametro = $arreglo[0];
                                                            //$name = '"name"';
                                                            $img = "<img src='images/actualizar.png' width='30' height='30' class='img-rounded'></img>";

                                                            echo "<button onclick='CenterWindow($direccion, $complemento+$parametro, 600, 600);'>$img</button>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php echo "<center><font color='red' size='3'>Total registros: $total1</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                        <!--End-->
                    </div>
                    <!--termina pestana1-->
                    <div id="cpestana2">

                        <!--Start-->

                        <div class="card card-warning">

                            <div class="card-body">

                                <?php

                                require("../connect_db.php");
                                $total = 0;
                                $sql = ("SELECT * FROM tesis where ID_directores='$dir' and terminado!=2 and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  fecha_aprob_propuesta");
                                $query = mysqli_query($mysqli, $sql);
                                //var_dump($query);


                                ?>

                                <div class="box">
                                    <!--    <div class="box-header">
                                            <h3 class="box-title">Responsive Hover Table</h3>


                                        </div> -->
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>

                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Aprob_Dir</th>
                                                    <th>Documento</th>
                                                    <th>Fecha_Entrega</th>
                                                    <th>Archivo</th>
                                                    <!--<th>Editar</th>  -->
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                $total1 = 0;
                                                while ($arreglo = mysqli_fetch_array($query)) {
                                                    $id = $arreglo[1];
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
                                                    $total1++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <?php

                                                        if ($arreglo[4] != "" and $total == 0) {
                                                            ++$total;
                                                        ?>
                                                            <td><?php echo "$arreglo[4] "; ?> </td>
                                                            <div class="alert alert-info"><strong>¡Atención!</strong> usted
                                                                tiene <strong>direcciones</strong> por aprobar y
                                                                <strong>documentos</strong> por evaluar...</div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><?php echo "$arreglo[4]"; ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?php echo "$arreglo[6] "; ?> </td>
                                                        <td><?php echo "$arreglo[9] "; ?></td>
                                                        <!--<td><?php echo "$arreglo[12]"; ?></td>-->
                                                        <td>
                                                            <?php echo "<a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> "; ?>
                                                        </td>
                                                        <!--<td>
                                                            <?php //echo "<a href='actualizartesisdir.php?id=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                            ?>
                                                            <?php

                                                            $direccion = '"pages/actualizartesisdir.php?"';
                                                            $complemento = '"id="';
                                                            $parametro = $arreglo[0];
                                                            $name = '"name"';
                                                            $img = "<img src='images/actualizar.png' width='30' height='30' class='img-rounded'></img>";

                                                            echo "<button onclick='CenterWindow($direccion, $complemento+$parametro);'>$img</button>";

                                                            //  <img src='images/actualizar.png' width='30' height='30' class='img-rounded'></img>
                                                            ?>
                                                        </td>-->

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php echo "<center><font color='red' size='3'>Total registros: $total1</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>


                            </div>


                        </div>






                        <!--End-->



                    </div>
                    <!--Termina pestana2-->
                    <!--Empieza pestana3-->
                    <div id="cpestana3">


                        <div class="card card-warning">



                            <div class="card-body">

                                <?php

                                require("../connect_db.php");
                                $total = 0;
                                $totalm = 0;
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and (ID_estado='Entrega Monografia' or ID_estado='Entrega Poster' or ID_estado='Correccion Monografia') and terminado!=2 ORDER BY id_tesis DESC ");

                                $query = mysqli_query($mysqli, $sql);
                                //var_dump($sql);
                                ?>

                                <div class="box">
                                    <!--    <div class="box-header">
                                            <h3 class="box-title">Responsive Hover Table</h3>


                                        </div> -->
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>

                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Director</th>
                                                    <th>Estado</th>
                                                    <th>Fecha_Aprob</th>
                                                    <th>Archivo</th>
                                                    <th>Evaluar</th>
                                                    <th>Modificar</th>
                                                    <th>Ver Eval</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                while ($arreglo = mysqli_fetch_array($query)) {


                                                    if ($arreglo[6] == "Entrega Monografia") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $ide = $arreglo[0];
                                                    $totalm++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <td><?php echo "$arreglo[5] "; ?></td>
                                                        <td><?php echo "$arreglo[6] "; ?></td>
                                                        <td><?php echo "$arreglo[10] "; ?></td>
                                                        <td>
                                                            <?php echo "<a href='$alma/$arreglo[8] ' target='_blank'>$arreglo[8]</a> "; ?>
                                                        </td>
                                                        <?php
                                                        require("../connect_db.php");
                                                        $sql = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        //var_dump($sql);
                                                        $ressql = mysqli_query($mysqli, $sql);
                                                        while ($row = mysqli_fetch_row($ressql)) {
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                        ?>
                                                            <td>EVALUADO</td>
                                                            <td>
                                                                <?php //echo "<a href='act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                                ?>
                                                                <?php

                                                                $direccion = '"pages/act_evaluacionposter.php?"';

                                                                $parametro = '"id=' . $row[0] . '&jurado=' . $dir . '&ID_tesis=' . $arreglo[0] . '"';
                                                                //$name = '"name"';
                                                                $img = '<img src="images/actualizar.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "<button onclick='CenterWindow($direccion, $parametro, 600, 600);'>$img</button>";
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded';" ?>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($asd != $ide) {
                                                        ?>
                                                            <td>
                                                                <?php //echo "<a href='evaluarposter.php?id=$arreglo[0]&jurado=$dir'><img src='images/evalua.png'  width='30'  height='30' class='img-rounded';"
                                                                ?>
                                                                <?php

                                                                $direccion = '"pages/evaluartesis.php?"';

                                                                $parametro = '"id=' . $row[0] . '&jurado=' . $dir . '&ID_tesis=' . $arreglo[0] . '"';
                                                                //$name = '"name"';

                                                                $img = '<img src="images/actualizar.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "<button onclick='CenterWindow($direccion, $parametro, 1000, 600);'>$img</button>";

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <img src='images/actualizar.png' width='30' height='30' class='img-rounded'>
                                                            </td>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tr>
                                            </tbody>
                                        </table>
                                        <?php echo "<center><font color='red' size='3'>Total registros: $totalm</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>



                    </div>
                    <!--Termina pestana3-->
                    <!--Empieza pestana4-->
                    <div id="cpestana4">


                        <div class="card card-warning">
                            <div class="card-body">

                                <?php

                                $total2 = 0;
                                //echo $total2;
                                require("../connect_db.php");
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and terminado!=2 and (ID_estado='Entrega Anteproyecto' or ID_estado='Correccion Anteproyecto') ORDER BY  id_tesis DESC ");


                                $query = mysqli_query($mysqli, $sql);
                                ?>

                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>

                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Director</th>
                                                    <th>Estado</th>
                                                    <th>Fecha_Aprob</th>
                                                    <th>Archivo</th>
                                                    <th>Evaluar</th>
                                                    <th>Modificar</th>
                                                    <th>Eval</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                while ($arreglo = mysqli_fetch_array($query)) {

                                                    if ($arreglo[6] == "Entrega Propuesta") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $ide = $arreglo[0];
                                                    $total2++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <td><?php echo "$arreglo[5] "; ?></td>
                                                        <td><?php echo "$arreglo[6] "; ?></td>
                                                        <td><?php echo "$arreglo[10] "; ?></td>
                                                        <td>
                                                            <?php echo "<a href='$alma/$arreglo[8] ' target='_blank'>$arreglo[8] </a> "; ?>
                                                        </td>
                                                        <?php
                                                        require("../connect_db.php");
                                                        $sql = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        //echo $sql;
                                                        $ressql = mysqli_query($mysqli, $sql);

                                                        while ($row = mysqli_fetch_row($ressql)) {
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];


                                                        ?>

                                                            <td>EVALUADO</td>
                                                            <td>
                                                                <?php //echo "<a href='act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                                ?>
                                                                <?php

                                                                $direccion = '"pages/act_evaluacion.php?"';
                                                                $parametro = '"id=' . $row[0] . '&jurado=' . $dir . '&ID_tesis=' . $arreglo[0] . '"';
                                                                $img = '<img src="images/actualizar.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "<button onclick='CenterWindow($direccion, $parametro, 1000, 600);'>$img</button>";
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='25'  height='35'  class='img-rounded';" ?>
                                                            </td>

                                                        <?php
                                                        }
                                                        ?>


                                                        <?php


                                                        if ($asd != $ide) {
                                                        ?>
                                                            <td>

                                                                <?php
                                                                $direccion = '"pages/evaluartesis.php?"';
                                                                $parametro = '"id=' . $arreglo[0] . '&jur=' . $dir . '"';
                                                                $img = '<img src="images/evalua.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "
                                                                    <script>
                                                                    var alto = screen.height;
                                                                    var ancho = screen.width;
                                                                    </script>
                                                                    
                                                                    <button onclick='CenterWindow($direccion, $parametro, ancho, alto);'>$img</button>
                                                                    ";
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <img src='images/actualizar.png' width='30' height='30' class='img-rounded'>
                                                            </td>
                                                    <?php


                                                        }
                                                    }
                                                    ?>
                                                    </tr>
                                            </tbody>
                                        </table>

                                        <?php

                                        echo "<center><font color='red' size='3'>Total registros: $total2</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Termina pestana4-->
                    <!--Empieza pestana5-->
                    <div id="cpestana5">


                        <div class="card card-warning">
                            <div class="card-body">

                                <?php
                                $totalp = 0;
                                require("../connect_db.php");
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur')  and (ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto') ORDER BY  id_tesis DESC");
                                $query = mysqli_query($mysqli, $sql);
                                ?>
                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>

                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Director</th>
                                                    <th>Estado</th>
                                                    <th>Fecha_Aprob</th>
                                                    <th>Archivo</th>
                                                    <th>Evaluar</th>
                                                    <th>Modificar</th>
                                                    <th>Eval</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                while ($arreglo = mysqli_fetch_array($query)) {
                                                    if ($arreglo[6] == "Entrega Propuesta") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $ide = $arreglo[0];
                                                    $totalp++;
                                                ?>

                                                    <tr>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <td><?php echo "$arreglo[5] "; ?></td>
                                                        <td><?php echo "$arreglo[6] "; ?></td>
                                                        <td><?php echo "$arreglo[10] "; ?></td>
                                                        <td>
                                                            <?php echo "<a href='$alma/$arreglo[8] ' target='_blank'>$arreglo[8] </a> "; ?>
                                                        </td>
                                                        <?php
                                                        require("../connect_db.php");
                                                        $sql = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        $ressql = mysqli_query($mysqli, $sql);
                                                        while ($row = mysqli_fetch_row($ressql)) {
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];
                                                        ?>

                                                            <td>EVALUADO</td>
                                                            <td>
                                                                <?php //echo "<a href='act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                                ?>
                                                                <?php

                                                                $direccion = '"pages/act_evaluacionpro.php?"';
                                                                $parametro = '"id=' . $row[0] . '&jurado=' . $dir . '&ID_tesis=' . $arreglo[0] . '"';
                                                                $img = '<img src="images/actualizar.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "<button onclick='CenterWindow($direccion, $parametro, 1000, 600);'>$img</button>";
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<a href='./pdf/verevalproy.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='25'  height='35'  class='img-rounded';" ?>
                                                            </td>
                                                        <?php
                                                        }

                                                        ?>

                                                        <?php
                                                        if ($asd != $ide) {

                                                        ?>
                                                            <td>
                                                                <?php
                                                                $direccion = '"pages/evaluartesispro.php?"';
                                                                $parametro = '"id=' . $arreglo[0] . '&jurado=' . $dir . '"';
                                                                $img = '<img src="images/evalua.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "
                                                                    <script>
                                                                    var alto = screen.height;
                                                                    var ancho = screen.width;
                                                                    </script>
                                                                    
                                                                    <button onclick='CenterWindow($direccion, $parametro, ancho, alto);'>$img</button>
                                                                    ";
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <img src='images/actualizar.png' width='30' height='30' class='img-rounded'>
                                                            </td>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tr>
                                            </tbody>
                                        </table>

                                        <?php

                                        echo "<center><font color='red' size='3'>Total registros: $totalp</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Termina pestana5-->
                    <!--Empieza pestana6-->
                    <div id="cpestana6">


                        <div class="card card-warning">
                            <div class="card-body">

                                <?php
                                require("../connect_db.php");
                                $total = 0;
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur')  and Aprob_Dir='SI'  ORDER BY  id_tesis DESC ");
                                $query = mysqli_query($mysqli, $sql);
                                ?>
                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>

                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Aprob_Dir</th>
                                                    <th>Documento</th>
                                                    <th>Fecha_Entrega</th>
                                                    <th>Archivo</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $total1 = 0;
                                                while ($arreglo = mysqli_fetch_array($query)) {
                                                    $id = $arreglo[1];
                                                    $titu = $arreglo[3];
                                                    if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $total1++;
                                                ?>

                                                    <tr>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <?php
                                                        if ($arreglo[4] != "" and $total == 0) {
                                                            ++$total;
                                                        ?>
                                                            <td><?php echo "$arreglo[4] "; ?></td>
                                                            <div class="alert alert-info">
                                                                <strong>¡Atención!</strong> usted tiene
                                                                <strong>direcciones</strong> por aprobar y
                                                                <strong>documentos</strong> proc_open
                                                                evaluar...
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><?php echo "$arreglo[4]"; ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?php echo "$arreglo[6]"; ?></td>
                                                        <td><?php echo "$arreglo[9]"; ?></td>
                                                        <!--<td><?php echo "$arreglo[12]"; ?></td>-->
                                                        <td><?php echo "<a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> "; ?>
                                                        </td>

                                                    </tr>

                                                <?php

                                                }
                                                ?>


                                            </tbody>
                                        </table>

                                        <?php
                                        echo "<center><font color='red' size='3'>Total registros: $total1</font><br></center>";
                                        ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Termina pestana6-->
                    <!--Empieza pestana7-->
                    <div id="cpestana7">


                        <div class="card card-warning">
                            <div class="card-body">

                                <?php
                                require("../connect_db.php");
                                $total = 0;
                                $sql = ("SELECT * FROM actas where programa='$programa' ORDER BY  numero DESC");
                                $query = mysqli_query($mysqli, $sql);
                                ?>
                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <?php
                                        echo "<table class='table table-hover'>";
                                        echo "<thead>";

                                        echo "<tr>";
                                        echo "<th>Acta No.</th>";
                                        echo "<th>Fecha Publicación</th>";
                                        echo "<th>Ver Acta</th>";
                                        echo "</tr>";

                                        echo "</thead>";

                                        ?>
                                        <?php
                                        while ($arreglo = mysqli_fetch_array($query)) {


                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>$arreglo[1]</td>";
                                            echo "<td>$arreglo[4]</td>";
                                            echo "<td><a href='pdf/$arreglo[6]'><img src='images/pdf.png' width='30'
                                                        height='40' class='img-rounded'></td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }

                                        echo "</table>";
                                        ?>

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Termina pestana7-->
                    <!--Empieza pestana8-->
                    <div id="cpestana8">


                        <div class="card card-warning">
                            <div class="card-body">
                                <?php
                                require("../connect_db.php");
                                $pr = $_SESSION['id'];
                                $sql = "SELECT * FROM login WHERE id=$pr";
                                $ressql = mysqli_query($mysqli, $sql);

                                while ($row = mysqli_fetch_row($ressql)) {
                                    $id = $row[0];
                                    $cedula = $row[1];
                                    $TipoUsuario = $row[2];
                                    $user = $row[3];
                                    $email = $row[4];
                                    $pasdir = $row[6];
                                    $telefono = $row[10];
                                    $programa = $row[11];
                                    $fechadenacimiento = $row[12];
                                }

                                ?>
                                <form id="loginForm2" action="pages/ejecu_act_datos_dir.php" method="post" enctype="multipart/form-data" role="form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <center>
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <input type="text" name="id" class="form-control" placeholder="id" value="<?php echo $id ?>" style="width: 50%" readonly="readonly">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Cedula</label>
                                                    <input type="text" name="cedula" value="<?php echo $cedula ?>" class="form-control" placeholder="Id Estudiante.." readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="user" value="<?php echo $user ?>" class="form-control" placeholder="Id Estudiante.." style="width: 50%" readonly="readonly">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <input type="text" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Id Estudiante.." readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" name="pasdir" value="<?php echo $pasdir ?>" class="form-control" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Tipo de Usuario</label>
                                                    <input type="text" name="TipoUsuario" value="<?php echo $TipoUsuario ?>" class="form-control" readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input type="text" name="telefono" value="<?php echo $telefono ?>" class="form-control" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Programa</label>
                                                    <input type="text" name="programa" value="<?php echo $programa ?>" class="form-control" placeholder="Id Estudiante.." readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Fecha de Nacimiento</label>
                                                    <input type="text" name="fechadenacimiento" value="<?php echo $fechadenacimiento ?>" class="form-control" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer">


                                <center> <button type="submit" id="login1" class="btn btn-primary mr-2" style="background-color: green; margin-bottom: 10px ">Guardar</button>
                                </center>




                            </div>


                            </form>
                        </div>
                    </div>
                    <!--Termina pestana8-->
                    <!--Empieza pestana9-->
                    <div id="cpestana9">


                        <div class="row">



                            <div class="col-md-6">
                                <div class="card card-warning">

                                    <div class="card-header" style="background-color: #343a40; color: white">
                                        <h5 class="card-title">Envianos un comentario</h5>
                                    </div>

                                    <div class="card-body">


                                        <form id="loginForm1" action="enviarmsgcoor.php" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <?php
                                                    $hoy = date("Y-m-d");;
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Fecha</label>
                                                        <input type="text" name="fecha" class="form-control" value="<?php echo $hoy; ?>" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Usuario</label>
                                                        <input type="text" name="user" class="form-control" placeholder="Nombre Estudiante.." value="<?php echo utf8_decode($_SESSION['user']); ?>" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Carrera</label>
                                                        <input type="text" name="programa" class="form-control" placeholder="Nombre Estudiante.." value="<?php echo utf8_decode($programa); ?>" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">

                                                        <textarea class="form-control" rows="6" name="comen" cols="20" placeholder="Escriba su comentario" aria-required="true"></textarea>

                                                    </div>
                                                </div>






                                            </div>

                                            <div class="box-footer">


                                                <center> <button type="submit" id="login2" class="btn btn-primary mr-2" style="background-color: green; margin-bottom: 10px ">Enviar</button>
                                                </center>


                                            </div>


                                        </form>

                                    </div>


                                </div>
                                <div class="card card-warning">

                                    <div class="card-header" style="background-color: #343a40; color: white">
                                        <h5 class="card-title">Documentacion</h5>
                                    </div>

                                    <div class="card-body">




                                        <div class="col-sm-12">
                                            <iframe src="https://docs.google.com/viewer?url=http://5.189.175.156/comite/committeees.pdf&embedded=true" width="100%" height="600" style="border: none;"></iframe>

                                        </div>










                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">


                                <div class="card card-warning">

                                    <div class="card-body">


                                        <div class="box box-solid">

                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="box-group" id="accordion">
                                                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                                    <div class="panel box box-primary">
                                                        <div class="card card-warning">
                                                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="collapsed" style="color: white">
                                                                            Para Recordar
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                                                            <div class="card card-warning" style="background-color: #ffff; color: black">
                                                                <div class="card-body">
                                                                    <div class="box-body">
                                                                        <b>Registrar Documentos....</b>
                                                                        </br>
                                                                        <li>Los archivos en formato pdf. Ej:
                                                                            123456789.pdf, recuerde que debe estar
                                                                            en
                                                                            los formatos dispuesto por el comite.
                                                                            </br>
                                                                        <li>Para solicitudes y/o casos especiales,
                                                                            por
                                                                            favor enviar correo electronico al
                                                                            comite de
                                                                            su programa, para ayuda con el
                                                                            SI-COMMITTEE,
                                                                            envie un correo a
                                                                            pabloe.carrenoh@unilibre.edu.co.

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="panel box box-danger">

                                                        <div class="card card-warning">
                                                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" style="color: white" class="collapsed">
                                                                            Importante
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div id="collapseTwo" class="panel-collapse collapse in" aria-expanded=" false">
                                                            <div class="card card-warning">
                                                                <div class="card-body">
                                                                    <div class="box-body">
                                                                        Este es un recurso para estar informado de
                                                                        lo que esta sucediendo en el comite, por
                                                                        favor solo comentarios académicos
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel box box-success">

                                                        <div class="card card-warning">
                                                            <div class="card-header" style="background-color: #B42A2A; color: white">

                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="true" style="color: white">
                                                                            Documentos
                                                                        </a>
                                                                    </h4>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div id="collapseThree" class="panel-collapse collapse show" aria-expanded="false">
                                                            <div class="card card-warning">
                                                                <div class="card-body">
                                                                    <div class="box-body">
                                                                        <button type="button" class="btn btn-block" style="background: #343a40; color: white">Reglamento
                                                                            v3.0</button>

                                                                        <button type="button" class="btn btn-block" style="background: #343a40; color: white">Reglamento
                                                                            v4.0 2019</button>
                                                                        <button type="button" class="btn btn-block" style="background: #343a40; color: white">Formato
                                                                            presentacion Propuesta</button>
                                                                        <button type="button" class="btn btn-block" style="background: #343a40; color: white">Guia
                                                                            Elaboracion documento Final</button>
                                                                        <button type="button" class="btn btn-block" style="background: #343a40; color: white">Rubrica
                                                                            - Presentación de Póster</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->





                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                    <!--Termina pestana9-->


                </div>



                <!--    </div>

    </div> -->


            </section>


            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>2020</b>
            </div>
            <strong>Universidad Libre - <a href="Universidad Libre">SI-COMMITEE</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->





    <script>
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        //window.onclick = function(event) {
        //    // if (event.target == modal) {
        //    //     modal.style.display = "none";
        //    // }
        //    CenterWindow(1000, 600, 50, 'actualizartesisdir.php', 'demo_win');
        //}
    </script>



    <script>
        $("#aclick").on('click', function() {
            alert("123");
            CenterWindow(1000, 600, 50,
                'actualizartesisdir.php', 'demo_win');
            var a = document.getElementById('aclick');
            // console.log(a);
        });
    </script>



</body>

</html>