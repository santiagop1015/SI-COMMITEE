<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../Login/index.html");
}
date_default_timezone_set('America/Bogota');
$pr = $_SESSION['id'];
$est = $_SESSION['id'];

require("../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);


while ($arreglo = mysqli_fetch_array($query)) {
    //var_dump($arreglo);
    $nombre = $arreglo[3];
    $correo = $arreglo[4];
    $cedula = $arreglo[1];
    $tipouser = $arreglo[2];
   // die();
    $programa = $arreglo[11];
    $fecha = date("d-m-Y H:i:s");
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Estudiante</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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


    <!-- Ayuda -- CSS -->
    <script rel="stylesheet" src="dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="dist/css/Help/font-awesome.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">


</head>
<style>
.white {
    color: white;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>

</script>


<body class="hold-transition sidebar-mini">

    <div class="loader"></div>
    <div class="wrapper">

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
                    <a class="nav-link" href="../desconectar.php">
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
                <div class="user-panel pt-3 pb-3 pb-3 d-flex" style="background: rgb(180, 42, 42);">
                    <div class="image">
                        <img src="dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>

                    <div class="info">
                        <a href="#" class="d-block" style="color: white;">
                            <?php 
                        $usuario = $_SESSION['user'];
                        $posicion_espacio = strpos($usuario, " ");
                        $usuario=substr($usuario,0,$posicion_espacio);
                        echo $usuario;?>
                        </a>
                    </div>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <div id="pestanas">
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            <li id="pestana2" class="nav-item">
                                <a href='javascript:toEstudiante(1);' class="nav-link">
                                    <i class="nav-icon fa fa-edit white"></i>
                                    <p class="white">
                                        Registrar Documento
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item">
                                <a href="javascript:toEstudiante(2);" class="nav-link">
                                    <i class="nav-icon fas fa-copy white"></i>
                                    <p class="white">
                                        Documentos Registrados
                                    </p>
                                </a>
                            </li>
                            <li id="pestana4" class="nav-item">
                                <a href="javascript:toEstudiante(3);" class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas
                                    </p>
                                </a>
                            </li>
                            <li id="pestana1" class="nav-item">
                                <a href='javascript:toEstudiante(0);' class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Ayuda
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <script>
                function toEstudiante(numero) {
                    localStorage.setItem("number", numero);
                    location.replace("estudiante.php");
                }
                </script>


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
                            <h1 id="Text">Perfil</h1>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#" data-toggle="control-sidebar"><i
                                            class="nav-icon fa fa-user-md black"></i>
                                    </a></li>
                                <li id="Guia" class="breadcrumb-item active">Documentos Registrados</li>
                            </ol>
                        </div>  -->
                    </div>

                </div>

            </section>


            <!--    <body onload="javascript:cambiarPestanna(pestanas,pestana2);">  -->
            <section class="content">
                <!--   <div class="row">
                        <div class="col-12"> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="dist/img/avatar-user.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo $nombre; ?></h3>

                                    <p class="text-muted text-center">
                                        <?php echo $tipouser ?>
                                    </p>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Programa</strong>

                                    <p class="text-muted">
                                        <!--  $nombre = $arreglo[3];
                                        $correo = $arreglo[4];
                                        $codigo = $arreglo[1];
                                        $tipouser = $arreglo[2];
                                        -->
                                        <?php
                                        echo $programa;  
                                        ?>

                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Correo</strong>

                                    <p class="text-muted"><?php echo $correo ?></p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Ciudad</strong>

                                    <p class="text-muted">Bogota D.C</p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Cedula</strong>

                                    <p class="text-muted"><?php echo $cedula ?></p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


            </section>

        </div>


        <!-- /.content -->

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>2020</b>
            </div>
            <strong>Universidad Libre - <a href="Universidad Libre">SI-COMMITEE</a>.</strong>
        </footer>




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

    </div>
    <!-- ./wrapper -->


</body>

<script type="text/javascript" src="chat/chat.js"></script>


</html>