<!DOCTYPE html>
<?php
session_start();
extract($_GET);

if (@!$_SESSION['user']) {
	header("Location:../../Login/index.html");
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

<body class="sidebar-mini sidebar-collapse">

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
                                        Evaluar Anteproyecto...
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
                            <h1 id="Text">Evaluar Anteproyecto</h1>
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

                            <div class="card card-warning">



                                <div class="card-body">

                                    <?php

                                       require("../../connect_db.php");
                                       
                                       $sql="SELECT * FROM tesis WHERE id_tesis=$id and (jurado1='$jur' or jurado2='$jur')";
                                       $ressql=mysqli_query($mysqli,$sql);
                                       while ($row=mysqli_fetch_row ($ressql)){
                                        $ID_tesis=$row[0];
                                        $ID_estado=$row[6];
                                        $archivo=$row[8];

                                        $titulo_tesis=$row[3];
				                        if($ID_estado=="Entrega Propuesta"){
				                        	 $alma="./propuestas";
				                        }else if($ID_estado=="Entrega Anteproyecto")
				                        {
				                        	 $alma="./anteproyectos";
				                        }else if($ID_estado=="Entrega Proyecto")
				                        {
				                        	 $alma="./proyectos";
				                        }else {
				                        	 $alma="./otros";	
				                        }

                                       } 

                                      
                                ?>

                                    <?php

                                    echo "<div class='col-sm-12'>
                                    <iframe
                                        src='../$alma/$archivo'
                                        width='100%' height='500' style='border: none;'></iframe>
                                        </div> ";
                                        ?>
                                    <?php
                                    $conta=0;
                                    $ide=0;
                                    $jurado='';
                                    require("../../connect_db.php");
                                    $sql=("SELECT * FROM evaluacion WHERE id_tesis=$id");
                                    $ressql=mysqli_query($mysqli,$sql);
                                    while ($row=mysqli_fetch_row ($ressql)){
                                        $ide=$row[0];
		    	                        $ID_tesis=$row[1];
		    	                        $titulo=$row[2];
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
                        
		    	                        $conta=$conta+1;
                                    }
                                 ?>

                                    <?php

                                      if($ide<>$ID_tesis and $conta<2 and $jurado!=$jur)
                                      {
                                ?>



                                    <form id="loginForm" action="ejecu_eval_tesis.php" method="post"
                                        enctype="multipart/form-data" role="form">
                                        <div class="alert alert-info"><strong>INFORMACION DE LA EVALUACION...</strong>
                                        </div>

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
                                                    <input type="text" name="id_tesis" value="<?php echo $ID_tesis ?>"
                                                        class="form-control" placeholder="Id Tesis" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Evaluador:</label>
                                                    <input type="text" name="user" value="<?php echo $jur ?>"
                                                        class="form-control" placeholder="Id Tesis" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <textarea name="titulo" class="form-control" rows="auto"
                                                        placeholder=""
                                                        readonly="readonly"><?php echo $titulo_tesis?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="alert alert-info"><strong>EVALUACION...</strong>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Descripcion del Problema:
                                                        </br>
                                                        Caracteriza el objeto de estudio?, define claramente
                                                        </br>
                                                        el
                                                        problema? Define la pregunta de investigacion?, etc.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="forprob" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Justificación:
                                                        </br>
                                                        Define claramente las razones institucionales, sociales,
                                                        </br>
                                                        académicas, empresariales y personales que den pié a la
                                                        realización del
                                                        proyecto?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="justificacion" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Objetivos:
                                                        </br>
                                                        Se evidencia en ellos los pasos metodológicos para alcanzar
                                                        </br>
                                                        la
                                                        solución del problema?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="objetivos" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Marco Referencial:
                                                        </br>
                                                        Se hace una revisión literaria y un estado del arte de
                                                        </br>
                                                        la situación problema?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="marcoref" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Marco Metodológico:
                                                        </br>
                                                        Especifica claramente el método a usar para la
                                                        solución del problema?
                                                        </br>
                                                        Se describen los instrumentos para poder dar validez y
                                                        condiabilidad a los resultados obtenidos?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="metodologia" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Cronograma de Actividades:

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="crono" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Recursos y Presupuesto:

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="presupuesto" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Referentes Bibliográficos:
                                                        </br>
                                                        Es correcta la referenciación y la bibiografía
                                                        pertinente?
                                                        </br>
                                                        Cibergrafía: Es pertinente, actual y de fuente
                                                        confiable?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="biblio" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Delimitación del Proyecto:
                                                        </br>
                                                        Se realizan los ítems que aplica al proyecto
                                                        según su naturaleza.
                                                        </br>
                                                        - Espacio - Temática - Tiempo - Población y muestra - Nivel
                                                        de implementación?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="ciber" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Claridad en la redacción y ortografía:

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="claridad" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Se evidencia en el trabajo el uso de herramientas propias del
                                                        plan de
                                                        estudio:
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <textarea name="evidencia" class="form-control" rows="auto"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>CONCEPTO:
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <select class="form-control select2" name="concepto" required>
                                                        <option value="Aprobado">Aprobado</option><br>
                                                        <option value="Aprobado con Modificaciones">Aprobado con
                                                            Modificaciones
                                                        </option><br>
                                                        <option value="Aplazado">Aplazado</option><br>
                                                        <option value="Rechazado">Rechazado</option><br>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="" id="login" value="Registrar"
                                                class="btn btn-default float-right" style="margin-bottom: 10px "
                                                onclick="window.close();">Volver</button>

                                            <button type="submit" id="login" value=""
                                                class="btn btn-primary float-right mr-2"
                                                style="background-color: green; margin-bottom: 10px ">Guardar</button>

                                        </div>
                                    </form>

                                    <?php
                                } else {

                                

                               
								?>

                                    <div class="alert alert-info"><strong>NOTA: EVALUACION YA REALIZADA...</strong>
                                    </div>



                                    <center> <button class="btn btn-danger" onclick="window.close();">Volver</button>
                                    </center>



                                    <?php
                                }
                                ?>












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