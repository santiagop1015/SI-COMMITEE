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

 if ($arreglo[2]!='Administrador') {
	require("../desconectar.php");
	header("Location:../Login/index.html");
}
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Administrador</title>
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
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="far fa-comments white"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link"
                        href="javascript:localStorage.removeItem('number');location.replace('../desconectar.php');">
                        <i class="fas fa-door-open white"></i>
                    </a>

                </li>

            </ul>
        </nav>
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

                            <!-- <input value="1" /> -->

                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Generar actas de Comite</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left"
                                                onclick="location.reload();"></i></button>
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

        <!-- Control Sidebar -->

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
    'idFrameCurso', 'idFrameActas', 'idFrameBuscar', 'idFrameEstudiantes', 'idFrameProfesores'
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
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
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

</html>