<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../Login/index.html");
}
$nombre_area = 0;
$nombre_eje = 0;
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Director</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>


    <link rel="stylesheet" href="../css/frag.css">


    <!-- Ayuda -- CSS -->
    <script rel="stylesheet" src="../dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="../dist/css/Help/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../dist/css/Help/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/Help/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/Help/_all-skins.min.css">


    <!---->















</head>
<style>
    .white {
        color: white;
    }
</style>

<body class="hold-transition sidebar-mini">

    <!--Formulario Start-->


    <?php //include("actualizartesisdir.php"); 
    ?>

    <!--FormularioEnd-->
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



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <li class="nav-item">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../desconectar.php" class="nav-link" style="color: white">Cerrar Sesión</a>
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #B42A2A; color: white">
            <!-- Brand Logo -->
            <a href="home.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="../dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SI-COMMITEE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="background-color: #B42A2A; color: white">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">
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

                            <li id="pestana1" class="nav-item" style="background: #343a40">
                                <a class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Borrar Documento
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
                            <h1 id="Text">Borrado de Documentos</h1>
                        </div>
                        <!--<div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li id="Guia" class="breadcrumb-item active">Documentos Registrados</li>
                            </ol>
                        </div> -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <body>

                <section class="content">

                    <!--  <div class="row">
                        <div class="col-12"> -->
                    <div id="contenidopestanas">
                        <div id="cpestana1">


                            <!--Start-->

                            <div class="card card-warning">
                                <div class="card-body">

                                    <?php
                                    extract($_GET);
                                    require("../../connect_db.php");
                                    $sql = "SELECT * FROM tesis WHERE ID_tesis=$id";
                                    $ressql = mysqli_query($mysqli, $sql);
                                    while ($row = mysqli_fetch_row($ressql)) {

                                        $ID_tesis = $row[0];
                                        $ID_estudiante = $row[1];
                                        $ID_estudiante1 = $row[15];
                                        $proyecto = $row[2];
                                        utf8_decode($titulo_tesis = $row[3]);
                                        $aprob_dir = $row[4];
                                        utf8_decode($ID_directores = $row[5]);
                                        utf8_decode($ID_estado = $row[6]);
                                        utf8_decode($observaciones = $row[7]);
                                        $archivo = $row[8];
                                        $fecha_propuesta = $row[9];
                                        $fecha_aprob_propuesta = $row[10];
                                        $fecha_ent_anteproyecto = $row[11];
                                        $programa = $row[12];
                                        utf8_decode($jurado1 = $row[13]);
                                        utf8_decode($jurado2 = $row[14]);
                                        $id_area = $row[16];
                                        $id_eje = $row[17];
                                        $id_estudiante2 = $row[18];
                                        $terminado = $row[19];
                                        $nota = $row[20];
                                    }

                                    ?>
                                    <?php
                                    require("../../connect_db.php");
                                    $query = $mysqli->query("SELECT * FROM area_inves where id_area='$id_area' ");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        utf8_decode($nombre_area = $valores[1]);
                                    } ?>
                                    <?php
                                    require("../../connect_db.php");
                                    $query = $mysqli->query("SELECT * FROM ejes_tem where  id_eje='$id_eje'");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        utf8_decode($nombre_eje = $valores[1]);
                                    }
                                    ?>


                                    <div class="card card-danger pt-2 pb-2 pl-2 p">
                                        <div class="card-header" style="background:#343a40;">
                                            <h3 class="card-title"> Eliminar Documento</h3>
                                        </div>
                                        <div class="card-body">

                                            <div class="alert alert-warning" role="alert">
                                                ¿Está seguro que quiere borrar el documento con la siguiente información?
                                            </div>



                                            <div>
                                                <?php $fecha = date("Y-m-d"); ?>
                                                <form autocomplete="off" action="ejec_eli_tesis_coor.php" method="post">
                                                    <div class="row">

                                                        <div class="col-2">
                                                            <label>Id Documento:</label>
                                                            <input type="text" class="form-control" name="id" class="id" value="<?php echo $id; ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-2">
                                                            <label>Id Estudiante:</label>
                                                            <input type="text" class="form-control" name="ID_estudiante" value="<?php echo $ID_estudiante; ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-2">
                                                            <label>Id Estudiante 2: </label>
                                                            <input type="number" class="form-control" name="ID_estudiante1" value="<?php echo $ID_estudiante1 ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Titulo</label>
                                                            <TEXTAREA class="form-control" NAME="titulo_tesis" rows="3" class='input' readonly="readonly"><?php echo $titulo_tesis ?></TEXTAREA>
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Director: </label>
                                                            <input type="text" class="form-control" name="ID_directores" value="<?php echo $ID_directores ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Aprobado por el Director: </label>
                                                            <input type="text" class="form-control" name="aprob_dir" value="<?php echo $aprob_dir ?>" readonly="readonly">
                                                        </div>


                                                        <div class="col-6">
                                                            <label>Evaludaor 1: </label>
                                                            <input type="text" class="form-control" name="jurado1" value="<?php echo $jurado1 ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Evaludaor 2: </label>
                                                            <input type="text" class="form-control" name="jurado2" value="<?php echo $jurado2 ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Observaciones:</label>
                                                            <textarea readonly="readonly" class="form-control" name="observaciones" id="observaciones" rows="2" readonly="readonly"><?php echo $observaciones ?></textarea>
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Línea de Investigación</label>
                                                            <input type="test" class="form-control" name="nombre_area" value="<?php echo $nombre_area ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Eje Temático</label>
                                                            <input type="test" class="form-control" name="nombre_eje" value="<?php echo $nombre_eje ?>" readonly="readonly">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Fecha entrega propuesta:</label>
                                                            <input readonly="readonly" type="date" class="form-control" name="fecha_propuesta" id="fecha_propuesta" value="<?php echo $fecha_propuesta; ?>">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Fecha actualización / aprobación propuesta:</label>
                                                            <input readonly="readonly" type="date" class="form-control" name="fecha_aprob_propuesta" id="fecha_aprob_propuesta" value="<?php echo $fecha_aprob_propuesta; ?>">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Fecha entrega Anteproyecto: <small>(Mín 30, max 360 días)</small></label>
                                                            <input readonly="readonly" type="date" class="form-control" name="fecha_ent_anteproyecto" id="fecha_ent_anteproyecto" value="<?php echo $fecha_ent_anteproyecto; ?>">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Fecha entrega proyecto:<small>(Mín 120, max 360 días)</small></label>
                                                            <input readonly="readonly" type="date" class="form-control" name="proyecto" id="proyecto" value="<?php echo $proyecto; ?>">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>Estado</label>
                                                            <input readonly="readonly" type="test" class="form-control" name="ID_estado" id="ID_estado" value="<?php echo $ID_estado; ?>">
                                                        </div>


                                                        <div class="col-6">
                                                            <label>Nota: <small>(Aplica para sustentación proyecto - Monografía)</small></label>
                                                            <input readonly="readonly" type="text" class="form-control" name="nota" value="<?php echo $nota; ?>">
                                                        </div>

                                                        <div class="col-12 pt-2">
                                                            <input type="submit" value="Borrar" class="btn btn-dark">
                                                            <input type="button" class="btn btn-dark" value="Volver" name="volver" onclick="window.close();">
                                                        </div>


                                                    </div>


                                                </form>
                                            </div>


                                        </div>

                                    </div>







                                </div>


                            </div>






                            <!--End-->




                        </div>
                        <!--termina pestana1-->





                    </div>



                    <!--    </div>

    </div> -->


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