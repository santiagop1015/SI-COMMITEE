<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../../Login/index.html");
}
date_default_timezone_set ('America/Bogota');
		extract($_GET);
//$est=$_SESSION['id'];
require("../../connect_db.php");
$nota=0;

        $sql=("SELECT * FROM login where id='$est'");
				$query=mysqli_query($mysqli,$sql);
				while($arreglo=mysqli_fetch_array($query)){
				 $programa=$arreglo[11];
				 $fecha=date("d-m-Y H:i:s");
				 $user=$arreglo[3];
				}

				$sql=("SELECT * FROM tesis where ID_estudiante='$est' and nota>0");
				$query=mysqli_query($mysqli,$sql);
				while($arreglo1=mysqli_fetch_array($query)){
				 $nota=$arreglo1[20];

				}
				if($nota>0)
				{
					$Estadoest='Graduado';
				}else{
					$Estadoest='En proceso';
				}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Estado del Usuario</title>
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
                <li class="nav-item">
                    <a class="nav-link" data-widget="" href="javascript:window.close();" style="color: white">Volver
                      </a>
                </li>

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
                                        Estado del Usuario
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
                            <h1 id="Text">Estado Actual de <?php echo $user?> : <?php echo $Estadoest?></h1>
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
                                  <?php
                                  $total=0;
                                  $sql=("SELECT * FROM tesis where ID_estudiante='$est' or ID_estudiante1='$est'");
                                  //$sql=("SELECT * FROM tesis");
                                  $query=mysqli_query($mysqli,$sql);
                                  ?>
                                  <table class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                          <th scope="col">Título Documento</th>
                                          <th scope="col">Estado</th>
                                          <th scope="col">Disposiciones</th>
                                          <th scope="col">Archivo</th>
                                          <th scope="col">Fecha</th>
                                          <th scope="col">CIFI</th>
                                          </tr>
                                      </thead>

                                      <tbody>

                        <?php

                        while($arreglo=mysqli_fetch_array($query)){
                              $ID_tesis=$arreglo[0];
                              $id_estudiante2=$arreglo[18];
                              /*$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
                              $query=mysqli_query($mysqli,$sql);
                              while($arreglo1=mysqli_fetch_array($query)){
                               $certi_CIFI=$arreglo1[5];
                              }*/
                        if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                           $alma="./propuestas";
                        }else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
                        {
                           $alma="./anteproyectos";
                        }else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
                        {
                           $alma="./proyectos";
                        }else if($arreglo[6]=="Certificado de Notas")
                        {
                           $alma="./certinotas";
                        }else if($arreglo[6]=="Certificado terminacion Materias")
                        {
                           $alma="./certimat";
                        }else if($arreglo[6]=="Prorroga")
                        {
                           $alma="./prorrogas";
                        }else {
                           $alma="./otros";
                        }


                      if($id_estudiante2==1 or $id_estudiante2==3)
                      {

                          echo "<tr>";
                            echo "<td>$arreglo[3]</td>";
                            //echo "<td>$arreglo[5]</td>";
                            echo "<td>$arreglo[6]</td>";
                            echo "<td>$arreglo[7]</td>";
                            echo "<td><a href=$alma/$arreglo[8]>$arreglo[8]</a></td>";
                            echo "<td>$arreglo[9]</td>";
                            echo "<td>En Proceso </td>";
                                     /* echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";
                                      echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";*/
                        echo "</tr>";
                      }else{
                        echo "<tr>";
                            echo "<td>$arreglo[3]</td>";
                            //echo "<td>$arreglo[5]</td>";
                            echo "<td>$arreglo[6]</td>";
                            echo "<td>$arreglo[7]</td>";
                            echo "<td><a href=$alma/$arreglo[8]>$arreglo[8]</a></td>";
                            echo "<td>$arreglo[9]</td>";
                            echo "<td>No Aplica </td>";
                                      /*echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";
                                      echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";*/
                        echo "</tr>";

                      }

                      }

                    ?>
                        </tbody>
                      </table>
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
