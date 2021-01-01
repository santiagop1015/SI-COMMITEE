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
    <link rel="stylesheet" href="LocalSources/css/ionicons.min.css">

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
    <link href="LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <script src="LocalSources/ajax/jquery/2.0.3/jquery.min.js"></script>

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
                    <!--   <script>
                    $(document).on("click", "#idHelpIcon", function() {
                        var iconHelpBar = document.getElementById("idIconClassHelp");
                        if (iconHelpBar.className == "far fa-question-circle white") {
                            iconHelpBar.className = "fas fa-question-circle white";
                        } else {
                            iconHelpBar.className = "far fa-question-circle white";
                        }
                    });
                    </script> -->
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
        <div class="modal fade" id="idModalLogout" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <?php
                              if($programa=='Sistemas'){
                            ?>
                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas Sistemas
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana3);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas Industrial
                                    </p>
                                </a>
                            </li>
                            <?php
                            } else if($programa=='Ambiental'){
                            ?>
                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas Ambiental
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item" style="display: none;">

                            </li>
                            <?php
                            } else if($programa =='Mecanica') {
                            ?>
                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);ReloadsFrames();'
                                    class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas Mecanica
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item" style="display: none;">

                            </li>
                            <?php
                            }
                            ?>
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
                        <?php if($programa=='Sistemas'){?>
                        <div id="cpestana2">
                            <iframe id="idFrame2" src="pages/2-ActasSistemas.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                        </div>
                        <div id="cpestana3">
                            <iframe id="idFrame3" src="pages/3-ActasIndustrial.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                        </div>
                        <?php } else if($programa=='Ambiental'){?>
                        <div id="cpestana2">
                            <iframe id="idFrame2" src="pages/4-ActasAmbiental.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                        </div>
                        <div id="cpestana3">
                        </div>
                        <?php } else if($programa=='Mecanica'){?>
                        <div id="cpestana2">
                            <iframe id="idFrame2" src="pages/5-ActasMecanica.php" width="100%" style="border: none;"
                                frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                        </div>
                        <div id="cpestana3">
                        </div>
                        <?php }?>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Content-wrapper -->

        <footer class="main-footer">
            <button id="idButtonModal" type="button" class="btn btn-success" style="display: none;" data-toggle="modal"
                data-target="#modal-success">
                <i class="fas fa-door-open white"></i>
            </button>
            <div class="float-right d-none d-sm-block">
                <b><?php echo date('Y')?></b>
            </div>
            <strong>
                Copyright © <a href="../../index.html">SI-COMMITEE</a> 2019</strong>
        </footer>

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
<script type="text/javascript" src="js/SendHelp.js"></script>

</html>