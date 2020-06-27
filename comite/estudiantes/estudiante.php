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

$raiz = "../archivos";
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

    <!-- <script type="text/javascript" src="js/cambiarPestanna.js"></script> -->


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


<body class="hold-transition sidebar-mini" onload="myfunction()">

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
                    <a class="nav-link"
                        href="javascript:localStorage.removeItem('number');location.replace('../desconectar.php');">
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
                <div id="contenidopestanas">
                    <!--Pestana1-->
                    <div id="cpestana1">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-warning">
                                        <div class="card-header" style="background-color: #B42A2A; color: white">
                                            <h5 class="card-title">Envianos un comentario</h5>
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
                                                                name="comen" cols="29"
                                                                placeholder="Escriba su comentario"
                                                                aria-required="true"></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <!--  <button type="submit" class="btn btn-default"
                                                    name="enviar">Enviar</button>
                                                    -->
                                                    <div id="idBoxComen"
                                                        class="alert alert-danger alert-dismissible mt-6"
                                                        style="Display: None;">
                                                        <h5>
                                                            <i id="idIConBoxComen" class="icon fas fa-ban"></i>
                                                            Alerta
                                                        </h5>
                                                        <p id="idMessageComen"></p>

                                                    </div>
                                                    <button id="idButtonEnviarComen" type="submit"
                                                        class="btn btn-primary float-right">Enviar</button>
                                                </div>


                                                <script>

                                                </script>

                                            </form>


                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card card-warning">
                                        <div class="card-body">
                                            <div class="callout callout-info">

                                                Para solicitudes y/o casos especiales, por favor enviar correo
                                                electronico
                                                al comite de su programa, para ayuda con el SI-COMMITTEE, envie un
                                                correo a
                                                pabloe.carrenoh@unilibre.edu.co.

                                            </div>
                                            <div class="callout callout-info">

                                                Este es un recurso para estar informado de lo que esta sucediendo en el
                                                comite, por favor solo comentarios académicos

                                            </div>
                                            <div class="callout callout-info">

                                                Documentos: <br><br>
                                                <li>
                                                    <a style="color: blue;">Reglamento v3.0</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Reglamento
                                                        v4.0 2019</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Formato
                                                        presentacion Propuesta</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Guia
                                                        Elaboracion documento Final</a>
                                                </li>
                                                <li>
                                                    <a style="color: blue;">Rubrica
                                                        - Presentación de Póster</a>
                                                </li>


                                            </div>

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
                                                    src="https://docs.google.com/viewer?url=http://5.189.175.156/comite/committeees.pdf&embedded=true"
                                                    width="100%" height="600" style="border: none;"></iframe>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--TPestana1-->
                    <!--Pestana2-->
                    <div id="cpestana2">
                        <div class="container-fluid">
                            <div class="callout callout-info">

                                Fechas reuniones Comité Ingeniería de Sistemas... 2020-1, Enero 29, Febrero 19, Marzo
                                18, Abril 22, Mayo 20, Junio 17

                            </div>
                            <form id="idFormRegistrarDoc" role="form">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card card-warning">

                                            <?php
                                        require("../connect_db.php");
                                        $sql = ("SELECT * FROM login where id='$pr'");
                                        $query = mysqli_query($mysqli, $sql);
                                        while ($arreglo = mysqli_fetch_array($query)) {
                                            $programa = $arreglo[11];
                                        }

                                        ?>
                                            <div class="card-body">



                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input type="text" name="ID_estudiante" class="form-control"
                                                                placeholder="Nombre Estudiante.."
                                                                value="<?php echo '' . $_SESSION['user'] . ''; ?>"
                                                                readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Id</label>
                                                            <input type="text" name="ID_estudiante"
                                                                value="<?php echo '' . $_SESSION['id'] . ''; ?>"
                                                                class="form-control" placeholder="Id Estudiante.."
                                                                readonly="readonly">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Estado</label>
                                                            <input type="text" class="form-control" name="terminado"
                                                                id="terminado" value="<?php echo '0'; ?>"
                                                                placeholder="Estado..." readonly="readonly">
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
                                                            <label>Fecha Propuesta</label>
                                                            <input type="text" id="fecha_propuesta"
                                                                name='fecha_propuesta' class="form-control"
                                                                value="<?php echo ''.date('Y-m-d').''; ?>"
                                                                readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Fecha Aprobacion Propuesta</label>
                                                            <input type="text" class="form-control"
                                                                name="fecha_aprob_propuesta" id="fecha_aprob_propuesta"
                                                                value="0000-00-00" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Titulo del proyecto y/o nombre del documento</label>
                                                        <textarea name="Titulo_tesis" class="form-control" rows="3"
                                                            placeholder="Escriba el titulo..." required></textarea>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <?php

                                                    } else {
                                                ?>
                                            <!-- /.card-body -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha Propuesta</label>
                                                    <input type="text" id="fecha_propuesta" name='fecha_propuesta'
                                                        class="form-control"
                                                        value="<?php echo '' . $fecha_propuesta . ''; ?>"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha Aprobacion Propuesta</label>
                                                    <input type="text" class="form-control" name="fecha_aprob_propuesta"
                                                        id="fecha_aprob_propuesta"
                                                        value="<?php echo '' . $fecha_aprob_propuesta . ''; ?>"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Titulo del proyecto y/o nombre del documento</label>
                                                <textarea name="Titulo_tesis" class="form-control" rows="3"
                                                    placeholder="Escriba el titulo..." readonly="readonly"
                                                    required><?php echo '' . $titulo . ''; ?></textarea>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <?php
                                                    }
                                ?>
                                </div>

                                <div class="callout callout-info">
                                    Recuerde que si documento es
                                    <b>Monografía</b>, debe anexar al final del archivo, el
                                    certificado de terminación de materias
                                </div>
                                <div class="callout callout-info">
                                    Recuerde que si documento es
                                    <b>Poster</b>, debe cumplir con la Rúbrica -
                                    Presentación de Póster
                                </div>


                        </div>
                        <div class="col-md-6">

                            <div class="card card-warning">
                                <div class="card-header" style="background-color: #B42A2A; color: white">
                                    <h5 class="card-title">Registre otro integrante</h5>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Id otro
                                                    integrante...</label>
                                                <input type="text" name="ID_estudiante1" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Id otro integrante..."
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tipo de documento:</label>
                                                <select name="ID_estado" class="form-control select2"
                                                    style="width: 100%;" required>
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
                                                <select name="id_estudiante2" class="form-control select2"
                                                    style="width: 100%;">
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
                                                <select name="ID_directores" class="form-control select2"
                                                    style="width: 100%;" required>
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
                                                <input type="text" class="form-control" name="programa" id="programa"
                                                    value="<?php echo '' . $programa . ''; ?>" placeholder="Programa"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card-header -->
                                <div id="idCardBodyMessagesSubirDoc" class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="archivo" id="archivo" class="custom-file-input"
                                                    accept=".pdf" required>
                                                <label id="idNameFileRegistrarDoc" class="custom-file-label"
                                                    for="exampleInputFile">Subir Archivo - Tamaño menor a 5Mb</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="idBoxAlert" class="alert alert-danger alert-dismissible"
                                        style="Display: None;">
                                        <h5>
                                            <i id="idIConBox" class="icon fas fa-ban"></i>
                                            Alerta
                                        </h5>
                                        <p id="idMessageRegistrarDoc"></p>

                                    </div>



                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <!--    <button type="submit" id="idButtonRegistrarDoc" value="Registrar"
                                        class="btn btn-primary float-right"
                                        style="background-color: green; margin-bottom: 10px ">Registrar</button>  -->
                                    <button id="idButtonRegistrarDoc" type="submit" value="Registrar"
                                        class="btn btn-primary float-right"
                                        style="background-color: green; margin-bottom: 10px ">Registrar</button>

                                </div>

                                <script>

                                </script>


                            </div>
                            <div class="callout callout-warning">
                                <b>Los archivos</b>, si el archivo es grande por
                                favor espere a que cargue y luego, si haga clic en Registrar,
                                recuerde que para el caso de si sube archivos duplicados esto se
                                sobre escribe
                            </div>
                            <div class="callout callout-info">
                                <b>Los archivos en formato pdf. Ej: 123456789.pdf, recuerde que debe estar en los
                                    formatos
                                    dispuesto por el comite</b>
                            </div>
                        </div>





                        </form>

                    </div>


                </div>





        </div>
        <!--TPestana2-->
        <!--Pestana3-->
        <div id="cpestana3">

            <div class="container-fluid">

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
                        <div class="box-body table-responsive no-padding">
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
                                                    $alma = "/propuestas";
                                                } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                    $alma = "/anteproyectos";
                                                } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                    $alma = "/proyectos";
                                                } else if ($arreglo[6] == "Certificado de Notas") {
                                                    $alma = "/certinotas";
                                                } else if ($arreglo[6] == "Certificado terminacion Materias") {
                                                    $alma = "/certimat";
                                                } else if ($arreglo[6] == "Prorroga") {
                                                    $alma = "/prorrogas";
                                                } else {
                                                    $alma = "/otros";
                                                }

                                                if ($id_estudiante2 == 1 or $id_estudiante2 == 3) {


                                                    echo "<tr>";
                                                    echo "<td>$arreglo[3]</td>";
                                                    echo "<td>$arreglo[5]</td>";
                                                    echo "<td>$arreglo[6]</td>";
                                                    echo "<td>$arreglo[7]</td>";
                                                    echo "<td style='color: red'><a href=$raiz$alma/$arreglo[8]>$arreglo[8]</a></td>";
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
                                                    echo "<td style='color: red'><a href=$raiz$alma/$arreglo[8]>$arreglo[8]</a></td>";
                                                    echo "<td>$arreglo[9]</td>";
                                                    echo "<td>No Aplica</td>";
                                                    /* echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";*/
                                                    if ($arreglo[6] == 'Entrega Proyecto') {
                                                        echo "<td><a href='$raiz/pdf/verevalproy.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";
                                                    } else if ($arreglo[6] == 'Entrega Poster') {
                                                        echo "<td><a href='$raiz/pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";
                                                    } else if ($arreglo[6] == 'Entrega Anteproyecto') {
                                                        echo "<td><a href='$raiz/pdf/vereval.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";
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
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

        </div>
        <!--TPestana3-->
        <!--Pestana4-->
        <div id="cpestana4">
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
                        echo '<th>Acta No.</th>';
                        echo '<th>Fecha Publicacion</th>';
                        echo '<th>Ver Acta</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                                            while ($arreglo = mysqli_fetch_array($query)) {
                                                echo "<tr>";
                                                echo "<td>$arreglo[1]</td>";
                                                echo "<td>$arreglo[4]</td>";
                                                //echo "<td bgcolor='797D7F' align='center'><a href='./pdf/veracta.php?numero=$arreglo[1]&programaa=$programa&idc=$pr' target='_blanck'><img src='images/pdf.png' width='40'  height='30' class='img-rounded'></td>";
                                                echo "<td><a href='$raiz/pdf/$arreglo[6]'><i class='nav-icon fas fa-download'></i></td>";
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
            <!-- Termina container fluid--->
        </div>
        <!--TPestana4-->

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
    <aside id="idBox" class="control-sidebar control-sidebar-dark position-fixed" style="border-radius: .25rem">
        <!-- Control sidebar content goes here -->

        <div class="card direct-chat direct-chat-primary" style="position: relative; left: 0px; top: 0px; height: 100%">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Direct Chat</h3>


                <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                        data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 100%">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            You better believe it!
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            Working with AdminLTE on a great new app! Wanna join?
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            I would love to.
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 100%">
                    <ul class="contacts-list">
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        Count Dracula
                                        <small class="contacts-list-date float-right">2/28/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        Sarah Doe
                                        <small class="contacts-list-date float-right">2/23/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">I will be waiting for...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        Nadia Jolie
                                        <small class="contacts-list-date float-right">2/20/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">I'll call you back at...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        Nora S. Vans
                                        <small class="contacts-list-date float-right">2/10/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">Where is your new...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        John K.
                                        <small class="contacts-list-date float-right">1/27/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">Can I take a look at...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        Kenneth M.
                                        <small class="contacts-list-date float-right">1/4/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">Never mind I found...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                    </ul>
                    <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <form action="#" method="post">
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary">Send</button>
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
<script type="text/javascript" src="js/cambiarPestanna.js"></script>

</html>