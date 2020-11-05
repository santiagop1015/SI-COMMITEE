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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <link rel="stylesheet" href="css/frag.css">
    <script rel="stylesheet" src="dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="dist/css/Help/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/Help/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/Help/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">
    <script type="text/javascript" src="js/cambiarPestanna.js"></script>
    <script type="text/javascript" src="js/EditarTesis.js"></script>
</head>
<style>
.white {
    color: white;
}
</style>

<body class="hold-transition sidebar-mini" onload="myfunction()">
    <div class="loader"></div>
    <!--Formulario Start-->


    <!--FormularioEnd-->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"
            style="background-color:#B42A2A; color: white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars white"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="far fa-comments white"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">

                    <!--   <a class="nav-link" href="../desconectar.php">  -->
                    <a class="nav-link"
                        href="javascript:localStorage.removeItem('number');location.replace('../desconectar.php');">

                        <i class="fas fa-door-open white"></i>

                    </a>


                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #343a40; color: white">
            <!-- Brand Logo -->
            <a href="../../index.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SI-COMMITEE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="background-color: #343a40; color: white">
                <!-- Sidebar user (optional) -->
                <a href="profile.php" class="d-block" style="color: white;">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <?php 
                        $usuario = $_SESSION['user'];
                        $posicion_espacio = strpos($usuario, " ");
                        $usuario=substr($usuario,0,$posicion_espacio);
                        echo $usuario;?>
                        </div>
                    </div>
                </a>
                <nav class="mt-2">
                    <div id="pestanas">
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
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
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper pb-2">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 id="Text">Monografías/Poster para Evaluar</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">



                <div id="contenidopestanas">
                    <!--Empieza pestana1-->
                    <div id="cpestana1">
                        <!--Start-->
                        <div class="container-fluid">

                            <div class="card card-warning">
                                <div class="card-body">

                                    <?php
                                           require("../connect_db.php");
                                           $total = 0;
                                           $sql = ("SELECT * FROM tesis where ID_directores='$dir' and Aprob_Dir='' ORDER BY id_tesis DESC ");
                                           $query = mysqli_query($mysqli, $sql);
                                           ?>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%">
                                                        Titulo
                                                    </th>
                                                    <th class="text-center">
                                                        Aprob_Dir
                                                    </th>
                                                    <th class="text-center">
                                                        Documento
                                                    </th>
                                                    <th class="text-center">
                                                        Fecha_Entrega
                                                    </th>
                                                    <th class="text-center">
                                                        Archivo
                                                    </th>
                                                    <th class="text-center">
                                                        Editar
                                                    </th>

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
                                                    <td>
                                                        <?php echo "$arreglo[3] "; ?>
                                                    </td>
                                                    <?php
                                                        if ($arreglo[4] !== "" and $total == 0) {
                                                            ++$total;
                                                ?>
                                                    <td class="text-center"><?php echo "$arreglo[4] "; ?> </td>
                                                    <div class="alert alert-info"><strong>¡Atención!</strong> usted
                                                        tiene <strong>direcciones</strong> por aprobar y
                                                        <strong>documentos</strong> por evaluar...
                                                    </div>
                                                    <?php
                                                        } else {
                                                        ?>
                                                    <td class="text-center"><?php echo "$arreglo[4]"; ?></td>
                                                    <?php
                                                        }
                                                        ?>
                                                    <td class="text-center"><?php echo "$arreglo[6] "; ?> </td>

                                                    <td class="text-center">
                                                        <?php echo str_replace("-","/",$arreglo[9]); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                if(strlen($arreglo[8]) > 1) {
                                                    echo "
                                                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                    target='_blank'>
                                                    $arreglo[8]
                                                    </a>
                                                    ";
                                                    } else {
                                                    echo "";
                                                    }
                                                    
                                                    ?>

                                                        <?php // echo "<a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> "; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                         echo "
                                                         <a class='btn btn-info btn-sm' href='pages/actualizartesisdir.php?id=$arreglo[0]'>
                                                         <i class='fas fa-pencil-alt'>
                                                         
                                                         </i>
                                                         </a>
                                                         ";
                                                    ?>

                                                    </td>
                                                    <!-- <td class="project-actions text-right">
                                                    <a class="btn btn-primary btn-sm" href="#">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="#">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </a>
                                                </td>  -->
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!--End-->
                    </div>
                    <!--termina pestana1-->
                    <!--Empieza pestana2 -->
                    <div id="cpestana2">
                        <!--Start-->
                        <div class="container-fluid">

                            <div class="card card-warning">
                                <div class="card-body">
                                    <?php

                                require("../connect_db.php");
                                $total = 0;
                                $sql = ("SELECT * FROM tesis where ID_directores='$dir' and terminado!=2 and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  fecha_aprob_propuesta");
                                $query = mysqli_query($mysqli, $sql);
                                //var_dump($query);
                                ?>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%">Titulo</th>
                                                    <th class="text-center">Aprob_Dir</th>
                                                    <th class="text-center">Documento</th>
                                                    <th class="text-center">Fecha_Entrega</th>
                                                    <th class="text-center">Archivo</th>
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

                                                        if ($arreglo[4] !== "" and $total == 0) {
                                                            ++$total;
                                                        ?>
                                                    <td class="text-center"><?php echo "$arreglo[4] "; ?> </td>
                                                    <div class="alert alert-info"><strong>¡Atención!</strong> usted
                                                        tiene <strong>direcciones</strong> por aprobar y
                                                        <strong>documentos</strong> por evaluar...
                                                    </div>
                                                    <?php
                                                        } else {
                                                        ?>
                                                    <td class="text-center"><?php echo "$arreglo[4]"; ?></td>
                                                    <?php
                                                        }
                                                        ?>
                                                    <td class="text-center"><?php echo "$arreglo[6] "; ?> </td>
                                                    <td class="text-center"><?php echo "$arreglo[9] "; ?></td>
                                                    <!--<td><?php echo "$arreglo[12]"; ?></td>-->

                                                    <td class="text-center">
                                                        <?php
                                                if(strlen($arreglo[8]) > 1) {
                                                    echo "
                                                    <a class='btn btn-primary btn-sm' href='$alma/$arreglo[8]'
                                                    target='_blank'>
                                                    $arreglo[8]
                                                    </a>
                                                    ";
                                                    } else {
                                                    echo "";
                                                    }
                                                    ?>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->
                    </div>
                    <!--Termina pestana2-->
                    <!--Empieza pestana3-->
                    <div id="cpestana3">

                        <div class="container-fluid">

                            <div class="card card-warning">
                                <div class="card-body">
                                    <?php

                                require("../connect_db.php");
                                $total = 0;
                                $totalm = 0;
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and (ID_estado='Entrega Monografia' or ID_estado='Entrega Poster' or ID_estado='Correccion Monografia') and terminado!=2 ORDER BY id_tesis DESC ");
                             // prueba// $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') ORDER BY id_tesis DESC ");

                                $query = mysqli_query($mysqli, $sql);
                                //var_dump($sql);
                                ?>

                                    <div class="box">

                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-striped projects">
                                                <thead>

                                                    <tr>
                                                        <th style="width: 50%">Titulo</th>
                                                        <th class="text-center">Director</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Fecha_Aprob</th>
                                                        <th class="text-center">Archivo</th>
                                                        <th class="text-center">Evaluar</th>
                                                        <th class="text-center">Modificar</th>
                                                        <th class="text-center">Evaluacion</th>
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
                                                        <td class="text-center"><?php echo "$arreglo[5] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[6] "; ?></td>
                                                        <td class="text-center">
                                                            <?php echo str_replace("-","/",$arreglo[10]); ?></td>
                                                        <td class="text-center">

                                                            <?php 
                                                            
                                                            if(strlen($arreglo[8]) > 1) {
                                                                echo "
                                                                <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                target='_blank'>
                                                                $arreglo[8]
                                                                </a>
                                                                ";
                                                                } else {
                                                                echo "";
                                                                }
                                                            
                                                           // echo "<a href='$alma/$arreglo[8] ' target='_blank'>$arreglo[8]</a> "; ?>
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
                                                        <td class="text-center">EVALUADO</td>
                                                        <td class="text-center">
                                                            <?php //echo "<a href='act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                                ?>
                                                            <?php

                                                                echo "
                                                                <a class='btn btn-info btn-sm' href='pages/act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                                <i class='fas fa-pencil-alt'>
                                                                
                                                                </i>
                                                                </a>
                                                                ";

                                                            /*    $direccion = '"pages/act_evaluacionposter.php?"';

                                                                $parametro = '"id=' . $row[0] . '&jurado=' . $dir . '&ID_tesis=' . $arreglo[0] . '"';
                                                                //$name = '"name"';
                                                                $img = '<img src="images/actualizar.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "<button onclick='CenterWindow($direccion, $parametro, 600, 600);'>$img</button>";
                                                                */
                                                                ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php 
                                                            echo "
                                                            <a class='btn btn-danger btn-sm' target='_blank' href='../archivos/pdf/verevalposter.php?id=$arreglo[0]'>
                                                            <i class='fas fa-file-pdf'></i>
                                                            Ver
                                                            </i>
                                                            </a>
                                                            ";

                                                            if ($asd !== $ide) {
                                                                echo "
                                                                <a class='btn btn-warning btn-sm' href='pages/evaluartesis.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                                <i class='fas fa-spell-check'></i>
                                                                Evaluar
                                                                </i>
                                                                </a>
                                                                ";
                                                            }

                                                        //    echo "<a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded';" 
                                                        ?>
                                                        </td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
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
                    </div>
                    <!--Termina pestana3-->
                    <!--Empieza pestana4-->
                    <div id="cpestana4">

                        <div class="container-fluid">
                            <div class="card card-warning">
                                <div class="card-body">

                                    <?php

                                $total_anteproyects = 0;
                                //echo $total2;
                                require("../connect_db.php");
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and terminado!=2 and (ID_estado='Entrega Anteproyecto' or ID_estado='Correccion Anteproyecto') ORDER BY  id_tesis DESC ");
                                $query = mysqli_query($mysqli, $sql);
                                ?>
                                    <div class="box">
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-striped projects">
                                                <thead>

                                                    <tr>
                                                        <th style="width: 40%">Titulo</th>
                                                        <th class="text-center">Director</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Fecha_Aprob</th>
                                                        <th class="text-center">Archivo</th>
                                                        <th class="text-center">Evaluar</th>
                                                        <!--    <th class="text-center">Modificar</th>
                                                        <th class="text-center">Eval</th> -->
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
                                                    $total_anteproyects++;
                                                ?>
                                                    <tr>

                                                        <?php
                                                    require("../connect_db.php");
                                                    $sql_Eval_anteproyect = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                    $result_Eval_Anteproyecto = mysqli_query($mysqli, $sql_Eval_anteproyect);
                                                    $state = 0;
                                                    while ($row = mysqli_fetch_row($result_Eval_Anteproyecto)) {
                                                        $id_Eval_anteproyecto = $row[0];
                                                        $asd = $row[1];
                                                        $jurado = utf8_decode($row[15]);
                                                        $fecha_eval = $row[16];

                                                        $state = 1;  
                                                        }

                                                        if($state != 1) {
                                                           $anteproyectos_exist = true;
                                                        ?>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[5] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[6] "; ?></td>
                                                        <td class="text-center">
                                                            <?php echo str_replace("-","/",$arreglo[10]); ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                       if(strlen($arreglo[8]) > 1) {
                                                        echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        $arreglo[8]
                                                        </a>
                                                        ";
                                                        } else {
                                                        echo "";
                                                        }
                                                      ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                              echo "
                                                              <a class='btn btn-warning btn-sm' href='pages/evaluartesis.php?id=$arreglo[0]&jur=$dir'>
                                                              <i class='fas fa-spell-check'></i>
                                                              </i>
                                                              </a>
                                                              ";
                                                                ?>
                                                        </td>
                                                        <?php
                                                    } else {
                                                        $state = 0;
                                                        $total_anteproyects = $total_anteproyects - 1;
                                                        $anteproyectos_exist = false;
                                                    } 
                                                    
                                            }
                                                    ?>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <?php

                                        echo "<center><font color='red' size='3'>Total registros: $total_anteproyects</font><br></center>"; ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--Termina pestana4-->
                    <!--Empieza pestana5-->
                    <div id="cpestana5">

                        <div class="container-fluid">
                            <div class="card card-warning">
                                <div class="card-body">

                                    <?php
                                $total_proyects = 0;
                                require("../connect_db.php");
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and (ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto') ORDER BY  id_tesis DESC");
                                $query = mysqli_query($mysqli, $sql);
                                ?>
                                    <div class="box">
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-striped projects">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40%">Titulo</th>
                                                        <th class="text-center">Director</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Fecha_Aprob</th>
                                                        <th class="text-center">Archivo</th>
                                                        <th class="text-center">Evaluar</th>
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
                                                    $total_proyects++;
                                                ?>

                                                    <tr>
                                                        <?php
                                                        require("../connect_db.php");
                                                        
                                                            $sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                            $result_Evalproyect = mysqli_query($mysqli, $sql_eval);
                                                            $state = 0;
                                                            
                                                            while ($row = mysqli_fetch_row($result_Evalproyect)) {
                                                                $state = 1;
                                                            }
                                                            
                                                            if($state != 1) {
                                                                $proyectos_exist = true;
                                                                ?>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[5] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[6] "; ?></td>
                                                        <td class="text-center">
                                                            <?php echo str_replace("-","/",$arreglo[10]); ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            if(strlen($arreglo[8]) > 1) {
                                                            echo "<a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8] ' target='_blank'>$arreglo[8] </a> "; 
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo "
                                                            <a class='btn btn-warning btn-sm' href='pages/evaluartesispro.php?id=$arreglo[0]&jurado=$dir'>
                                                            <i class='fas fa-spell-check'></i>
                                                            
                                                            </i>
                                                            </a>
                                                            ";	
                                                        ?>
                                                        </td>
                                                        <?php
                                                          } else {
                                                            $state = 0;
                                                            $total_proyects = $total_proyects - 1;
                                                            $proyectos_exist = false;
                                                          }
                                                    }
                                                    ?>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <?php

                                        echo "<center><font color='red' size='3'>Total registros: $total_proyects</font><br></center>"; ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--Termina pestana5-->
                    <!--Empieza pestana6-->
                    <div id="cpestana6">

                        <div class="container-fluid">
                            <!-- Tabs -->
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1" style="background-color:#B42A2A; color: white;">
                                    <ul class="nav nav-tabs" id="custom-tabs-evaluados-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-proyectos-tab" data-toggle="pill"
                                                href="#custom-tabs-proyectos" role="tab"
                                                aria-controls="custom-tabs-one-1" aria-selected="true">Proyectos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-anteproyectos-tab" data-toggle="pill"
                                                href="#custom-tabs-anteproyectos" role="tab"
                                                aria-controls="custom-tabs-one-2"
                                                aria-selected="false">Anteproyectos</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="card-body">
                                    <?php
                                      $totalpeval = 0;
                                      require("../connect_db.php");
                                      $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur')  and (ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto') ORDER BY  id_tesis DESC ");
                                      $query = mysqli_query($mysqli, $sql);
                                      ?>
                                    <div class="tab-content" id="custom-tabs-evaluados-tabContent">
                                        <div class="tab-pane fade active show" id="custom-tabs-proyectos"
                                            role="tabpanel" aria-labelledby="custom-tabs-proyectos-tab">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-striped projects">
                                                        <thead>

                                                            <tr>
                                                                <th style="width: 40%">Titulo</th>
                                                                <th class="text-center">Aprob_Dir</th>
                                                                <th class="text-center">Documento</th>
                                                                <th class="text-center">Fecha_Entrega</th>
                                                                <th class="text-center">Archivo</th>
                                                                <th class="text-center">Modificar</th>
                                                                <th class="text-center">Eval</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                
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
                                                    $ide = $arreglo[0];
                                                    $totalpeval++;
                                                ?>
                                                            <tr>
                                                                <?php
                                                    require("../connect_db.php");
                                                        $sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        $result_Evalproyect = mysqli_query($mysqli, $sql_eval);
                                                        $state = 0;
                                                        while ($row = mysqli_fetch_row($result_Evalproyect)) {
                                                            $id_Eval = $row[0];
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                            $state = 1;
                                                        }
                                                        if($state == 1) {
                                                        ?>
                                                                <td><?php echo "$arreglo[3] "; ?></td>

                                                                <td class="text-center"><?php echo "$arreglo[4]"; ?>
                                                                </td>

                                                                <td class="text-center"><?php echo "$arreglo[6]"; ?>
                                                                </td>
                                                                <td class="text-center"><?php echo "$arreglo[9]"; ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td class="text-center"><?php 
                                                    if(strlen($arreglo[8]) > 1) {
                                                        echo "<a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8] ' target='_blank'>$arreglo[8] </a> "; 
                                                        } else {
                                                            echo "";
                                                        } 
                                                    ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php
                                                        echo "
                                                        <a class='btn btn-info btn-sm' href='pages/act_evaluacionpro.php?id=$id_Eval&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                        <i class='fas fa-pencil-alt'></i>
                                                        Editar
                                                        </a>
                                                        ";
                                                            ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php 
                                                        echo "
                                                        <a class='btn btn-danger btn-sm' target='_blank' href='../archivos/pdf/verevalposter.php?id=$arreglo[0]'>
                                                        <i class='fas fa-file-pdf'></i>
                                                        </a>
                                                        ";
                                                        ?>
                                                                </td>
                                                                <?php
                                                        } else {
                                                            $state = 0;
                                                            $totalpeval = $totalpeval - 1; 
                                                        }
                                                    ?>
                                                            </tr>
                                                            <?php
                                                }
                                                if($proyectos_exist) {
                                                    echo '<div class="alert alert-info">
                                                    <strong>¡Atención!</strong> usted tiene
                                                    <strong>proyectos</strong> por aprobar y
                                                    <strong>documentos</strong> por
                                                    evaluar...
                                                </div>';
                                                }
                                                ?>
                                                        </tbody>
                                                    </table>

                                                    <?php
                                           echo "<center><font color='red' size='3'>Total registros: $totalpeval</font><br></center>";
                                           ?>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="custom-tabs-anteproyectos" role="tabpanel"
                                            aria-labelledby="custom-tabs-anteproyectos">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-striped projects">
                                                        <thead>

                                                            <tr>
                                                                <th style="width: 40%">Titulo</th>
                                                                <th class="text-center">Director</th>
                                                                <th class="text-center">Estado</th>
                                                                <th class="text-center">Fecha_Aprob</th>
                                                                <th class="text-center">Archivo</th>
                                                                <th class="text-center">Modificar</th>
                                                                <th class="text-center">Eval</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require("../connect_db.php");
                                                            $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and terminado!=2 and (ID_estado='Entrega Anteproyecto' or ID_estado='Correccion Anteproyecto') ORDER BY  id_tesis DESC ");
                                                            $query = mysqli_query($mysqli, $sql);
                                                            $totalanteval = 0;
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
                                                                $totalanteval++;
                                                            ?>
                                                            <tr>
                                                                <?php
                                                        require("../connect_db.php");
                                                        $sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        $result_Evalanteproyecto = mysqli_query($mysqli, $sql_eval);
                                                        $state = 0;
                                                        while ($row = mysqli_fetch_row($result_Evalanteproyecto)) {
                                                            $id_Eval = $row[0];
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                            $state = 1;
                                                        }
                                                        if($state == 1) {
                                                        ?>
                                                                <td><?php echo "$arreglo[3] "; ?></td>

                                                                <td><?php echo "$arreglo[5]"; ?></td>

                                                                <td><?php echo "$arreglo[6]"; ?></td>
                                                                <td><?php echo str_replace("-","/",$arreglo[10]); ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td><?php 
                                                    if(strlen($arreglo[8]) > 1) {
                                                        echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        $arreglo[8]
                                                        </a>
                                                        ";
                                                        } else {
                                                        echo "";
                                                        }
                                                    ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php
                                                        echo "
                                                        <a class='btn btn-info btn-sm' href='pages/act_evaluacion.php?id=$id_Eval&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                        <i class='fas fa-pencil-alt'></i>
                                                        Editar
                                                        </a>
                                                        ";
                                                            ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php 
                                                        echo "
                                                        <a class='btn btn-danger btn-sm' target='_blank' href='../archivos/pdf/verevalposter.php?id=$arreglo[0]'>
                                                        <i class='fas fa-file-pdf'></i>
                                                        </a>
                                                        ";
                                                        ?>
                                                                </td>

                                                                <?php
                                                        } else {
                                                            $totalanteval = $totalanteval - 1;
                                                        }
                                                    ?>
                                                            </tr>
                                                            <?php
                                                }
                                                if($anteproyectos_exist) {
                                                    echo '<div class="alert alert-info">
                                                    <strong>¡Atención!</strong> usted tiene
                                                    <strong>anteproyectos</strong> por aprobar y
                                                    <strong>documentos</strong> por
                                                    evaluar...
                                                </div>';
                                                }
                                                ?>
                                                        </tbody>
                                                    </table>

                                                    <?php
                                           echo "<center><font color='red' size='3'>Total registros: $totalanteval</font><br></center>";
                                           ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- end Tabs -->
                            </div>

                        </div>
                    </div>
                    <!--Termina pestana6-->
                    <!--Empieza pestana7-->
                    <div id="cpestana7">


                        <div class="container-fluid">

                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1" style="background-color:#B42A2A; color: white;">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <?php
        
        $año = date("Y");
       // $año = gettype($año);
        $año = (int)$año;
        // $año1 = $año - 1;
        // $año2 = $año1 - 1;
        // $año3 = $año2 - 1;
        // $año4 = $año3 - 1;

       // $val = $cont-5;

        
       for($cont = 0; $cont < 5; $cont++) {

            
              echo '<li class="nav-item">';
              if($cont == 0) {
                echo '<a class="nav-link active" id="custom-tabs-one-1-tab" data-toggle="pill"
                href="#custom-tabs-one-1" role="tab" aria-controls="custom-tabs-one-1"
                aria-selected="true">'. $año .'</a>'; 
              } else if($cont == 1) {
                echo '<a class="nav-link" id="custom-tabs-one-2-tab" data-toggle="pill"
                href="#custom-tabs-one-2" role="tab" aria-controls="custom-tabs-one-2"
                aria-selected="false">'. $año .'</a>';
              }else if($cont == 2) {
                echo '<a class="nav-link" id="custom-tabs-one-3-tab" data-toggle="pill"
                href="#custom-tabs-one-3" role="tab" aria-controls="custom-tabs-one-3"
                aria-selected="false">'. $año .'</a>';
              } else if($cont == 3) {
                echo '<a class="nav-link" id="custom-tabs-one-4-tab" data-toggle="pill"
                href="#custom-tabs-one-4" role="tab" aria-controls="custom-tabs-one-4"
                aria-selected="false">'. $año .'</a>';
              } else if($cont == 4) {
                echo '<a class="nav-link" id="custom-tabs-one-5-tab" data-toggle="pill"
                href="#custom-tabs-one-5" role="tab" aria-controls="custom-tabs-one-5"
                aria-selected="false">'. $año .'</a>';
              }

            $año = $año - 1;
    }
    ?>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <?php
            require('../connect_db.php');
            $año = date("Y");
       // $año = gettype($año);
            $año = (int)$año;
     for($cont = 0; $cont < 5; $cont++) {
         
        if($cont == 0) {
         echo '<div class="tab-pane fade active show" id="custom-tabs-one-1" role="tabpanel"
         aria-labelledby="custom-tabs-one-1-tab">';
        } else if($cont == 1) {
            echo '<div class="tab-pane fade" id="custom-tabs-one-2" role="tabpanel"
            aria-labelledby="custom-tabs-one-2-tab">';
        } else if($cont == 2) {
            echo '<div class="tab-pane fade" id="custom-tabs-one-3" role="tabpanel"
            aria-labelledby="custom-tabs-one-3-tab">';
        } else if($cont == 3) {
            echo '<div class="tab-pane fade" id="custom-tabs-one-4" role="tabpanel"
            aria-labelledby="custom-tabs-one-4-tab">';
        } else {
            echo '<div class="tab-pane fade" id="custom-tabs-one-5" role="tabpanel"
            aria-labelledby="custom-tabs-one-5-tab">';
        }
        
        $sql = ("SELECT * FROM actas where programa='$programa' AND YEAR(fecha_inicial) = $año ORDER BY numero DESC");
        $query = mysqli_query($mysqli, $sql);

        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Acta No.</th>';
        echo '<th>Fecha Publicacion</th>';
        echo '<th>Ver Acta</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
                            while ($arreglo = mysqli_fetch_array($query)) {
                                echo "<tr>";
                                echo "<td>$arreglo[1]</td>";
                                echo "<td>$arreglo[4]</td>";
                                //echo "<td bgcolor='797D7F' align='center'><a href='./pdf/veracta.php?numero=$arreglo[1]&programaa=$programa&idc=$pr' target='_blanck'><img src='images/pdf.png' width='40'  height='30' class='img-rounded'></td>";
                                echo "<td><a href='../archivos/pdf/$arreglo[6]'><i class='nav-icon fas fa-download'></i></td>";
                                //echo "<td><a href='./pdf/veracta.php?numero=$arreglo[1]' target='_blank'><img src='images/pdf.png' width='50'  height='50' class='img-rounded'></td>";
                                //echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='images/eliminar.png' width='38'  height='38' class='img-rounded'/></a></td>";

                                //echo "</tr>";

                                echo "</tr>";
                            }
                            
        echo '</tbody>';
        echo '</table>';
        echo '</div>'; 
            $año = $año - 1;
            }
            
            ?>
                                    </div>
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
                                <form id="loginForm2" action="pages/ejecu_act_datos_dir.php" method="post"
                                    enctype="multipart/form-data" role="form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <center>
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <input type="text" name="id" class="form-control" placeholder="id"
                                                        value="<?php echo $id ?>" style="width: 50%"
                                                        readonly="readonly">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Cedula</label>
                                                    <input type="text" name="cedula" value="<?php echo $cedula ?>"
                                                        class="form-control" placeholder="Id Estudiante.."
                                                        readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="user" value="<?php echo $user ?>"
                                                        class="form-control" placeholder="Id Estudiante.."
                                                        style="width: 50%" readonly="readonly">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <input type="text" name="email" value="<?php echo $email ?>"
                                                        class="form-control" placeholder="Id Estudiante.."
                                                        readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" name="pasdir" value="<?php echo $pasdir ?>"
                                                        class="form-control" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Tipo de Usuario</label>
                                                    <input type="text" name="TipoUsuario"
                                                        value="<?php echo $TipoUsuario ?>" class="form-control"
                                                        readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input type="text" name="telefono" value="<?php echo $telefono ?>"
                                                        class="form-control" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Programa</label>
                                                    <input type="text" name="programa" value="<?php echo $programa ?>"
                                                        class="form-control" placeholder="Id Estudiante.."
                                                        readonly="readonly" style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="form-group">
                                                    <label>Fecha de Nacimiento</label>
                                                    <input type="text" name="fechadenacimiento"
                                                        value="<?php echo $fechadenacimiento ?>" class="form-control"
                                                        style="width: 50%">
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer">


                                <center> <button type="submit" id="login1" class="btn btn-primary mr-2"
                                        style="background-color: green; margin-bottom: 10px ">Guardar</button>
                                </center>




                            </div>


                            </form>
                        </div>
                    </div>
                    <!--Termina pestana8-->
                    <!--Empieza pestana9-->
                    <div id="cpestana9">


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-warning">
                                        <div class="card-header" style="background-color: #B42A2A; color: white">
                                            <h5 class="card-title">Envianos un comentario</h5>
                                        </div>

                                        <div class="card-body">
                                            <form id="idFormComen">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- text input -->
                                                        <?php
                                                        $hoy = date("Y-m-d");;
                                                        ?>
                                                        <div class="form-group">
                                                            <label>Fecha</label>
                                                            <input type="text" name="fecha" class="form-control"
                                                                value="<?php echo $hoy; ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Usuario</label>
                                                            <input type="text" name="user" class="form-control"
                                                                placeholder="Nombre Estudiante.."
                                                                value="<?php echo utf8_decode($_SESSION['user']); ?>"
                                                                readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Carrera</label>
                                                            <input type="text" name="programa" class="form-control"
                                                                placeholder="Nombre Estudiante.."
                                                                value="<?php echo utf8_decode($programa); ?>"
                                                                readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <!-- text input -->
                                                        <div class="form-group">

                                                            <textarea id="idTextAreaComen" class="form-control" rows="6"
                                                                name="comen" cols="29"
                                                                placeholder="Escriba su comentario"
                                                                aria-required="true"></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <!--  <button type="submit" class="btn btn-default"
                                                    name="enviar">Enviar</button>
                                                    -->
                                                    <div id="idBoxComen"
                                                        class="alert alert-danger alert-dismissible mt-6"
                                                        style="Display: None;">
                                                        <h5>
                                                            <i id="idIConBoxComen" class="icon fas fa-ban"></i>
                                                            Alerta
                                                        </h5>
                                                        <p id="idMessageComen"></p>

                                                    </div>
                                                    <button id="idButtonEnviarComen" type="button"
                                                        class="btn btn-primary float-right">Enviar</button>
                                                </div>


                                                <script>

                                                </script>

                                            </form>


                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card card-warning">
                                        <div class="card-body">
                                            <div class="callout callout-info">

                                                Para solicitudes y/o casos especiales, por favor enviar correo
                                                electronico
                                                al comite de su programa, para ayuda con el SI-COMMITTEE, envie un
                                                correo a
                                                pabloe.carrenoh@unilibre.edu.co.

                                            </div>
                                            <div class="callout callout-info">

                                                Este es un recurso para estar informado de lo que esta sucediendo en
                                                el
                                                comite, por favor solo comentarios académicos

                                            </div>
                                            <div class="callout callout-info">

                                                Documentos: <br><br>
                                                <li>
                                                    <a style="color: blue;">Reglamento v3.0</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Reglamento
                                                        v4.0 2019</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Formato
                                                        presentacion Propuesta</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Guia
                                                        Elaboracion documento Final</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Rubrica
                                                        - Presentación de Póster</a>
                                                </li>


                                            </div>

                                            <!-- /.box -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-warning">
                                        <div class="card-header" style="background-color: #B42A2A; color: white">
                                            <h5 class="card-title">Documentacion</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <iframe
                                                    src="https://docs.google.com/viewer?url=http://sicomite.unilibre.edu.co/committeees.pdf&embedded=true"
                                                    width="100%" height="600" style="border: none;"></iframe>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Termina pestana9-->
                </div>
            </section>
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

        </aside>
        <!-- /.control-sidebar -->
    </div>

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