<!DOCTYPE html>

<?php
session_start();
if(@!$_SESSION['user']) {
    header("Location: ../../index.html");
}
$corr=$_SESSION['user'];
date_default_timezone_set('America/Bogota');
$fecha = date("d-m-Y H:i:s");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr = $_SESSION['id'];
$tipousuario = 'Estudiante';
extract($_GET);
require("../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);

while ($arreglo = mysqli_fetch_array($query)) {
  //  utf8_decode($programa='Sistemas');

    $programa=$arreglo[11];

    $coordir=$arreglo[4];
    $passd=$arreglo[8];

    $foto = $arreglo[14];
    
    if ($arreglo[2] != 'Jurado') {
        require("../desconectar.php");
        header("Location:../../index.html");
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Secretaria</title>
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

    <script>
  /*  $(document).ready(function() {
        setTimeout(() => {
          //  document.getElementById("IdIconLoad").classList.add("d-none");
        }, 500);

    });
    */
    </script>

</head>
<style>
.white {
    color: white;
}
</style>

<body class="hold-transition sidebar-mini" onload="myfunction()">

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
                            <li id="pestana1" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana1);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-users white"></i>
                                    <p class="white">
                                        Usuarios
                                    </p>
                                </a>
                            </li>
                            
                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas
                                    </p>
                                </a>
                            </li>
                            
                        </ul>

                    </div>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Start Content-wrapper -->
        <div class="content-wrapper pb-2">
            <!--  <section class="content-header">
                <div class="container-fluid">
                </div>
            </section>
            -->
            <section id="content" class="content d-none">
                <div class="container-fluid pt-1">
                    <div id="contenidopestanas">
                        <div id="cpestana1">
                            <!-- <div class="card card-default">  -->
                            <iframe id="idFrame1" src="pages/1-Usuarios.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                            <!--   </div>  -->
                        </div>
                        <div id="cpestana2">
                            <iframe id="idFrame2" src="pages/2-Actas.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                        </div>
                        
                        
                    </div>
                </div>
            </section>
        </div>
        <!-- End Content-wrapper -->

        <!-- Footer -->
        <?php include '../footer.php'; ?>
        <!-- /. Footer -->

        <!-- Control Sidebar -->
        <?php include 'chat.php'; ?>
        <!-- /.control-sidebar -->

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
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- modal-end -->


    </div>


</body>

<script type="text/javascript" src="js/cambiarPestanna.js"></script>



<script type="text/javascript" src="js/CardChange.js"></script>


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

<script type="text/javascript" src="chat/chat.js"></script>
<!--<script type="text/javascript" src="js/SendHelp.js"></script> -->

</html>