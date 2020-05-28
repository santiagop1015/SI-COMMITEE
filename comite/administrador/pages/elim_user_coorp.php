<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../Login/index.html");
}
$pr = $_SESSION['id'];
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
                                        Eliminar Usuario
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
                            <h1 id="Text">Eliminar Usuario</h1>
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
                    <?php
                    require("../../connect_db.php");
                    $sql = ("SELECT * FROM login where id='$pr'");
                    $query = mysqli_query($mysqli, $sql);
                    while ($arreglo = mysqli_fetch_array($query)) {
                        utf8_decode($programa = $arreglo[11]);
                    }
                    ?>
                    <div id="contenidopestanas">
                        <div id="cpestana1">

                            <!--Start-->
                            <div class="card card-warning">
                                <div class="card-body">
                                    <div class="alert alert-warning" role="alert">
                                        ¿Está seguro que quiere borrar el usuario con la siguiente información?
                                    </div>

                                    <?php
                                    extract($_GET);
                                    require("../../connect_db.php");
                                    $sql = "SELECT * FROM login WHERE id=$id";
                                    $ressql = mysqli_query($mysqli, $sql);
                                    while ($row = mysqli_fetch_row($ressql)) {
                                        $id = $row[0];
                                        $cedula = $row[1];
                                        $TipoUsuario = $row[2];
                                        $user = $row[3];
                                        $email = $row[4];
                                        //$pasadmin=$row[5];
                                        $pasdir = $row[9];
                                        //$pasjur=$row[7];
                                        //$pascor=$row[8];
                                        //$pass=$row[9];
                                        $telefono = $row[10];
                                        $programa = $row[11];
                                        $fechadenacimiento = $row[12];
                                    }
                                    ?>
                                    <?php $fecha = date("Y-m-d"); ?>
                                    <form autocomplete="off" action="ejecu_elim_user_coor.php" method="post">
                                        <div class="row">

                                            <div class="col-3">
                                                <label>Id:</label>
                                                <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly="readonly">
                                            </div>

                                            <div class="col-3">
                                                <label>Cedula:</label>
                                                <input type="text" class="form-control" name="cedula" value="<?php echo $cedula ?>" readonly="readonly">
                                            </div>

                                            <div class="col-6">
                                                <label>Nombre: </label>
                                                <input type="text" class="form-control" name="user" value="<?php echo $user ?>" readonly="readonly">
                                            </div>

                                            <div class="col-6">
                                                <label>Usuario: </label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $email ?>" readonly="readonly">
                                            </div>

                                            <div class="col-6">
                                                <label>Password: </label>
                                                <input type="text" class="form-control" name="pasdir" value="<?php echo $pasdir ?>" readonly="readonly">
                                            </div>

                                            <div class="col-6">
                                                <label>Tipo de Usuario : </label>
                                                <input type="text" class="form-control" name="TipoUsuario" value="<?php echo $TipoUsuario ?>" readonly="readonly">
                                            </div>

                                            <div class="col-6">
                                                <label>Telefono: </label>
                                                <input type="text" class="form-control" name="telefono" value="<?php echo $telefono ?>" readonly="readonly">
                                            </div>

                                            <div class="col-6">
                                                <label>Programa: </label>
                                                <input type="text" class="form-control" name="programa" value="<?php echo $programa ?>" readonly="readonly">
                                            </div>

                                            <div class="col-6">
                                                <label>Fecha de Nacimiento: </label>
                                                <input type="date" class="form-control" name="fechadenacimiento" value="<?php echo $fechadenacimiento ?>" readonly="readonly">
                                            </div>

                                            <div class="col-12 pt-5">
                                                <input type="submit" value="Borrar" class="btn btn-dark">
                                                <input type="button" class="btn btn-dark" value="Volver" name="volver" onclick="window.close();">
                                            </div>
                                        </div>
                                    </form>

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