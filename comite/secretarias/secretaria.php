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
                    <a class="nav-link" data-toggle="modal" data-target="#IdButtonHelp">
                        <i id="idIconClassHelp" class="fas fa-question-circle white"></i>
                    </a>
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
                    <a class="nav-link" data-toggle="modal" data-target="#IdButtonLogout">
                        <i class="fas fa-door-open white"></i>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Modal cerrar sesion -->
        <div class="modal fade" id="IdButtonLogout" tabindex="-1" role="dialog"
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Ayuda</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="container-fluid" style="padding: 15px 15px 15px 15px;">
                        <div class="callout callout-info" style="border-left-color: #B42A2A;">

                            Para solicitudes y/o casos especiales, por favor enviar correo
                            electronico
                            al comite de su programa, para ayuda con el SI-COMMITTEE, envie un
                            correo a
                            pabloe.carrenoh@unilibre.edu.co.

                        </div>
                        <div class="callout callout-info" style="border-left-color: #B42A2A;">

                            Este es un recurso para estar informado de lo que esta sucediendo en el
                            comite, por favor solo comentarios académicos

                        </div>
                        <div class="card card-warning">
                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                <h5 class="card-title">Envianos un comentario</h5>
                            </div>
                            <div class="card-body">
                                <form id="idFormComen">
                                    <div class="row">
                                        <div class="col-sm-12">
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
                                                    value="<?php echo utf8_decode($programa); ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <textarea id="idTextAreaComen" class="form-control" rows="6" name="comen"
                                                    cols="29" placeholder="Escriba su comentario"
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
                                            class="btn btn-secondary float-right">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="callout callout-info" style="border-left-color: #B42A2A; margin-bottom: 0px">

                            Documentos: <br><br>
                            <li>
                                <a href="../modelo/Reglamento.pdf" style="color: blue;" target="_blanck">Reglamento v3.0</a>
                            </li>
                            <li>
                                <a href="../modelo/reglamento-grados-ingenieria-2019.pdf" style="color: blue;" target="_blanck">Reglamento
                                    v4.0 2019</a>
                            </li>
                            <li>
                                <a href="../modelo/propuesta.docx" style="color: blue;" target="_blanck">Formato
                                    presentacion Propuesta</a>
                            </li>
                            <li>
                                <a style="color: blue;" target="_blanck">Guia
                                    Elaboracion Anteproyecto</a>
                            </li>
                            <li>
                                <a style="color: blue;" target="_blanck">Guia
                                    Elaboracion documento Final</a>
                            </li>
                            <li>
                                <a href="../modelo/propuesta.docx" style="color: blue;" target="_blanck">Rubrica
                                    - Presentación de Póster</a>
                            </li>

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
            <section class="content">
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
            <strong>Universidad Libre - <a href="../../index.html">SI-COMMITEE</a>.</strong>


        </footer>

        <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Busqueda de usuarios</h4>
                        <button id="idButtonCloseModal" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="idFormSearchUser">
                        <div class="modal-body">


                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->

                                    <div class="form-group">
                                        <label>Nombre Usuario</label>
                                        <input type="text" class="form-control" id="idNombreUsuario"
                                            placeholder="Escriba Nombre" style="MozUserSelect:None;">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Programa</label>
                                        <!--  <select value="<?php echo $programa; ?>" class="form-control">
                                        <option value="">-- Seleccione --</option>
                                        <option value="Sistemas">Sistemas</option>
                                        <option value="Industrial">Industrial</option>
                                        <option value="Mecanica">Mecanica</option>
                                        <option value="Ambiental">Ambiental</option>
                                    </select>
                                    -->
                                        <input type="text" class="form-control" value="<?php echo $programa; ?>"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="direct-chat" style="
                         background: #343a40;
                         bottom: 0;
                         color: #fff;
                         height: fit-content;
                         overflow: auto;
                         top: 0;
                         width: 100%;
                         max-height: 250px">
                                <div class="direct-chat-messages" style="padding: 0px;height: fit-content;">
                                    <ul id="idContactsSearch" class="contacts-list mb-0">

                                    </ul>


                                </div>

                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-default fade">Close</button>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <!-- Control Sidebar -->
        <aside id="idAside" class="control-sidebar control-sidebar-dark position-fixed"
            style="border-radius: .25rem; height: 90%;">
            <!-- Control sidebar content goes here -->

            <div id="idCard" class="card direct-chat direct-chat-primary direct-chat-contacts-open"
                style="position: relative; left: 0px; top: 0px; height: 100%">
                <div class="card-header ui-sortable-handle" style="">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                        <button id="idButtonUsers" type="button" class="btn btn-tool" data-toggle="modal"
                            data-target="#modal-lg">
                            <i class="fa fa-users"></i>
                        </button>

                        <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                        Launch Large Modal
                    </button>
                        -->
                        <button id="idButtonMessages" type="button" class="btn btn-tool" data-toggle="tooltip"
                            title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                        </button>

                        <button type="button" class="btn btn-tool" data-widget="control-sidebar" data-slide="true"><i
                                class="fas fa-times"></i>
                            <!-- 
                                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="far fa-comments white"></i>
                    </a>
                            -->
                        </button>
                    </div>

                </div>

                <div id="idCardNameChat" class="card-header ui-sortable-handle" style="
                          padding-left: 5px;
                          padding-top: 5px;
                          display: None;
                         ">

                    <h3 id="idNameChat" class="card-title" style="color: rgb(33, 37, 41); font-size: 14px;">
                        Seleccione un Chat</h3>

                </div>


                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div id="idContainerFather" class="direct-chat-messages" style="height: 100%">
                        <!-- <div class="card-header ui-sortable-handle" style="
                          padding-left: 5px;
                          padding-top: 5px;
                         ">
                        <h3 id="idNameChat" class="card-title" style="color: black;">
                            US-Visitors Report</h3>
                    </div>
                    -->
                        <div id="idContainerMessages" class="ContainerMessages">

                        </div>

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts" style="height: 100%; border-radius: .25rem;">
                        <ul id="idContactsList" class="contacts-list mb-0">

                        </ul>
                        <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div id="idFormChat" class="card-footer" style="display: none;">

                    <form id="idFormSendMessage">

                        <div id="idEnviarMensaje" class="input-group">
                            <input id="idMessage_Content" type="text" name="message" placeholder="Escribe un mensaje"
                                class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary send_chat">Enviar</button>
                            </span>
                        </div>
                    </form>

                </div>
                <!-- /.card-footer-->
            </div>


        </aside>
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
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"
                            >Cerrar</button>
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