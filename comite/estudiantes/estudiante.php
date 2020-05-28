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
    $programa = $arreglo[11];
    $fecha = date("d-m-Y H:i:s");
}

$query = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr");
while ($valores = mysqli_fetch_array($query)) {
    //$contador=$contador+1;
    //  var_dump($valores);
    $titulo = $valores[2];
    $fecha_propuesta = $valores[8];
    $uobservaciones = $valores[7];
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/Help/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/Help/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">


    <!---->

    <link rel="stylesheet" href="css/frag.css">










    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

    <script type="text/javascript" src="js/cambiarPestanna.js"></script>


</head>
<style>
    .white {
        color: white;
    }
</style>

<body class="hold-transition sidebar-mini">

    <div class="loader"></div>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#B42A2A; color: white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" style="color: white">Home</a>
                </li> -->

            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <li class="nav-item">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../desconectar.php" class="nav-link" style="color: white">Cerrar Sesión</a>
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #B42A2A; color: white">
            <!-- Brand Logo -->
            <a href="../../index.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SI-COMMITEE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="background-color: #B42A2A; color: white">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="color: white;"><?php echo $_SESSION['user']  ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <div id="pestanas">
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2);' class="nav-link">
                                    <i class="nav-icon fa fa-edit white"></i>
                                    <p class="white">
                                        Registrar Documento
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana3);" class="nav-link">
                                    <i class="nav-icon fas fa-copy white"></i>
                                    <p class="white">
                                        Documentos Registrados
                                    </p>
                                </a>
                            </li>
                            <li id="pestana4" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana4);" class="nav-link">
                                    <i class="nav-icon fa fa-book white"></i>
                                    <p class="white">
                                        Actas
                                    </p>
                                </a>
                            </li>
                            <li id="pestana1" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana1);' class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Ayuda
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>


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
                            <h1 id="Text">Documentos Registrados</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li id="Guia" class="breadcrumb-item active">Documentos Registrados</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <body onload="javascript:cambiarPestanna(pestanas,pestana2);">

                <section class="content">
                    <!--   <div class="row">
                        <div class="col-12"> -->
                    <div id="contenidopestanas">
                        <div id="cpestana1">


                            <!--Start-->



                            <div class="row">



                                <div class="col-md-6">
                                    <div class="card card-warning">

                                        <div class="card-header" style="background-color: #B42A2A; color: white">
                                            <h5 class="card-title">Envianos un comentario</h5>
                                        </div>

                                        <div class="card-body">


                                            <form id="loginForm" action="enviarmsgcoor.php" method="post">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- text input -->
                                                        <?php
                                                        $hoy = date("Y-m-d");;
                                                        ?>
                                                        <div class="form-group">
                                                            <label>Fecha</label>
                                                            <input type="text" name="fecha" class="form-control" value="<?php echo $hoy; ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Usuario</label>
                                                            <input type="text" name="user" class="form-control" placeholder="Nombre Estudiante.." value="<?php echo utf8_decode($_SESSION['user']); ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Carrera</label>
                                                            <input type="text" name="programa" class="form-control" placeholder="Nombre Estudiante.." value="<?php echo utf8_decode($programa); ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <!-- text input -->
                                                        <div class="form-group">

                                                            <textarea class="form-control" rows="6" name="comen" cols="29" placeholder="Escriba su comentario" aria-required="true"></textarea>

                                                        </div>
                                                    </div>






                                                </div>

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-default" name="enviar">Enviar</button>

                                                </div>


                                            </form>

                                        </div>


                                    </div>
                                    <div class="card card-warning">

                                        <div class="card-header" style="background-color: #B42A2A; color: white">
                                            <h5 class="card-title">Documentacion</h5>
                                        </div>

                                        <div class="card-body">




                                            <div class="col-sm-12">
                                                <iframe src="https://docs.google.com/viewer?url=http://5.189.175.156/comite/committeees.pdf&embedded=true" width="100%" height="600" style="border: none;"></iframe>

                                            </div>










                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">


                                    <div class="card card-warning">

                                        <div class="card-body">


                                            <div class="box box-solid">

                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="box-group" id="accordion">
                                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                                        <div class="panel box box-primary">
                                                            <div class="card card-warning">
                                                                <div class="card-header" style="background-color: #B42A2A; color: white">
                                                                    <div class="box-header with-border">
                                                                        <h4 class="box-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="" style="color: white">
                                                                                Para Recordar
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                                                                <div class="card card-warning" style="background-color: #ffff; color: black">
                                                                    <div class="card-body">
                                                                        <div class="box-body">
                                                                            <b>Registrar Documentos....</b>
                                                                            </br>
                                                                            <li>Los archivos en formato pdf. Ej:
                                                                                123456789.pdf, recuerde que debe estar
                                                                                en
                                                                                los formatos dispuesto por el comite.
                                                                                </br>
                                                                            <li>Para solicitudes y/o casos especiales,
                                                                                por
                                                                                favor enviar correo electronico al
                                                                                comite de
                                                                                su programa, para ayuda con el
                                                                                SI-COMMITTEE,
                                                                                envie un correo a
                                                                                pabloe.carrenoh@unilibre.edu.co.

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="panel box box-danger">

                                                            <div class="card card-warning">
                                                                <div class="card-header" style="background-color: #B42A2A; color: white">
                                                                    <div class="box-header with-border">
                                                                        <h4 class="box-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false" style="color: white">
                                                                                Importante
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div id="collapseTwo" class="panel-collapse collapse in" aria-expanded=" false">
                                                                <div class="card card-warning">
                                                                    <div class="card-body">
                                                                        <div class="box-body">
                                                                            Este es un recurso para estar informado de
                                                                            lo que esta sucediendo en el comite, por
                                                                            favor solo comentarios académicos
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel box box-success">

                                                            <div class="card card-warning">
                                                                <div class="card-header" style="background-color: #B42A2A; color: white">

                                                                    <div class="box-header with-border">
                                                                        <h4 class="box-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false" style="color: white">
                                                                                Documentos
                                                                            </a>
                                                                        </h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="collapseThree" class="panel-collapse collapse show" aria-expanded="false">
                                                                <div class="card card-warning">
                                                                    <div class="card-body">
                                                                        <div class="box-body">
                                                                            <button type="button" class="btn btn-block btn-warning">Reglamento
                                                                                v3.0</button>

                                                                            <button type="button" class="btn btn-block btn-warning">Reglamento
                                                                                v4.0 2019</button>
                                                                            <button type="button" class="btn btn-block btn-warning">Formato
                                                                                presentacion Propuesta</button>
                                                                            <button type="button" class="btn btn-block btn-warning">Guia
                                                                                Elaboracion documento Final</button>
                                                                            <button type="button" class="btn btn-block btn-warning">Rubrica
                                                                                - Presentación de Póster</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->





                                        </div>


                                    </div>
                                </div>

                            </div>












                            <!--End-->















                        </div>
                        <!--termina pestana1-->

                        <div class="row">
                            <div class="col-12">

                                <div id="cpestana2">
                                    <div class="card card-warning">
                                        <div class="card-header" style="background-color: #343a40; color: white">
                                            <h5 class="card-title">Los archivos en formato pdf. Ej:
                                                123456789.fa-file-pdf , recuerde que debe estar en los
                                                formatos dispuesto por el comite</h5>




                                        </div>
                                        <!-- /.card-header -->







                                        <!-- /.card-header -->
                                        <?php
                                        require("../connect_db.php");
                                        $sql = ("SELECT * FROM login where id='$pr'");
                                        $query = mysqli_query($mysqli, $sql);
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $programa = $arreglo[11];
                                        }

                                        ?>


                                        <div class="card-body">

                                            <form id="loginForm" action="validacionp.php" method="post" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input type="text" name="ID_estudiante" class="form-control" placeholder="Nombre Estudiante.." value="<?php echo '' . $_SESSION['user'] . ''; ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Id</label>
                                                            <input type="text" name="ID_estudiante" value="<?php echo '' . $_SESSION['id'] . ''; ?>" class="form-control" placeholder="Id Estudiante.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Estado</label>
                                                            <input type="text" class="form-control" name="terminado" id="terminado" value="<?php echo '0'; ?>" placeholder="Estado..." readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $contador = 0;
                                                    require("../connect_db.php");

                                                    $query = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and ID_estado='Entrega Propuesta'");
                                                    while ($valores = mysqli_fetch_array($query)) {
                                                        $contador = $contador + 1;

                                                        $ID_tesis = $valores[0];
                                                        $id_estudiante2 = $valores[18];
                                                        $titulo = $valores[3];
                                                        $ID_estado = $valores[5];
                                                        $fecha_propuesta = $valores[9];
                                                        $fecha_aprob_propuesta = $valores[10];
                                                        $Observaciones = $uobservaciones;
                                                    }

                                                    if ($contador == 0) { ?>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Fecha</label>
                                                                <input type="text" class="form-control" placeholder="28/02/2020" readonly="readonly">
                                                            </div>
                                                        </div>

                                                        <form role="form">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label>Titulo</label>
                                                                    <textarea class="form-control" rows="3" placeholder="Escriba el titulo"></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </form>
                                                </div>

                                            <?php

                                                    } else {
                                            ?>


                                                <!-- /.card-body -->
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Fecha Propuesta</label>
                                                        <input type="text" id="fecha_propuesta" name='fecha_propuesta' class="form-control" value="<?php echo '' . $fecha_propuesta . ''; ?>" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Fecha Aprobacion Propuesta</label>
                                                        <input type="text" class="form-control" name="fecha_aprob_propuesta" id="fecha_aprob_propuesta" value="<?php echo '' . $fecha_aprob_propuesta . ''; ?>" readonly="readonly">
                                                    </div>
                                                </div>
                                        </div>

                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Titulo del proyecto y/o nombre del documento</label>
                                                    <textarea class="form-control" rows="3" placeholder="Escriba el titulo..." readonly="readonly"><?php echo '' . $titulo . ''; ?></textarea>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </form>
                                    </div>
                                <?php
                                                    }
                                ?>

                                <!-- /.card-header -->




                                <div class="card-header" style="background-color: #343a40; color: white">
                                    <h3 class="card-title">Registrar otro integrante
                                    </h3>
                                </div>

                                <div class="card-header" style="background-color: rgb(177, 55, 55); color: white">
                                    <h3 class="card-title">Si tiene <b>otro integrante</b>, escriba su numero de
                                        Id proporcionado por el
                                        sistema, sin puntos o espacios. Ej: 70
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Id otro
                                                        integrante...</label>
                                                    <input type="text" name="ID_estudiante1" class="form-control ID_estudiante1" id="exampleInputEmail1" placeholder="Id otro integrante...">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tipo de documento:</label>
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option></option>
                                                        <?php
                                                        $contador = 0;
                                                        require("../connect_db.php");
                                                        $query = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and ID_estado='Entrega Propuesta'");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            $contador = $contador + 1;
                                                            $titulo = valores[2];
                                                            $fecha_propuesta = date("Y-m-d H:i:s");
                                                        }
                                                        if ($contador == 0) { ?>
                                                            <option value="Entrega Propuesta">Entrega Propuesta
                                                            </option><br>
                                                            <option value="Entrega Poster">Entrega Poster</option>
                                                            <option value="Certificado de Notas">Certificado de
                                                                Notas</option>
                                                            <option value="Certificado terminacion Materias">
                                                                Certificado terminación materias
                                                            </option>
                                                            <option value="Solicitud opción de grado">Carta
                                                                solicitud opción de grado</option>
                                                    </select>
                                                    <?php
                                                        } else {
                                                            $contador = 0;
                                                            require("../connect_db.php");
                                                            $query = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and ID_estado='Entrega Proyecto'");
                                                            while ($valores = mysqli_fetch_array($query)) {
                                                                $contador = $contador + 1;
                                                                $titulo = valores[2];
                                                                $fecha_propuesta = valores[9];
                                                                $fecha_aprob_propuesta = valores[10];
                                                                $fecha_ent_anteproyecto = valores[11];
                                                                $jurado1 = valores[13];
                                                                $jurado2 = valores[14];
                                                                $Observaciones = $uobservaciones;
                                                            }
                                                            if ($contador == 0) {
                                                    ?>
                                                        <option value="Correccion Propuesta">Corrección Propuesta
                                                        </option>
                                                        <option value="Correccion Poster">Corrección Poster</option>
                                                        <option value="Cancelar Propuesta">Carta - Cancelar
                                                            Propuesta</option>
                                                        <option value="Entrega Anteproyecto">Entrega Anteproyecto
                                                        </option>
                                                        <option value="Correccion Proyecto">Corrección Proyecto
                                                        </option>
                                                        <option value="Prorroga">Carta - Solicitar Prorroga</option>
                                                        <option value="Certificado de Notas">Certificado de Notas
                                                        </option>
                                                        <option value="Certificado terminacion Materias">Certificado
                                                            terminación materias</option>
                                                        </select>
                                                        <?php
                                                            } else {
                                                                $contador = 0;
                                                                require("../connect_db.php");
                                                                $query = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and ID_estado='Entrega Proyecto'");
                                                                while ($valores = mysqli_fetch_array($query)) {
                                                                    $contador = $contador + 1;
                                                                    $titulo = valores[2];
                                                                    $fecha_propuesta = valores[9];
                                                                    $fecha_aprob_propuesta = valores[10];
                                                                    $fecha_ent_anteproyecto = valores[11];
                                                                    $jurado1 = valores[13];
                                                                    $jurado2 = valores[14];
                                                                    $Observaciones = $uobservaciones;
                                                                }
                                                                if ($contador == 0) {
                                                        ?>
                                                            <option value="Cancelar Anteproyecto">Carta - Cancelar
                                                                Anteproyecto</option>
                                                            <option value="Correccion Anteproyecto">Corrección
                                                                Anteproyecto</option>
                                                            <option value="Entrega Proyecto">Entrega Proyecto</option>
                                                            <option value="Prorroga">Carta - Solicitar Prorroga</option>
                                                            <option value="Certificado de Notas">Certificado de Notas
                                                            </option>
                                                            <option value="Certificado terminacion Materias">Certificado
                                                                terminación materias</option>
                                                            </select>
                                                            <?php
                                                                } else {
                                                                    $contador = 0;
                                                                    require("../connect_db.php");
                                                                    $query = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and ID_estado='Entrega Monografia'");
                                                                    while ($valores = mysqli_fetch_array($query)) {
                                                                        $contador = $contador + 1;
                                                                        $titulo = valores[2];
                                                                        $fecha_propuesta = valores[9];
                                                                        $Observaciones = $uobservaciones;
                                                                        $jurado1 = valores[13];
                                                                        $jurado2 = valores[14];
                                                                    }
                                                                    if ($contador == 0) {
                                                            ?>
                                                                <option value="Correccion Poster">Correcciónes Poster
                                                                </option>
                                                                <option value="Correccion Proyecto">Corrección Proyecto
                                                                </option>
                                                                <option value="Prorroga">Carta - Solicitar Prorroga</option>
                                                                <option value="Renuncia al proyecto">Carta - Renuncia al
                                                                    proyecto</option>
                                                                <option value="Certificado de Notas">Certificado de Notas
                                                                </option>
                                                                <option value="Certificado terminacion Materias">Certificado
                                                                    terminación materias</option>
                                                                </select>
                                                            <?php
                                                                    } else {

                                                            ?>
                                                                <option value="Cancelar Proyecto">Carta - Cancelar Proyecto
                                                                </option>
                                                                <option value="Renuncia al proyecto">Carta - Renuncia al
                                                                    proyecto</option>
                                                                <option value="Correccion Proyecto">Correcciones proyecto
                                                                </option>
                                                                <option value="Prorroga">Carta - Solicitar Prorroga</option>
                                                                <option value="Certificado de Notas">Certificado de Notas
                                                                </option>
                                                                <option value="Certificado terminacion Materias">Certificado
                                                                    terminación materias</option>
                                                                </select>
                                                <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Opcion de grado: </label>
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option></option>
                                                        <option value="0">Proyecto</option>
                                                        <option value="1">Semillero</option>
                                                        <option value="3">Auxiliar de Investigación</option>
                                                        <option value="4">Posgrado</option>
                                                        <option value="2">Curso/Diplomado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Director</label>
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option></option>
                                                        <option value="No aplica">No aplica (Poster)</option>
                                                        <option value="No aplica">No aplica (Otros)</option>
                                                        <option value="Por definir">No tengo director</option>
                                                        <?php
                                                        $contador = 0;
                                                        require("../connect_db.php");
                                                        $query = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and ID_estado='Entrega Propuesta'");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            $contador = $contador + 1;
                                                            $titulo = valores[2];
                                                            $fecha_propuesta = valores[8];
                                                        }
                                                        $coor = "Coordinador";
                                                        require("../connect_db.php");
                                                        $dir = "Director";
                                                        $query = $mysqli->query("SELECT * FROM login where (TipoUsuario='$dir' or tipoUsuario='$coor' or tipoUsuario='Cifi')  ORDER BY  user asc");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            echo '<option value="' . $valores[user] . '">' . $valores[user] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Programa:</label>
                                                    <input type="text" class="form-control" name="programa" id="programa" value="<?php echo '' . $programa . ''; ?>" placeholder="Programa" readonly="readonly">
                                                </div>
                                            </div>




                                        </div>


                                        <!-- /.card-body -->
                                </div>

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body">
                                        <div class="form-group">

                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="archivo" id="archivo" class="custom-file-input" accept=".pdf" required>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file - Tamaño menor a
                                                        5Mb</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-header" style="background-color: transparent; color: black">
                                            <h3 class="card-title">Recuerde que si documento es
                                                <b>Monografía</b>, debe anexar al final del archivo, el
                                                certificado de terminación de materias

                                            </h3>
                                            <br>
                                            <h3 class="card-title">Recuerde que si documento es
                                                <b>Poster</b>, debe cumplir con la Rúbrica -
                                                Presentación de Póster
                                            </h3>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" id="login" value="Registrar" class="btn btn-primary float-right" style="background-color: green; margin-bottom: 10px ">Registrar</button>

                                    </div>
                                </form>
                                <div class="card-header" style="background-color: #343a40; color: white">
                                    <h3 class="card-title">
                                        <b>Los archivos</b>, si el archivo es grande por
                                        favor espere a que cargue y luego, si haga clic en Registrar,
                                        recuerde que para el caso de si sube archivos duplicados esto se
                                        sobre escribe

                                    </h3>

                                </div>
                                <div class="card-header" style="background-color: rgb(177, 55, 55); color: white">
                                    <h3 class="card-title">
                                        <b>Fechas reuniones Comité Ingeniería de Sistemas...
                                            2020-1,
                                            Enero 29, Febrero 19, Marzo 18, Abril 22, Mayo 20, Junio 17</b>

                                    </h3>

                                </div>

                                </div>


                            </div>
                        </div>
                        <div id="cpestana3">


                            <div class="card">
                                <div class="card-header" style="background-color: #343a40; color: white">
                                    <h3 class="card-title">Fechas reuniones Comité Ingeniería de Sistemas...
                                        2020-1, Enero 29, Febrero 19, Marzo 18, Abril 22, Mayo 20, Junio 17.
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    require('../connect_db.php');
                                    //  $est = 5;
                                    $sql = ("SELECT * FROM tesis where ID_estudiante='$est' or ID_estudiante1='$est'");
                                    $query = mysqli_query($mysqli, $sql);

                                    ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Titulo de Documento</th>
                                                <th>Director</th>
                                                <th>Estado</th>
                                                <th>Disposiciones</th>
                                                <th>Archivo</th>
                                                <th>Fecha</th>
                                                <th>CIFI</th>
                                                <th>Evaluación pdf</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            while ($arreglo = mysqli_fetch_array($query)) {
                                                $ID_tesis = $arreglo[0];
                                                $id_estudiante2 = $arreglo[18];

                                                if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                    $alma = "./propuestas";
                                                } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                    $alma = "./anteproyectos";
                                                } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                    $alma = "./proyectos";
                                                } else if ($arreglo[6] == "Certificado de Notas") {
                                                    $alma = "./certinotas";
                                                } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                    $alma = "./certimat";
                                                } else if ($arreglo[6] == "Prorroga") {
                                                    $alma = "./prorrogas";
                                                } else {
                                                    $alma = "./otros";
                                                }

                                                if ($id_estudiante2 == 1 or $id_estudiante2 == 3) {


                                                    echo "<tr>";
                                                    echo "<td>$arreglo[3]</td>";
                                                    echo "<td>$arreglo[5]</td>";
                                                    echo "<td>$arreglo[6]</td>";
                                                    echo "<td>$arreglo[7]</td>";
                                                    echo "<td style='color: red'><a href=$alma/$arreglo[8]>$arreglo[8]</a></td>";
                                                    echo "<td>$arreglo[9]</td>";
                                                    echo "<td></td>";
                                                    /*echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";*/
                                                    /*echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";*/
                                                    echo "</tr>";
                                                } else {
                                                    echo "<tr>";
                                                    echo "<td>$arreglo[3]</td>";
                                                    echo "<td>$arreglo[5]</td>";
                                                    echo "<td>$arreglo[6]</td>";
                                                    echo "<td>$arreglo[7]</td>";
                                                    echo "<td style='color: red'><a href=$alma/$arreglo[8]>$arreglo[8]</a></td>";
                                                    echo "<td>$arreglo[9]</td>";
                                                    echo "<td>No Aplica</td>";
                                                    /* echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";*/
                                                    if ($arreglo[6] == 'Entrega Proyecto') {
                                                        echo "<td><a href='./pdf/verevalproy.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";
                                                    } else if ($arreglo[6] == 'Entrega Poster') {
                                                        echo "<td><a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";
                                                    } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                        echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";
                                                    } else {
                                                        echo "<td><font color='black' size='2'>N/A</font></td>";
                                                    }
                                                    echo "</tr>";
                                                    //  $total1++;

                                                    //echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div id="cpestana4">
                            <!--<input value="4">-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>

                                <div class="card-body">

                                    <?php

                                    require('../connect_db.php');
                                    $sql = ("SELECT * FROM actas where programa='$programa' ORDER BY  numero DESC");

                                    $query = mysqli_query($mysqli, $sql);
                                    ?>
                                    <!-- /.card-header -->

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Acta No.</th>
                                                <th>Fecha Publicacion</th>
                                                <th>Ver Acta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($arreglo = mysqli_fetch_array($query)) {
                                                echo "<tr>";
                                                echo "<td>$arreglo[1]</td>";
                                                echo "<td>$arreglo[4]</td>";
                                                //echo "<td bgcolor='797D7F' align='center'><a href='./pdf/veracta.php?numero=$arreglo[1]&programaa=$programa&idc=$pr' target='_blanck'><img src='images/pdf.png' width='40'  height='30' class='img-rounded'></td>";
                                                echo "<td><a href='pdf/$arreglo[6]'><i class='nav-icon fas fa-download'></i></td>";
                                                //echo "<td><a href='./pdf/veracta.php?numero=$arreglo[1]' target='_blank'><img src='images/pdf.png' width='50'  height='50' class='img-rounded'></td>";
                                                //echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='images/eliminar.png' width='38'  height='38' class='img-rounded'/></a></td>";

                                                //echo "</tr>";

                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>


                    </div>



        </div>

    </div>
    </section>


    <!-- /.content -->
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
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


</body>

</html>