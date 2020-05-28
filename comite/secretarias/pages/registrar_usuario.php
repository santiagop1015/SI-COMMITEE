<!DOCTYPE html>
<?php
session_start();

@$buscart=$_POST['buscart'];
@$buscar=$_POST['buscar'];

$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
 $coordir=$arreglo[4];
 $passd=$arreglo[8];

 if ($arreglo[2]!='Jurado') {
	require("../../desconectar.php");
	header("Location:index.html");
}
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Registrar Usuario</title>
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

    <!--FormularioEnd-->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"
            style="background-color:#B42A2A; color: white;">
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
                  <!--  <a href="../../desconectar.php" class="nav-link" style="color: white">Cerrar Sesión</a>  -->
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #B42A2A; color: white">
            <!-- Brand Logo -->
            <a href="../../../index.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="../dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
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
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            <li id="pestana1" class="nav-item" style="background: #343a40">
                                <a class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Registrar Usuario
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
                            <h1 id="Text">Registrar Usuario</h1>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <body>
                <section class="content">
                    <div id="contenidopestanas">
                        <div id="cpestana1">
                            <div class="card card-warning">

                                <div class="card-body">
                                    <?php $fecha=date("Y-m-d");?>
                                    <form id="loginForm" autocomplete="off" action="ejec_registrar_usuario.php" method="post"
                                        enctype="multipart/form-data" role="form">
                                        <div class="row">
                                          <div class="col-6">
                                                <label>Tipo de Usuario: </label>
                                                <select   class="form-control" name="tipousuario" required>
                                                         <option value="Coordinador">Coordinador</option>
                                                         <option value="Estudiante">Estudiante</option>
                                                         <option value="Director">Profesor</option>
                        				                         <option value="Jurado">Secretari@</option>
                                                </select>
                                         </div>
                                         <div class="col-6">
                                               <label>Nombre: </label>
                                               <input type="text" class="form-control"  name="user" class="Nombre" placeholder="Nombres y Apellidos" required>
                                         </div>

                                         <div class="col-6">
                                               <label>Usuario:</label>
                                               <input type="text"  class="form-control"  name="email" class="Usuario" placeholder="Email @unilibre.edu.co" requiredd>
                                         </div>

                                       <div class="col-6">
                                               <label>Contraseña</label>
                                               <input type="text"  class="form-control" name="password" class="Contraseña" placeholder="Contraseña" required>
                                       </div>

                                       <div class="col-6">
                                               <label>Teléfono</label>
                                               <input type="text"  class="form-control" name="telefono" class="telefono" placeholder="Telefono" required>
                                       </div>

                                       <div class="col-6">
                                               <label>Programa: </label>
                                               <select   class="form-control" name="programa" required>
                                               <?php
                                               if($programa=='Sistemas'){
                                               ?>
                                                       <option value="Industrial">Industrial</option>
                                                       <option value="Sistemas">Sistemas</option>
                                               <?php
                                               }
                                               else if($programa=='Ambiental'){
                                                 ?>
                                                       <option value="Ambiental">Ambiental</option>
                                                 <?php
                                               }
                                               else if($programa=='Mecanica'){
                                                 ?>
                                                       <option value="Mecanica">Mecanica</option>

                                                 <?php
                                                 }?>
                                               </select>
                                       </div>

                                       <div class="col-6">
                                               <label>Linea de Investigación: </label>
                                               <select   class="form-control" name="area" required>
                                               <option value="0">No Aplica</option>
                                               <?php
                                                        $query = $mysqli -> query ("SELECT * FROM area_inves ORDER BY  id_area ASC ");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                        if($nombre_area==''){ $nombre_area=0;}
                                                        echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                                        } ?>
                                               </select>
                                       </div>

                                       <div class="col-6">
                                               <label>Fecha Nacimiento</label>
                                               <input type="date" class="form-control" name="fechadenacimiento" id="fechadenacimiento" placeholder="Fec_nacimiento" required>
                                       </div>



                                     </div>


                                        <div class="card-footer mt-2">
                                            <button class="btn btn-default float-right" style="margin-bottom: 10px "
                                                onclick="window.close();">Volver</button>

                                            <button type="submit" id="login" value=""
                                                class="btn btn-primary float-right mr-2"
                                                style="background-color: green; margin-bottom: 10px ">Registrar</button>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>
                        <!--termina pestana1-->
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
