<!DOCTYPE html>

<?php
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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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

</head>
<style>
.white {
    color: white;
}
</style>

<body class="hold-transition sidebar-mini" onload="myfunction()" onresize="onResize('disabled')">

    <div class="loader"></div>
    <div id="idHeader" class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"
            style="background-color:#B42A2A; color: white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars white"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a id="idAnclaIconHelp" class="nav-link" data-toggle="modal" data-target="#IdButtonHelp">
                        <i id="idIconClassHelp" class="far fa-question-circle white"></i>
                    </a>
                    <script>
                    window.addEventListener('load', iniciar, false);

                    function iniciar() {
                        var AnclaHelp = document.getElementById("idAnclaIconHelp");
                        AnclaHelp.addEventListener('mouseover', overHelp, false);
                        AnclaHelp.addEventListener('mouseout', outHelp, false);
                    }

                    function overHelp() {
                        var IconHelp = document.getElementById('idIconClassHelp');
                        IconHelp.className = "fas fa-question-circle white";
                    }

                    function outHelp() {
                        var IconHelp = document.getElementById('idIconClassHelp');
                        IconHelp.className = "far fa-question-circle white";
                    }
                    </script>
                </li>
                <li class="nav-item">
                    <a id="idChatIcon" class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i id="idIconClassChat" class="far fa-comments white"></i>
                    </a>
                    <script>
                    $(document).on("click", "#idChatIcon", function() {
                        var iconChatBar = document.getElementById("idIconClassChat");
                        if (iconChatBar.className == "far fa-comments white") {
                            iconChatBar.className = "fas fa-comments white";
                        } else {
                            iconChatBar.className = "far fa-comments white";
                        }
                    });
                    </script>
                </li>
                <li class="nav-item dropdown">
                    <a id="idAnclaIconLogout" class="nav-link" data-toggle="modal" data-target="#idModalLogout">
                        <i id="idIconLogout" class="fas fa-door-closed white"></i>
                    </a>
                    <script>
                    window.addEventListener('load', iniciar, false);

                    function iniciar() {
                        var AnclaLogout = document.getElementById('idAnclaIconLogout');
                        AnclaLogout.addEventListener('mouseover', overLogout, false);
                        AnclaLogout.addEventListener('mouseout', outLogout, false);
                    }

                    function overLogout() {
                        var IconLogout = document.getElementById('idIconLogout');
                        IconLogout.className = "fas fa-door-open white";
                    }

                    function outLogout() {
                        var IconLogout = document.getElementById('idIconLogout');
                        IconLogout.className = "fas fa-door-closed white";
                    }
                    </script>
                </li>

            </ul>
        </nav>

        <!-- Modal cerrar sesion -->
        <div class="modal fade" id="idModalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro que quieres salir?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success"
                            onclick="window.location.href='../desconectar.php'">Si</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal cerrar sesion-->

        <!-- Modal Help -->
        <div class="modal fade" id="IdButtonHelp" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Ayuda</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="container-fluid" style="background-color: #f4f6f9; padding: 15px 15px 15px 15px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="callout callout-info" style="border-left-color: #B42A2A;">
                                    Este es un recurso para estar informado de lo que esta sucediendo en el
                                    comite, por favor solo comentarios académicos
                                </div>
                                <div class="card card-warning">
                                    <div class="card-header" style="background-color: #B42A2A; color: white">
                                        <h5 class="card-title">Envíenos un comentario!</h5>
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
                                                            name="comen" cols="29" placeholder="Escriba su comentario"
                                                            aria-required="true"></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <!--  <button type="submit" class="btn btn-default"
                                                    name="enviar">Enviar</button>
                                                    -->
                                                <div id="idBoxComen" class="alert alert-danger alert-dismissible mt-6"
                                                    style="Display: None;">
                                                    <h5>
                                                        <i id="idIConBoxComen" class="icon fas fa-ban"></i>
                                                        Alerta
                                                    </h5>
                                                    <p id="idMessageComen"></p>

                                                </div>
                                                <button id="idButtonEnviarComen" type="submit"
                                                    class="btn btn-primary float-right">Enviar Comentario</button>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="callout callout-info" style="border-left-color: #B42A2A;">
                                    Para solicitudes y/o casos especiales, por favor enviar correo
                                    electronico
                                    al comite de su programa, para ayuda con el SI-COMMITTEE, envie un
                                    correo a
                                    pabloe.carrenoh@unilibre.edu.co
                                </div>
                                <div class="card card-warning">
                                    <div class="card-header" style="background-color: #B42A2A; color: white">
                                        <h5 class="card-title">Documentos</h5>
                                    </div>
                                    <div class="card-body">



                                        Documentos: <br><br>
                                        <li>
                                            <a href="../modelo/Reglamento.pdf" style="color: blue;"
                                                target="_blanck">Reglamento v3.0</a>
                                        </li>
                                        <h5 class="mt-2">Antes de marzo de 2019</h5>
                                        <li>
                                            <a href="../modelo/reglamento-grados-ingenieria-2019.pdf"
                                                style="color: blue;" target="_blanck">Reglamento
                                                v4.0 2019</a>
                                        </li>
                                        <h5 class="mt-2">A partir de marzo de 2019</h5>
                                        <li>
                                            <a href="../modelo/propuesta.docx" style="color: blue;"
                                                target="_blanck">Formato
                                                presentacion Propuesta</a>
                                        </li>
                                        <li>
                                            <a href="../modelo/guia_anteproyecto.pdf" style="color: blue;"
                                                target="_blanck">Guia
                                                Elaboracion Anteproyecto</a>
                                        </li>
                                        <li>
                                            <a href="../modelo/guia_documento.pdf" style="color: blue;"
                                                target="_blanck">Guia
                                                Elaboracion documento Final</a>
                                        </li>
                                        <li>
                                            <a href="../modelo/rubrica-poster.docx" style="color: blue;"
                                                target="_blanck">Rubrica
                                                - Presentación de Póster</a>
                                        </li>




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
                            <div class="col-md-6">
                                <div class="card card-warning">
                                    <div class="card-header" style="background-color: #B42A2A; color: white">
                                        <h5 class="card-title">Información General</h5>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <h5><b>Comite de proyectos de grado</b></h5>

                                            <br>
                                            <b>Ambiental-Industrial-Mecanica-Sistemas</b>
                                            <br>
                                            Espacio creado para el manejo y colaboración de Proyectos de
                                            grado
                                            <br>
                                            en la
                                            Facultad de Ingeniería de la Universidad Libre

                                        </center>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-warning">
                                    <div class="card-header" style="background-color: #B42A2A; color: white">
                                        <h5 class="card-title">Contacto</h5>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <b>Ing. Pablo E. Carreño H.</b>
                                            <br>
                                            Webmaster
                                            <br>
                                            pabloe.carreno@unilibre.edu.co
                                            <br>
                                            Programa Ingenieria de Sistemas
                                            <br>
                                            <b>Director:</b>
                                            Mauricio Alonso

                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card">
                                    <div class="card-header" style="background-color: #B42A2A; color: white">
                                        <h5 class="card-title">Diseño y programación</h5>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            Ing. Pablo E. Carreño H.
                                            <br>
                                            Ing. Mauricio A. Alonso M.
                                            <br>
                                            Ing. Fabian Blanco G.
                                            <br>
                                            Ing. Fredys A. Simanca H.
                                            <br>
                                            Ing. Santiago Patiño Hernández
                                            <br>
                                            Ing. Victor Cuellar
                                        </center>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal Help -->

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

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <div id="pestanas">
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
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
                                <a href='javascript:cambiarPestanna(pestanas,pestana5);' class="nav-link">
                                    <i class="nav-icon fa fa-times-circle white"></i>
                                    <p class="white">
                                        Rechazado
                                    </p>
                                </a>
                            </li>
                            <li id="pestana6" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana6);' class="nav-link">
                                    <i class="nav-icon fa fa-calendar-times white"></i>
                                    <p class="white">
                                        Proximo a Vencer
                                    </p>
                                </a>
                            </li>
                            <li id="pestana7" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana7);' class="nav-link">
                                    <i class="nav-icon fa fa-calendar-times white"></i>
                                    <p class="white">
                                        VB Director
                                    </p>
                                </a>
                            </li>
                            <li id="pestana8" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana8);' class="nav-link">
                                    <i class="nav-icon fa fa-file-archive white"></i>
                                    <p class="white">
                                        Otros Documentos
                                    </p>
                                </a>
                            </li>
                            <li id="pestana9" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana9);' class="nav-link">
                                    <i class="nav-icon fa fa-suitcase white"></i>
                                    <p class="white">
                                        Semillero
                                    </p>
                                </a>
                            </li>
                            <li id="pestana10" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana10);' class="nav-link">
                                    <i class="nav-icon fa fa-graduation-cap white"></i>
                                    <p class="white">
                                        Postgrado
                                    </p>
                                </a>
                            </li>
                            <li id="pestana11" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana11);' class="nav-link">
                                    <i class="nav-icon fa fa-flask white"></i>
                                    <p class="white">
                                        Aux Investigación
                                    </p>
                                </a>
                            </li>
                            <li id="pestana12" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana12);' class="nav-link">
                                    <i class="nav-icon fa fa-file white"></i>
                                    <p class="white">
                                        Documentos en Curso
                                    </p>
                                </a>
                            </li>
                            <li id="pestana13" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana13);' class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas
                                    </p>
                                </a>
                            </li>
                            <li id="pestana14" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana14);' class="nav-link">
                                    <i class="nav-icon fa fa-search white"></i>
                                    <p class="white">
                                        Buscar
                                    </p>
                                </a>
                            </li>
                            <li id="pestana15" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana15);' class="nav-link">
                                    <i class="nav-icon fa fa-users white"></i>
                                    <p class="white">
                                        Estudiantes
                                    </p>
                                </a>
                            </li>
                            <li id="pestana16" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana16);' class="nav-link">
                                    <i class="nav-icon fa fa-users white"></i>
                                    <p class="white">
                                        Profesores
                                    </p>
                                </a>
                            </li>
                            <li id="pestana17" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana17);' class="nav-link">
                                    <i class="nav-icon fa fa-users white"></i>
                                    <p class="white">
                                        Secretarios
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
                            <h1 id="Titulo">Documentos Registrados</h1>
                        </div>
                        <button id="idButtonSuccess" type="button" class="btn btn-success fade" data-toggle="modal"
                            data-target="#modal-success">
                            <i class="fas fa-door-open white"></i>
                        </button>


                    </div>

                </div>
            </section>
            <section class="content">

                <div class="container-fluid">
                    <div id="contenidopestanas">
                        <div id="cpestana1">

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
                                    <div class="info-box">
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
                                    <div class="info-box mb-3">
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
                                    <div class="info-box mb-3">
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
                                    <div class="info-box mb-3">
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

                            <!-- <input value="1" /> -->

                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Generar actas de Comite</h3>
                                    <div class="card-tools">
                                        <!--  <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left"
                                                onclick="location.reload();"></i></button> -->
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                class="fas fa-expand"></i></button>
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
                            <div class="card card-default">
                                <iframe id="idFrameEstudiantes" src="pages/15-Estudiantes.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana16">
                            <div class="card card-default">
                                <iframe id="idFrameProfesores" src="pages/16-Profesores.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                        <div id="cpestana17">
                            <div class="card card-default">
                                <iframe id="idFrameSecretari@s" src="pages/17-Secretari@s.php" width="100%"
                                    style="border: none;" frameborder="0" scrolling="no"
                                    onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b><?php echo date('Y')?></b>
            </div>
            <strong>
                Copyright © <a href="../../index.html">SI-COMMITEE</a> 2019</strong>
        </footer>



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
<script type="text/javascript" src="js/cambiarPestanna.js"></script>
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
    'idFrameCurso', 'idFrameActas', 'idFrameBuscar', 'idFrameEstudiantes', 'idFrameProfesores', 'idFrameSecretari@s'
];

function ReloadsFrames() {
    var ItemNow = localStorage.getItem("number");
    //debugger;
    //var Frames = ['idFrameGenerar', 'idFrameEvaluar', 'idFrameProceso', 'idFrameAplazar'];
    //var iframe = document.getElementById(Frames[(id - 1)]);
    var iframe = document.getElementById(Frames[ItemNow]);
    iframe.src = iframe.src;
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
        resizeIframe(FrameEvaluar, localStorage.getItem("evaluar"));
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
        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
    } else {
        if (px == 0) {
            //  obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
        } else {
            obj.style.height = px + "px";
        }

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
    resizeIframe(FrameEvaluar, localStorage.getItem("evaluar"));
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