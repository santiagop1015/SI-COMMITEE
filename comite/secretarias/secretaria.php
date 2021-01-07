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
 $foto = $arreglo[14];

 if ($arreglo[2]!='Secretaria') {
	require("../desconectar.php");
	header("Location:../../index.html");
}
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Sec. Académica</title>
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
                    <div id="infoUser" class="user-panel mt-3 pb-3 mb-3 d-flex">
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

                            <li id="pestana1" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana1);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas
                                    </p>
                                </a>
                            </li>
                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);ReloadsFrames();'
                                    class="nav-link">
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
                            <div class="card card-default">
                                <iframe id="idFrameActas" src="pages/1-Actas.php" width="100%" style="border: none;"
                                    frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>

                        <div id="cpestana2">
                            <!-- <div class="card card-default"> -->
                            <iframe id="idFrameUsuarios" src="pages/2-Usuarios.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                            <!-- </div> -->
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
var Frames = ['idFrameActas', 'idFrameUsuarios'];

function ReloadsFrames(param) {
    var ItemNow = localStorage.getItem("number");
    //debugger;
    //var Frames = ['idFrameGenerar', 'idFrameEvaluar', 'idFrameProceso', 'idFrameAplazar'];
    //var iframe = document.getElementById(Frames[(id - 1)]);
    if (!param) {
        // if (ItemNow != "15") {
        var iframe = document.getElementById(Frames[ItemNow]);
        iframe.src = iframe.src;
        if (ItemNow == "1") {
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