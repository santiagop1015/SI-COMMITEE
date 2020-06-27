<!DOCTYPE html>
<?php
session_start();
extract($_GET);
if (@!$_SESSION['user']) {
	header("Location:../Login/index.html");
}
/*elseif ($_SESSION['rol']==2) {
	header("Location:index2.php");
}*/
$jurado=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
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




</head>
<style>
.white {
    color: white;
}
</style>

<body class="hold-transition sidebar-mini">

    <!--Formulario Start-->


    <?php //include("actualizartesisdir.php"); ?>

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
                    <a href="../desconectar.php" class="nav-link" style="color: white">Cerrar Sesión</a>
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #B42A2A; color: white">
            <!-- Brand Logo -->
            <a href="home.html" class="brand-link" style="background-color: #343a40; color: white">
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
                                        Actualizar Evaluacion
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
                            <h1 id="Text">Actualizar Evaluación...</h1>
                        </div>

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
                            <?php
                            require("../../connect_db.php");

                            $sql="SELECT * FROM tesis WHERE ID_tesis=$ID_tesis";
                            $ressql=mysqli_query($mysqli,$sql);
                            while ($row=mysqli_fetch_row ($ressql)){
                                    $ID_tesis=$row[0];
                            /*   	$ID_estudiante=$row[1];
                                    $proyecto=$row[2];*/
                                    $titulo_tesis=$row[3];
                                    /*$aprob_dir=$row[4];
                                    $ID_directores=$row[5];
                                    $ID_estado=$row[6];
                                            $observaciones=$row[7];
                                    $archivo=$row[8];
                                    $fecha_propuesta=$row[9];
                                    $fecha_aprob_propuesta=$row[10];
                                            $fecha_ent_anteproyecto=$row[11];
                                            $programa=$row[12];*/
                                }
                            ?>
                            <div class="card card-warning">



                                <div class="card-body">

                                    <?php
                                require("../../connect_db.php");

                                $sql="SELECT * FROM evaluacion WHERE id=$id";
                            //la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
                                $ressql12=mysqli_query($mysqli,$sql);
                                while ($row=mysqli_fetch_row ($ressql12)){
                                    $id=$row[0];
                                    $Id_tesis=$row[1];
                                    $forprob=$row[2];
                                    $justificacion=$row[3];
                                    $objetivos=$row[4];	    	
                                    $marcoref=$row[5];
                                    $metodologia=$row[6];
                                    $crono=$row[7];
                                    $presupuesto=$row[8];
                                    $biblio=$row[9];
                                    $ciber=$row[10];
                                    $claridad=$row[11];
                                    $evidencia=$row[12];
                                    $concepto=$row[13];
                                    $observaciones=$row[14];
                                    $jurado=$row[15];
                                    $fecha_eval=$row[16];
                                  }

                                ?>

                                    <form id="loginForm" action="ejecu_act_eval.php" method="post"
                                        enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="col-sm-4">

                                                <div class="form-group">
                                                    <label>Id_eval</label>
                                                    <input type="text" name="id" value="<?php echo $id ?>"
                                                        class="form-control" placeholder="Id_eval" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Id Tesis</label>
                                                    <input type="text" name="ID_tesis" value="<?php echo $ID_tesis ?>"
                                                        class="form-control" placeholder="Id Tesis" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Jurado:</label>
                                                    <input type="text" name="user" class="form-control"
                                                        placeholder="Usuario" value="<?php echo $jurado; ?>"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Título:</label>
                                                    <input type="text" name="titulo"
                                                        value="<?php echo $titulo_tesis; ?>" class="form-control"
                                                        placeholder="Titulo.." readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <?php
                                          if($id==$ID_tesis or $id==0){
                                        ?>
                                        <div class="alert alert-info"><strong>¡Nota!</strong> NO SE HA REALIZADO LA
                                            EVALUACION...
                                        </div>
                                        <?php
                            } else {
                            ?>
                                        <div class="box">

                                            <div class="box-body table-responsive no-padding">
                                                <table class="table">
                                                    <thead>

                                                        <tr>
                                                            <th>Calificacion del Documento Final</th>
                                                            <th>Valor Maximo</th>
                                                            <th>Su Evaluacion</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>Edición del documento final</td>
                                                            <td>2.4</td>
                                                            <td><input type="text" name="forprob"
                                                                    value="<?php echo $forprob; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cumplimiento de objetivos general y específico</td>
                                                            <td>8.0</td>
                                                            <td><input type="text" name="justificacion"
                                                                    value="<?php echo $justificacion; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Profundidad del tema</td>
                                                            <td>4.0</td>
                                                            <td><input type="text" name="objetivos"
                                                                    value="<?php echo $objetivos; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Desarrollo del tema</td>
                                                            <td>4.0</td>
                                                            <td><input type="text" name="marcoref"
                                                                    value="<?php echo $marcoref; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tecnicas de Cálculo Aplicadas</td>
                                                            <td>4.8</td>
                                                            <td><input type="text" name="metodologia"
                                                                    value="<?php echo $metodologia; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Calidad y manejo de la información</td>
                                                            <td>3.2</td>
                                                            <td><input type="text" name="crono"
                                                                    value="<?php echo $crono; ?>" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Impacto de los resultados</td>
                                                            <td>6.4</td>
                                                            <td><input type="text" name="presupuesto"
                                                                    value="<?php echo $presupuesto; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Conclusiones y recomendaciones del proyecto</td>
                                                            <td>7.2</td>
                                                            <td><input type="text" name="biblio"
                                                                    value="<?php echo $biblio; ?>" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>SubTotal</td>
                                                            <td>40</td>
                                                            <td><input type="text" name="biblio"
                                                                    value="<?php echo $biblio + $presupuesto+$crono+$metodologia+$marcoref+$objetivos+$justificacion+$forprob?>"
                                                                    class="form-control" readonly="readonly"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        </br>
                                        </br>

                                        <div class="box">

                                            <div class="box-body table-responsive no-padding">
                                                <table class="table">
                                                    <thead>

                                                        <tr>
                                                            <th>Calificacion de la Sustentación</th>
                                                            <th>Valor Maximo</th>
                                                            <th>Su Evaluacion</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>Calidad de la sustentación</td>
                                                            <td>2.0</td>
                                                            <td><input type="text" name="ciber"
                                                                    value="<?php echo $ciber; ?>" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Correlación de la sustentación con el documento</td>
                                                            <td>2.5</td>
                                                            <td><input type="text" name="claridad"
                                                                    value="<?php echo $claridad; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Respuestas y aclaración de dudas</td>
                                                            <td>3.0</td>
                                                            <td><input type="text" name="evidencia"
                                                                    value="<?php echo $evidencia; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dominio del tema</td>
                                                            <td>2.5</td>
                                                            <td><input type="text" name="concepto"
                                                                    value="<?php echo $concepto; ?>"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SubTotal</td>
                                                            <td>10</td>
                                                            <td><input type="text"
                                                                    value="<?php echo $ciber + $claridad+$evidencia+$concepto?>"
                                                                    class="form-control" readonly="readonly"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TOTAL</td>
                                                            <td>50</td>
                                                            <td><input type="text"
                                                                    value="<?php echo $ciber + $claridad+$evidencia+$concepto+$biblio + $presupuesto+$crono+$metodologia+$marcoref+$objetivos+$justificacion+$forprob?>"
                                                                    class="form-control" readonly="readonly"></td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Observaciones:</label>
                                                        <textarea name="observaciones" class="form-control" rows="auto"
                                                            placeholder="Enter ..."><?php echo $observaciones?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="card-footer">
                                            <button class="btn btn-default float-right" style="margin-bottom: 10px "
                                                onclick="window.close();">Volver</button>

                                            <button type="submit" id="login" value=""
                                                class="btn btn-primary float-right mr-2"
                                                style="background-color: green; margin-bottom: 10px ">Guardar</button>

                                        </div>
                                    </form>

                                    <?php
                            }
                            ?>



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