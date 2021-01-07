<!DOCTYPE html>

<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../index.html");
}
$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
 $coordir=$arreglo[4];
 $passd=$arreglo[8];
 $foto = $arreglo[14];

 if ($arreglo[2]!='Coordinador') {
	require("../desconectar.php");
	header("Location:../../index.html");
}
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Coordinador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../LocalSources/css/ionicons/ionicons.min.css">

    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <script src="../LocalSources/js/jQuery/2.0.3/jquery.min.js"></script>
    <!-- -->

    <!-- -->
    <!-- Ayuda -- CSS -->
    <!--<script rel="stylesheet" src="dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="dist/css/Help/font-awesome.min.css">
    
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/frag.css">
    -->
    <!-- <link rel="stylesheet" href="css/frag.css">  -->
    <script type="text/javascript" src="js/cambiarPestanna.js"></script>

</head>
<style>
.white {
    color: white;
}

.loading {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: #f4f6f9;
}

.loader1 {
    left: 50%;
    margin-left: -4em;
    font-size: 10px;
    border: .8em solid rgba(218, 219, 223, 1);
    border-left: .8em solid #B42A2A;
    animation: spin 1.1s infinite linear;
}

.loader1,
.loader1:after {
    border-radius: 50%;
    width: 8em;
    height: 8em;
    display: block;
    position: absolute;
    top: 50%;
    margin-top: -4.05em;
}

@keyframes spin {
    0% {
        transform: rotate(360deg);
    }

    100% {
        transform: rotate(0deg);
    }
}
</style>

<body class="hold-transition sidebar-mini" onload="myfunction()" onresize="onResize('disabled')">

    <!--<div class="loader"></div>-->
    <div id="idHeader" class="wrapper">
        <?php include "../header.php" ?>

        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #343a40; color: white">
            <a href="../../index.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SI-COMMITEE</span>
            </a>
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
                        //$posicion_espacio = strpos($usuario, " ");
                        //$usuario=substr($usuario,0,$posicion_espacio);
                        $recortarUsuario = explode(' ',$usuario);
                        echo $recortarUsuario[0];?>

                        </div>

                    </div>
                </a>

                <!-- Sidebar Menu -->
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
                            <li id="pestana16" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana16);' class="nav-link">
                                    <i class="nav-icon fa fa-users white"></i>
                                    <p class="white">
                                        Inicio
                                    </p>
                                </a>
                            </li>
                            <li id="pestana1" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana1);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-file-pdf white"></i>
                                    <p class="white">
                                        Generar Acta
                                    </p>
                                </a>
                            </li>
                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-check-square white"></i>
                                    <p class="white">
                                        Evaluar
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana3);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-spinner white"></i>
                                    <p class="white">
                                        Proceso
                                    </p>
                                </a>
                            </li>
                            <li id="pestana4" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana4);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-clock white"></i>
                                    <p class="white">
                                        Aplazado
                                    </p>
                                </a>
                            </li>
                            <li id="pestana5" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana5);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-times-circle white"></i>
                                    <p class="white">
                                        Rechazado
                                    </p>
                                </a>
                            </li>
                            <li id="pestana6" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana6);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-calendar-times white"></i>
                                    <p class="white">
                                        Proximo a Vencer
                                    </p>
                                </a>
                            </li>
                            <li id="pestana7" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana7);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-calendar-times white"></i>
                                    <p class="white">
                                        VB Director
                                    </p>
                                </a>
                            </li>
                            <li id="pestana8" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana8);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-file-archive white"></i>
                                    <p class="white">
                                        Otros Documentos
                                    </p>
                                </a>
                            </li>
                            <li id="pestana9" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana9);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-suitcase white"></i>
                                    <p class="white">
                                        Semillero
                                    </p>
                                </a>
                            </li>
                            <li id="pestana10" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana10);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-graduation-cap white"></i>
                                    <p class="white">
                                        Postgrado
                                    </p>
                                </a>
                            </li>
                            <li id="pestana11" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana11);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-flask white"></i>
                                    <p class="white">
                                        Aux Investigación
                                    </p>
                                </a>
                            </li>
                            <li id="pestana12" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana12);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-file white"></i>
                                    <p class="white">
                                        Documentos en Curso
                                    </p>
                                </a>
                            </li>
                            <li id="pestana13" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana13);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas
                                    </p>
                                </a>
                            </li>
                            <li id="pestana14" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana14);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-search white"></i>
                                    <p class="white">
                                        Buscar
                                    </p>
                                </a>
                            </li>
                            <li id="pestana15" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana15);ReloadsFrames();' class="nav-link">
                                    <i class="nav-icon fa fa-users white"></i>
                                    <p class="white">
                                        Usuarios
                                    </p>
                                </a>
                            </li>
                        </ul>



                    </div>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- <div id="loadingIcon" class="loading">
            <div class="loader1"></div>
        </div> -->

        <div class="content-wrapper pb-2">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <div class="col-sm-6">
                            <h1 id="Titulo" class="d-none">Documentos Registrados</h1>
                            <h1 id="idTextCargando">Cargando...</h1>
                        </div>
                        <button id="idButtonSuccess" type="button" class="btn btn-success fade" data-toggle="modal"
                            data-target="#modal-success">
                            <i class="fas fa-door-open white"></i>
                        </button>


                    </div>

                </div>
            </section>
            <section id="content" class="content d-none">

                <div class="container-fluid">
                    <div id="contenidopestanas">
                        <div id="cpestana1">
                            <!-- <input value="1" /> -->

                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Generar actas de Comite</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool"><i class="fas fa-sync-alt"
                                                onclick="ReloadsFrames()"></i></button>
                                        <!--- <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                class="fas fa-expand"></i></button> -->
                                    </div>
                                </div>
                                <iframe id="idFrameGenerar" src="pages/1-GenerarActa.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>

                            </div>
                        </div>
                        <div id="cpestana2">
                            <div class="card card-default">

                                <iframe id="idFrameEvaluar" src="pages/2-Evaluar.php" width="100%" style="border: none;"
                                    frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>

                            </div>
                        </div>
                        <div id="cpestana3">
                            <div class="card card-default">

                                <iframe id="idFrameProceso" src="pages/3-Proceso.php" width="100%" style="border: none;"
                                    frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>

                            </div>
                        </div>
                        <div id="cpestana4">
                            <div class="card card-default">

                                <iframe id="idFrameAplazar" src="pages/4-Aplazado.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>

                            </div>
                        </div>
                        <div id="cpestana5">
                            <div class="card card-default">
                                <iframe id="idFrameRechazar" src="pages/5-Rechazado.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana6">
                            <div class="card card-default">
                                <iframe id="idFrameProximo" src="pages/6-ProximoVencer.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana7">
                            <div class="card card-default">
                                <iframe id="idFramePendientes" src="pages/7-VbDirector.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana8">
                            <div class="card card-default">
                                <iframe id="idFrameOtros" src="pages/8-OtrosDocumentos.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana9">
                            <div class="card card-default">
                                <iframe id="idFrameSemilleros" src="pages/9-Semillero.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana10">
                            <div class="card card-default">
                                <iframe id="idFramePostgrado" src="pages/10-Postgrado.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana11">
                            <div class="card card-default">
                                <iframe id="idFrameAuxIn" src="pages/11-AuxInvestigacion.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana12">
                            <div class="card card-default">
                                <iframe id="idFrameCurso" src="pages/12-EnCurso.php" width="100%" style="border: none;"
                                    frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana13">
                            <div class="card card-default">
                                <iframe id="idFrameActas" src="pages/13-Actas.php" width="100%" style="border: none;"
                                    frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana14">
                            <div class="card card-default">
                                <iframe id="idFrameBuscar" src="pages/14-Buscar.php" width="100%" style="border: none;"
                                    frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana15">
                            <!-- <div class="card card-default"> -->
                            <iframe id="idFrameEstudiantes" src="pages/15-Usuarios.php" width="100%"
                                style="border: none;" frameborder="0" scrolling="no"
                                onload="resizeIframe(this)"></iframe>
                            <!-- </div> -->
                        </div>
                        <div id="cpestana16">
                            <?php
                        $contadorp=0;
                        $sql=("SELECT * FROM login where programa='$programa' ");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorp++;
                        
                        }
                        $contadorpro=0;
                        $sql=("SELECT * FROM tesis where programa='$programa' and ID_estado='Entrega Proyecto'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorpro++;
                        
                        }
                        $contadorante=0;
                        $sql=("SELECT * FROM tesis where programa='$programa' and ID_estado='Entrega Anteproyecto'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorante++;
                        
                        }
                        $contadorprop=0;
                        $sql=("SELECT * FROM tesis where programa='$programa' and ID_estado='Entrega Propuesta'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorprop++;
                        
                        }
                        $contadorprot=0;
                        $sql=("SELECT * FROM tesis where programa='$programa' and ID_estado='Entrega Proyecto' and nota>0");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorprot++;
                        
                        }
                        $contadorse=0;$contadorset=0;
                        $sql=("SELECT * FROM tesis where programa='$programa' and id_estudiante2=1 and nota>0 ");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                          $nota=$arreglo[20];
                          if($nota>0){
                            $contadorset++;
                          }
                        $contadorse++;
                        
                        }
                        $contadoraux=0;
                        $sql=("SELECT * FROM tesis where programa='$programa' and id_estudiante2=3 and nota>0");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadoraux++;
                        
                        }
                        $evaluardoc=0;
                                $sql=("SELECT * FROM tesis  where programa='$programa' and (terminado=0 or terminado=6) and observaciones='Por definir' and (aprob_dir='SI' or ID_directores='No aplica' or ID_directores='Por definir')");
                                $query=mysqli_query($mysqli,$sql);
                                while($arreglo=mysqli_fetch_array($query)){
                                $evaluardoc++;
                        
                        }
                        $totaldoc=0;
                        $sql=("SELECT * FROM tesis where programa='$programa'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $totaldoc++;
                        
                        }
                        $totalactas=0;
                        $sql=("SELECT * FROM actas where programa='$programa'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $totalactas++;
                        
                        }
                        $totalvb=0;
                        $sql=("SELECT * FROM tesis  where programa='$programa' and aprob_dir='' and ID_directores!='No aplica'" );
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $totalvb++;
                        
                        }
                        $entradast=0;
                        $ff=date('Y-m-d');
                        $fi=date('Y-m-d',strtotime($ff.'- 3 month'));
                        $sql=("SELECT * FROM entradas where fecha between '$fi' and '$ff'");
                        $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $entradast++;
                        
                        }
                        $aux=0;
                        $totald=($contadorprop+$contadorante+$contadorpro)
                        ?>

                            <div class="row">

                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?php echo $contadorp ?></h3>
                                            <p>Usuarios Registrados</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal"
                                            data-target="#usuariosRegistradosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box  bg-success">
                                        <div class="inner">
                                            <h3><?php echo $contadorpro ?></h3>
                                            <p>Proyectos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#proyectosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?php echo $contadorante ?></h3>

                                            <p>Anteproyectos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal"
                                            data-target="#anteproyectosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box  bg-success">
                                        <div class="inner">
                                            <h3><?php echo $contadorprop ?></h3>

                                            <p>Propuestas</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#propuestasModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3><?php echo $totaldoc ?></h3>

                                            <p>Total de Documentos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#documentosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo $contadorprot ?></h3>

                                            <p>Proyectos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal"
                                            data-target="#proyectostermModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo $contadorset?></h3>

                                            <p>Semilleros</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#semillerosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo $aux ?></h3>

                                            <p>Auxiliares de Inv</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#auxiliaresModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <!-- Modals container -->
                            <div class="modal fade" id="usuariosRegistradosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-body">
                                            La cantidad corresponde a todos lo usuarios registrados desde julio de
                                            2016...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="proyectosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-success">
                                        <div class="modal-body">
                                            Estos proyectos son los que estan actualmente en proceso...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="anteproyectosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-success">
                                        <div class="modal-body">
                                            Estos Anteproyectos son los que estan actualmente en proceso...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="propuestasModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-success">
                                        <div class="modal-body">
                                            Estas propuestas son las que estan actualmente en proceso...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="documentosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-body">
                                            Corresponde a todos los documentos procesados desde julio de 2016...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="proyectostermModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-info">
                                        <div class="modal-body">
                                            Estos proyectos son los que estan terminados...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="semillerosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-info">
                                        <div class="modal-body">
                                            Proyectos inscritos con opcion de grado por semillero...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="auxiliaresModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-info">
                                        <div class="modal-body">
                                            Estudiantes con opcion de grado auxiliares investigacion...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End modals container -->

                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box shadow-lg">
                                        <span class="info-box-icon bg-info elevation-1"><i
                                                class="fas fa-cog"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Documentos por Evaluar...</span>
                                            <span class="info-box-number">
                                                <?php echo $evaluardoc ?>
                                                <small>A hoy</small>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3 shadow-lg">
                                        <span class="info-box-icon bg-danger elevation-1"><i
                                                class="fas fa-thumbs-up"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Actas</span>
                                            <span class="info-box-number"><?php echo $totalactas ?><small>
                                                    Publicadas</small></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <div class="clearfix hidden-md-up"></div>

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3 shadow-lg">
                                        <span class="info-box-icon bg-success elevation-1"><i
                                                class="fas fa-shopping-cart"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Documentos por VoBo</span>
                                            <span class="info-box-number"><?php echo $totalvb ?><small> A
                                                    hoy</small></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3 shadow-lg">
                                        <span class="info-box-icon bg-warning elevation-1"><i
                                                class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Visitas</span>
                                            <span class="info-box-number"><?php echo $entradast?><small> Ultimo
                                                    mes</small></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </div>

                            <!-- Start Frame -->
                            <div class="col-12">
                                <h5>¿Cómo manejo el SI-COMMITTEE?</h5>
                            </div>


                            <iframe id="idFrameInicio" src="pages/16-Inicio.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>



                            <!-- End Frame -->

                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php include '../footer.php'; ?>
        <!-- /. Footer -->



        <!-- Control Sidebar -->
        <?php include 'chat.php'; ?>
        <!-- /.control-sidebar -->
    </div>

    <!-- modal-start -->
    <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
            <div id="idModal" class="modal-content bg-success">
                <div class="modal-header">
                    <h4 id="idModalTittle" class="modal-title">Success Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="idModalText">One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal"
                        onclick="ReloadsFrames()">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- modal-end -->

</body>

<script>
$(document).ready(function() {
    window.addEventListener("storage", ChangeCard);


    //var Frames = ['idFrameGenerar', 'idFrameEvaluar'];
    //for (var i = 0; i < Frames.length; i++) {
    //    ReloadsFrames(Frames[i]);
    //    //  ReloadsFrames();
    //}

    $('.fade').on('hidden.bs.modal', function(e) {
        // do something...
        //var ItemNow = localStorage.getItem("number");
        //ReloadsFrames(parseInt(ItemNow) + 1);
        ReloadsFrames();
    });


});
var Frames = ['idFrameGenerar', 'idFrameEvaluar', 'idFrameProceso', 'idFrameAplazar', 'idFrameRechazar',
    'idFrameProximo', 'idFramePendientes', 'idFrameOtros', 'idFrameSemilleros', 'idFramePostgrado', 'idFrameAuxIn',
    'idFrameCurso', 'idFrameActas', 'idFrameBuscar', 'idFrameEstudiantes', 'idFrameInicio'
];

function ReloadsFrames(param) {
    var ItemNow = localStorage.getItem("number");
    //debugger;
    //var Frames = ['idFrameGenerar', 'idFrameEvaluar', 'idFrameProceso', 'idFrameAplazar'];
    //var iframe = document.getElementById(Frames[(id - 1)]);
    if (!param) {
        // if (ItemNow != "15") {
        var iframe = document.getElementById(Frames[ItemNow]);
        iframe.src = iframe.src;
        if (ItemNow == "14") {
            setTimeout(() => {
                iframe.contentWindow.location.reload();
            }, 100);
        }
        // }
    } else if (param == "non-reaload") {
        resizeIframe(document.getElementById(Frames[ItemNow]), 1);
    }
    //iframe.contentDocument.location.reload(true);
    // document.getElementById(idFrame).contentDocument.history.back(true);

}

function ChangeCard(event) {
    var Modal = document.getElementById("idModal");
    var ModalTitle = document.getElementById("idModalTittle");
    var ModalText = document.getElementById("idModalText");
    //console.log(event.key);
    if (event.key == "evaluar") {
        var ItemNow = localStorage.getItem("number");
        //console.log(Frames[ItemNow]);
        // ReloadsFrames(parseInt(ItemNow) + 1);
        //console.log(Frames[ItemNow]);
        // var FrameEvaluar = document.getElementById("idFrameAplazar");
        var FrameEvaluar = document.getElementById(Frames[ItemNow]);
        //  console.log(FrameEvaluar);
        //resizeIframe(FrameEvaluar, localStorage.getItem("evaluar"));
    }

    if (event.key == "Mensaje2") {
        var Item2 = localStorage.getItem("Mensaje2");
        if (Item2 !== null) {

            switch (Item2) {
                case "0":
                    document.getElementById("idButtonSuccess").click();
                    Modal.className = "modal-content bg-danger";
                    ModalTitle.innerHTML = "Error - " + localStorage.getItem("Mensaje2-Title");
                    ModalText.innerHTML = localStorage.getItem("Mensaje2-Message");
                    break;
                case "1":
                    document.getElementById("idButtonSuccess").click();
                    Modal.className = "modal-content bg-success";
                    ModalTitle.innerHTML = "Exito - " + localStorage.getItem("Mensaje2-Title");
                    ModalText.innerHTML = localStorage.getItem("Mensaje2-Message");
                    break;
                default:
                    break;
            }

            //var elmnt = document.getElementById("idHeader");
            //elmnt.scrollIntoView();
        }
    }
}

function resizeIframe(obj, px) {

    //obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
    if (!px) {
        obj.style.height = obj.contentDocument.body.clientHeight + "px";
    } else {
        obj.style.height = obj.contentDocument.body.clientHeight + "px";
        /*   if (px == 0) {
            //  obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
        } else {
            obj.style.height = px + "px";
        }
*/
    }
}

function onResize(state) {
    var ItemNow = localStorage.getItem("number");
    //console.log(Frames[ItemNow]);
    // ReloadsFrames(parseInt(ItemNow) + 1);
    //console.log(Frames[ItemNow]);
    //var FrameEvaluar = document.getElementById("idFrameAplazar");

    var FrameEvaluar = document.getElementById(Frames[ItemNow]);
    if (state !== "disabled") {
        FrameEvaluar.src = FrameEvaluar.src;
    }
    //console.log(FrameEvaluar);
    //  resizeIframe(FrameEvaluar, localStorage.getItem("evaluar"));
}
</script>

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript" src="chat/chat.js"></script>

</html>