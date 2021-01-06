<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../../index.html");
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
    $foto = $arreglo[14];
    if ($arreglo[2] != 'Coordinador') {
        require("../desconectar.php");
        header("Location:../../index.html");
    }
}

$dir = $_SESSION['user'];

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Dir/Jur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../LocalSources/css/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link href="../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <!--<link rel="stylesheet" href="css/frag.css"> -->
    <script rel="stylesheet" src="dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="dist/css/Help/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">
    <script type="text/javascript">
    // Dadas la division que contiene todas las pestañas y la de la pestaña que se
    // quiere mostrar, la funcion oculta todas las pestañas a excepcion de esa.
    function cambiarPestanna(pestannas, pestanna) {
        // Obtiene los elementos con los identificadores pasados.

        var cpestana1 = document.getElementById("cpestana1");
        var cpestana2 = document.getElementById("cpestana2");
        var cpestana3 = document.getElementById("cpestana3");
        var cpestana4 = document.getElementById("cpestana4");
        var cpestana = [
            "cpestana1",
            "cpestana2",
            "cpestana3",
            "cpestana4",
            "cpestana5",
            "cpestana6",
            "cpestana7",
        ];
        var Titulos = [
            "Documentos por Visto Bueno..",
            "Documentos bajo su Dirección...",
            "Monografías/Poster para Evaluar",
            "Anteproyectos para Evaluar...",
            "Proyectos para Evaluar",
            "Documentos Evaluados...",
            "Actas de Comité",
        ];

        pestanna = document.getElementById(pestanna.id);
        listaPestannas = document.getElementById(pestannas.id);

        // Obtiene las divisiones que tienen el contenido de las pestañas.
        cpestanna = document.getElementById("c" + pestanna.id);
        var pestanaid = "c" + pestanna.id;
        listacPestannas = document.getElementById("contenido" + pestannas.id);
        localStorage.setItem("number", 1);

        i = 0;
        // Recorre la lista ocultando todas las pestañas y restaurando el fondo
        // y el padding de las pestañas.
        while (typeof listacPestannas.getElementsByTagName("div")[i] != "undefined") {
            //  $(document).ready(function() {
            //cpestanna

            //  $(listacPestannas.getElementsByTagName("div")[i]).css("display", "none");
            $(listaPestannas.getElementsByTagName("li")[i]).css("background", "");
            $(listaPestannas.getElementsByTagName("li")[i]).css("padding-bottom", "");
            i += 1;
            // });
        }

        //  if ((cpestanna.style.display = "none")) {
        for (var cont = 0; cont < cpestana.length; cont++) {
            var petananone = document.getElementById(cpestana[cont]);
            if (pestanaid == cpestana[cont]) {
                localStorage.setItem("number", cont);
                if ((petananone.style.display = "none")) {
                    cpestanna.style.display = "block";

                    var txt = document.getElementById("Text");
                    txt.innerHTML = Titulos[cont];

                    // console.log(txt.innerHTML);
                }
            } else {
                cpestanna.style.display = "none";

                petananone.style.display = "none";
            }
        }
        //  } else {
        //     cpestanna.style.display = "none";
        // }

        $(document).ready(function() {
            // Muestra el contenido de la pestaña pasada como parametro a la funcion,
            // cambia el color de la pestaña y aumenta el padding para que tape el
            // borde superior del contenido que esta juesto debajo y se vea de este
            // modo que esta seleccionada.
            $(cpestanna).css("display", "");
            $(pestanna).css("background", "#B42A2A");

            //  $(pestanna).css("padding-bottom", "2px");
        });

        // $(".loader").fadeOut("slow");
        document.getElementById("IdIconLoad").classList.add("d-none");
        document.getElementById("content").classList.remove("d-none");
        //
        document.getElementById("Text").classList.remove("d-none");
        document.getElementById("idTextCargando").classList.add("d-none");

    }

    function myfunction() {
        var Local = localStorage.getItem("number");
        if (Local !== null) {
            Local = parseInt(Local);
            Local = Local + 1;

            switch (Local) {
                case 1:
                    cambiarPestanna(pestanas, pestana1);
                    break;
                case 2:
                    cambiarPestanna(pestanas, pestana2);
                    break;
                case 3:
                    cambiarPestanna(pestanas, pestana3);
                    break;
                case 4:
                    cambiarPestanna(pestanas, pestana4);
                    break;
                case 5:
                    cambiarPestanna(pestanas, pestana5);
                    break;
                case 6:
                    cambiarPestanna(pestanas, pestana6);
                    break;
                case 7:
                    cambiarPestanna(pestanas, pestana7);
                    break;
                default:
                    cambiarPestanna(pestanas, pestana1);
                    break;
            }
            // console.log(Local);
        } else {
            // Local = pestana2;
            cambiarPestanna(pestanas, pestana1);
        }
    }

    </script>
    <script type="text/javascript">
    //var winglobal;

    function CenterWindow(url, id, Iwidth, Iheigth, features) {
        var width = Iwidth;
        var heigth = Iheigth;

        var wname = "name";

        var centerLeft = parseInt((window.screen.availWidth - width) / 2);
        var centerTop = parseInt((window.screen.availHeight - heigth) / 2 - 50);

        var misc_features;
        if (features) {
            misc_features = ", " + features;
        } else {
            misc_features = ", status=no, location=no, scrollbars=yes, resizable=yes";
        }
        var windowFeatures =
            "width=" +
            width +
            ",height=" +
            heigth +
            ",left=" +
            centerLeft +
            ",top=" +
            centerTop +
            misc_features;

        // console.log(url);
        var win = window.open(url + id, wname, windowFeatures);
        win.focus();

        //winglobal = win;
        return win;
    }

    function myFunction(NUMBER) {
        alert(NUMBER);
    }
    </script>
</head>
<style>
.white {
    color: white;
}
</style>

<body class="hold-transition sidebar-mini" onload="myfunction()">
    <!--  <div class="loader"></div> -->

    <!--Formulario Start-->


    <!--FormularioEnd-->
    <div class="wrapper">
        <!-- Navbar -->
        <?php require '../header.php'; ?>

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
                        <?php
                        if(empty($foto)) {
                            echo '<img src="dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">';
                          } else {
                          echo '<img src="data:image/jpg;base64,'.base64_encode($foto).'" class="img-circle elevation-2" alt="User Image">';
                          }
                        ?>
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
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <div id="IdIconLoad" class="overlay dark"
                                style="position: absolute; background-size: cover; background-color: rgba(0,0,0,0.6);">
                                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="javascript:toCoordinador();" class="nav-link">
                                    <i class="nav-icon fa fa-arrow-left white"></i>
                                    <p class="white">
                                        Coordinador
                                    </p>
                                </a>
                                <script>
                                function toCoordinador() {
                                    localStorage.removeItem("number");
                                    location.replace("Coordinador.php");
                                }
                                </script>
                            </li>
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
                            <h1 id="Text" class="d-none">Monografías/Poster para Evaluar</h1>
                            <h1 id="idTextCargando">Cargando...</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section id="content" class="content d-none">



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
                                        <table class="table table-bordered table-striped">
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
                                                    
                                                    if(strlen($arreglo[8]) > 15) {
                                                        echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        ".substr($arreglo[8],0,15)."..."."
                                                        </a>
                                                        ";
                                                    } else {
                                                        echo "
                                                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                    target='_blank'>
                                                    $arreglo[8]
                                                    </a>
                                                    ";
                                                    }
                                                    } else {
                                                    echo "";
                                                    }
                                                    
                                                    ?>

                                                        <?php // echo "<a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> "; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                         echo "
                                                         <a class='btn btn-info btn-sm' href='pagesDirector/actualizartesisdir.php?id=$arreglo[0]'>
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
                                        <table class="table table-bordered table-striped">
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
                                                    
                                                    if(strlen($arreglo[8]) > 15) {
                                                        echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        ".substr($arreglo[8],0,15)."..."."
                                                        </a>
                                                        ";
                                                    } else {
                                                        echo "
                                                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                    target='_blank'>
                                                    $arreglo[8]
                                                    </a>
                                                    ";
                                                    }
                                                    } else {
                                                    echo "";
                                                    }
                                                    ?>
                                                    </td>
                                                    <!--<td>
                                                            <?php //echo "<a href='actualizartesisdir.php?id=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                            ?>
                                                            <?php

                                                            $direccion = '"pagesDirector/actualizartesisdir.php?"';
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
                                            <table class="table table-bordered table-striped">
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
                                                    
                                                                if(strlen($arreglo[8]) > 15) {
                                                                    echo "
                                                                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                    target='_blank'>
                                                                    ".substr($arreglo[8],0,15)."..."."
                                                                    </a>
                                                                    ";
                                                                } else {
                                                                    echo "
                                                                <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                target='_blank'>
                                                                $arreglo[8]
                                                                </a>
                                                                ";
                                                                }
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
                                                                <a class='btn btn-info btn-sm' href='pagesDirector/act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'>
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
                                                                <a class='btn btn-warning btn-sm' href='pagesDirector/evaluartesis.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'>
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
                                $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and terminado!=2 and (ID_estado='Entrega Anteproyecto' or ID_estado='Correccion Anteproyecto') ORDER BY id_tesis DESC ");
                                $query = mysqli_query($mysqli, $sql);
                                ?>
                                    <div class="box">
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-bordered table-striped">
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
                                                $anteproyectos_exist = false;
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
                                                    
                                                        if(strlen($arreglo[8]) > 15) {
                                                            echo "
                                                            <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                            target='_blank'>
                                                            ".substr($arreglo[8],0,15)."..."."
                                                            </a>
                                                            ";
                                                        } else {
                                                            echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        $arreglo[8]
                                                        </a>
                                                        ";
                                                        }
                                                        } else {
                                                        echo "";
                                                        }
                                                      ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                              echo "
                                                              <a class='btn btn-warning btn-sm' href='pagesDirector/evaluartesis.php?id=$arreglo[0]&jur=$dir'>
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
                                            <table class="table table-bordered table-striped">
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
                                                    $proyectos_exist = false;
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
                                                    
                                                                if(strlen($arreglo[8]) > 15) {
                                                                    echo "
                                                                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                    target='_blank'>
                                                                    ".substr($arreglo[8],0,15)."..."."
                                                                    </a>
                                                                    ";
                                                                } else {
                                                                    echo "
                                                                <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                target='_blank'>
                                                                $arreglo[8]
                                                                </a>
                                                                ";
                                                                }
                                                                } else {
                                                                echo "";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo "
                                                            <a class='btn btn-warning btn-sm' href='pagesDirector/evaluartesispro.php?id=$arreglo[0]&jurado=$dir'>
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
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-otros-tab" data-toggle="pill"
                                                href="#custom-tabs-otros" role="tab" aria-controls="custom-tabs-one-2"
                                                aria-selected="false">Otros</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <?php
                                      $totalpeval = 0;
                                      require("../connect_db.php");
                                      $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and Aprob_Dir='SI' and (ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto') ORDER BY  id_tesis DESC ");
                                      $query = mysqli_query($mysqli, $sql);
                                      ?>
                                    <div class="tab-content" id="custom-tabs-evaluados-tabContent">

                                        <!-- Tab proyectos -->
                                        <div class="tab-pane fade active show" id="custom-tabs-proyectos"
                                            role="tabpanel" aria-labelledby="custom-tabs-proyectos-tab">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-bordered table-striped">
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
                                                        if($state != 1) {
                                                        ?>
                                                                <td><?php echo "$arreglo[3] "; ?></td>

                                                                <td class="text-center"><?php echo "$arreglo[4]"; ?>
                                                                </td>

                                                                <td class="text-center"><?php echo "$arreglo[6]"; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo str_replace("-","/",$arreglo[9]); ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td class="text-center"><?php 
                                                    if(strlen($arreglo[8]) > 1) {
                                                    
                                                        if(strlen($arreglo[8]) > 15) {
                                                            echo "
                                                            <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                            target='_blank'>
                                                            ".substr($arreglo[8],0,15)."..."."
                                                            </a>
                                                            ";
                                                        } else {
                                                            echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        $arreglo[8]
                                                        </a>
                                                        ";
                                                        }
                                                        } else {
                                                        echo "";
                                                        }
                                                    ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php
                                                        echo "
                                                        <a class='btn btn-info btn-sm' href='pagesDirector/act_evaluacionpro.php?id=$id_Eval&jurado=$dir&ID_tesis=$arreglo[0]'>
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
                                        <!-- End Tab proyectos -->


                                        <!-- Tab anteproyectos -->
                                        <div class="tab-pane fade" id="custom-tabs-anteproyectos" role="tabpanel"
                                            aria-labelledby="custom-tabs-anteproyectos">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-bordered table-striped">
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
                                                            require("../connect_db.php");
                                                            $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and Aprob_Dir='SI' and (ID_estado='Entrega Anteproyecto' or ID_estado='Correccion Anteproyecto') ORDER BY  id_tesis DESC ");
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

                                                                <td class="text-center"><?php echo "$arreglo[4]"; ?>
                                                                </td>

                                                                <td class="text-center"><?php echo "$arreglo[6]"; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo str_replace("-","/",$arreglo[11]); ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td><?php 
                                                    if(strlen($arreglo[8]) > 1) {
                                                    
                                                        if(strlen($arreglo[8]) > 15) {
                                                            echo "
                                                            <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                            target='_blank'>
                                                            ".substr($arreglo[8],0,15)."..."."
                                                            </a>
                                                            ";
                                                        } else {
                                                            echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        $arreglo[8]
                                                        </a>
                                                        ";
                                                        }
                                                        } else {
                                                        echo "";
                                                        }
                                                    ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php
                                                        echo "
                                                        <a class='btn btn-info btn-sm' href='pagesDirector/act_evaluacion.php?id=$id_Eval&jurado=$dir&ID_tesis=$arreglo[0]'>
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
                                        <!-- End Tab anteproyectos -->

                                        <!-- Tab otros -->
                                        <div class="tab-pane fade" id="custom-tabs-otros" role="tabpanel"
                                            aria.labelledby="custom-tabs-otros">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 40%">Titulo</th>
                                                                <th class="text-center">Aprob_Dir</th>
                                                                <th class="text-center">Documento</th>
                                                                <th class="text-center">Fecha_Entrega</th>
                                                                <th class="text-center">Archivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require("../connect_db.php");
                                                            $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and Aprob_Dir='SI' and (ID_estado!='Entrega Anteproyecto' and ID_estado!='Correccion Anteproyecto') and (ID_estado!='Entrega Proyecto' and ID_estado!='Correccion Proyecto') ORDER BY id_tesis DESC");
                                                            $query = mysqli_query($mysqli, $sql);
                                                            $totalotroseval = 0;
                                                            $otros_exist = false;
                                                            while ($arreglo = mysqli_fetch_array($query)) {
                                                                if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                                                                    $alma="./propuestas";
                                                                }else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
                                                                {
                                                                $alma="./anteproyectos";
                                                                }else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
                                                                {
                                                                $alma="./proyectos";
                                                                }else {
                                                                $alma="./otros";	
                                                                }	
                                                                $ide = $arreglo[0];
                                                                $totalotroseval++;
                                                            ?>
                                                            <tr>
                                                                <?php
                                                        require("../connect_db.php");
                                                        $sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        $result_Evalotrosproyecto = mysqli_query($mysqli, $sql_eval);
                                                        $state = 0;
                                                        while ($row = mysqli_fetch_row($result_Evalotrosproyecto)) {
                                                            $id_Eval = $row[0];
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                            $state = 1;
                                                        }
                                                        if($state == 1) {
                                                            $otros_exist = true;
                                                        ?>
                                                                <td><?php echo "$arreglo[3] "; ?></td>

                                                                <td class="text-center"><?php echo "$arreglo[4]"; ?>
                                                                </td>

                                                                <td class="text-center"><?php echo "$arreglo[6]"; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo str_replace("-","/",$arreglo[9]); ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td class="text-center"><?php 
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

                                                                <?php
                                                        } else {
                                                            $totalotroseval = $totalotroseval - 1;
                                                            $otros_exist = false;
                                                        }
                                                    ?>
                                                            </tr>
                                                            <?php
                                                }
                                                if($otros_exist) {
                                                    echo '<div class="alert alert-info">
                                                    <strong>¡Atención!</strong> usted tiene actividades de
                                                    <strong>otros</strong> por aprobar y
                                                    <strong>documentos</strong> por
                                                    evaluar...
                                                </div>';
                                                }
                                                ?>
                                                        </tbody>
                                                    </table>

                                                    <?php
                                                echo "<center><font color='red' size='3'>Total registros: $totalotroseval</font><br></center>";
                                                 ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab otros -->



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
        echo '<th class="text-center">Acta No.</th>';
        echo '<th class="text-center">Fecha Publicacion</th>';
        echo '<th class="text-center">Ver Acta</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
                            while ($arreglo = mysqli_fetch_array($query)) {
                                echo "<tr>";
                                echo "<td class='text-center'>$arreglo[1]</td>";
                                echo "<td class='text-center'>$arreglo[4]</td>";
                                //echo "<td bgcolor='797D7F' align='center'><a href='./pdf/veracta.php?numero=$arreglo[1]&programaa=$programa&idc=$pr' target='_blanck'><img src='images/pdf.png' width='40'  height='30' class='img-rounded'></td>";
                                echo "<td class='text-center'><a href='../archivos/pdf/$arreglo[6]'><i class='nav-icon fa fa-file-pdf' style='color: red;'></i></td>";
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
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?php include '../footer.php'; ?>
        <!-- /. Footer -->

        <!-- Control Sidebar -->
        <?php include 'chat.php'; ?>
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