<!DOCTYPE html>
<?php
session_start();
extract($_GET);
if (@!$_SESSION['user']) {
	header("Location:../../../index.html");
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
    <title>SI-COMMITEE || Actualizar Evaluación Anteproyecto</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../LocalSources/css/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <link rel="stylesheet" href="../css/frag.css">
    <!-- Ayuda -- CSS -->
    <script rel="stylesheet" src="../dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="../dist/css/Help/font-awesome.min.css">
    <link rel="stylesheet" href="../dist/css/Help/_all-skins.min.css">

</head>
<style>
.white {
    color: white;
}

.ancho {
    width: 100%;
}
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"
            style="background-color:#B42A2A; color: white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars white"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #343a40; color: white">
            <!-- Brand Logo -->
            <a href="../../../index.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="../dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SI-COMMITEE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="background-color: #343a40; color: white">
                <!-- Sidebar user (optional) -->
                <a href="../profile.php" class="d-block" style="color: white;">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <?php include 'img_profile.php'; ?>
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

                            <li class="nav-item" style="background: #B42A2A">
                                <a class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Actualizar Evaluacion
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../directorcoord.php" class="nav-link">
                                    <i class="nav-icon fa fa-arrow-left white"></i>
                                    <p class="white">
                                        Volver
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
                            <h1 id="Text">Actualizar Evaluación Anteproyecto</h1>
                        </div>


                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>


                <section class="content">
                    <!--  <div class="row">
                        <div class="col-12"> -->
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

                    <?php
                                require("../../connect_db.php");
                                $sql="SELECT * FROM evaluacion WHERE id=$id";
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

                    <!-- id="loginForm" action="ejecu_act_eval.php" method="post"
                                        enctype="multipart/form-data" role="form"-->
                    <div class="container-fluid">
                        <form id="idActEval">
                            <!-- <div class="col-12"> -->

                            <div class="card card-warning">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Id_eval</label>
                                                <input type="text" name="id" value="<?php echo $id ?>"
                                                    class="form-control" placeholder="Id_eval" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Id Tesis</label>
                                                <input type="text" name="ID_tesis" value="<?php echo $ID_tesis ?>"
                                                    class="form-control" placeholder="Id Tesis" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Jurado:</label>
                                                <input type="text" name="user" class="form-control"
                                                    placeholder="Usuario" value="<?php echo $jurado; ?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Título:</label>
                                                <input type="text" name="titulo" value="<?php echo $titulo_tesis; ?>"
                                                    class="form-control" placeholder="Titulo.." readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <?php
                                if($id==$ID_tesis or $id==0){
                            ?>

                            <div class="alert alert-info"><strong>¡Nota!</strong> NO SE HA REALIZADO LA
                                EVALUACION...
                            </div>

                            <?php
                               } else {
                            ?>
                            <!-- Col 6 -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card card-warning">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group ancho">
                                                    <label>Descripción del Problema: Caracteriza el objeto de
                                                        estudio?, define claramente el
                                                        problema? Define la pregunta de investigación?, etc.</label>
                                                    <textarea name="forprob" class="form-control" rows="auto"
                                                        placeholder="Enter ..."><?php echo $forprob?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Justificación: Define claramente las razones
                                                        institucionales,
                                                        sociales,
                                                        académicas, empresariales y personales que den pié a la
                                                        realización del proyecto?</label>
                                                    <!--name="justificacion"-->
                                                    <textarea name="justificacion" class="form-control" rows="auto"
                                                        placeholder="Enter ..."><?php echo $justificacion?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Objetivos: Se evidencia en ellos los pasos metodológicos
                                                        para alcanzar la
                                                        solución del problema?</label>
                                                    <textarea name="objetivos" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $objetivos?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Marco Referencial: Se hace una revisión literaria y un
                                                        estado
                                                        del arte de la
                                                        situación problema?</label>
                                                    <textarea name="marcoref" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $marcoref?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Especifica claramente el método a usar para la solución
                                                        del
                                                        problema? Se describen los instrumentos para poder dar
                                                        validez y
                                                        condiabilidad a los
                                                        resultados obtenidos?</label>
                                                    <textarea name="metodologia" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $metodologia?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Cronograma de Actividades:</label>
                                                    <textarea name="crono" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $crono?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card card-warning">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group ancho">
                                                    <label>Presupuesto:</label>
                                                    <textarea name="presupuesto" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $presupuesto?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Bibliografía: Es correcta la referenciación y la
                                                        bibiografía pertinente?</label>
                                                    <textarea name="biblio" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $biblio?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Cibergrafía: Es pertinente, actual y de fuente
                                                        confiable?</label>
                                                    <textarea name="ciber" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $ciber?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Claridad en la redacción y ortografía:</label>
                                                    <textarea name="claridad" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $claridad?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Se evidencia en el trabajo el uso de herramientas propias
                                                        del
                                                        plan de
                                                        estudio:</label>
                                                    <textarea name="evidencia" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $evidencia?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>CONCEPTO: ("Aprobado" - "Aprobado con
                                                        Modificaciones" - "Aplazado" - "Rechazado")</label>
                                                    <textarea name="concepto" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $concepto?></textarea>
                                                </div>
                                                <div class="form-group ancho">
                                                    <label>Observaciones:</label>
                                                    <textarea name="observaciones" class="form-control" rows="auto"
                                                        placeholder=""><?php echo $observaciones?></textarea>
                                                </div>

                                            </div>
                                            <div id="idBox" class="alert alert-danger alert-dismissible mt-6"
                                                style="Display: None;">
                                                <h5>
                                                    <i id="idIConBox" class="icon fas fa-ban"></i>

                                                </h5>
                                                <p id="idMessageComen"></p>

                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-default float-right"
                                                    style="margin-bottom: 10px "
                                                    onclick="location.replace('../director.php')">Volver</button>

                                                <button type="button" id="idButtonGuardar" value=""
                                                    class="btn btn-primary float-right mr-2"
                                                    style="background-color: green; margin-bottom: 10px ">Guardar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Col 6 -->
                            <!--
                                 id="loginForm" action="ejecu_act_eval.php" method="post"
                                        enctype="multipart/form-data" role="form"

                                        idActEval
                                        idButtonGuardar
                                -->
                            <script>
                            $(document).ready(function() {
                                ActualizarEvaluacion();
                            });

                            var ActualizarEvaluacion = function() {
                                $('#idButtonGuardar').on("click", function(e) {
                                    e.preventDefault();

                                    var other_data = $("#idActEval").serializeArray();
                                    //console.log(other_data);
                                    var paqueteDeDatos = new FormData();
                                    $.each(other_data, function(key, input) {
                                        paqueteDeDatos.append(input.name, input
                                            .value);
                                    });

                                    var Box = document.getElementById("idBox");
                                    var iconBox = document.getElementById(
                                        "idIConBox");
                                    var Mensaje = document.getElementById(
                                        "idMessageComen");

                                    $.ajax({
                                        type: "POST",
                                        contentType: false,
                                        processData: false,
                                        cache: false,
                                        url: "ejecu_act_eval.php",
                                        data: paqueteDeDatos,
                                    }).done(function(info) {
                                        console.log(info);
                                        if (info === "1") {
                                            Box.style.display = 'Block';
                                            Box.className =
                                                "alert alert-success alert-dismissible";
                                            iconBox.className =
                                                "icon fas fa-check";
                                            iconBox.innerHTML = "   Exito";
                                            Mensaje.innerHTML =
                                                "Evaluación realizada con éxito";
                                            $('#idButtonGuardar').prop(
                                                'disabled',
                                                true);

                                        } else {
                                            Box.style.display = 'Block';
                                            Box.className =
                                                "alert alert-danger alert-dismissible";
                                            iconBox.className =
                                                "icon fas fa-ban";
                                            iconBox.innerHTML = "   Error";
                                            Mensaje.innerHTML =
                                                "Error en el procesamiento, no se actualizo la evaluación";
                                        }

                                    });



                                });
                            };
                            </script>
                            <?php
                               }
                    ?>
                        </form>
                    </div>

                </section>


                <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer id="footer" class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b><?php echo date('Y')?></b>
            </div>
            <strong>
                Copyright © <a href="../../../index.html">SI-COMMITEE</a></strong>
        </footer>


    </div>
    <!-- ./wrapper -->

</body>

</html>