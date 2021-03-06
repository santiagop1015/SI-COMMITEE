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
date_default_timezone_set ('America/Bogota');
$dir=$_SESSION['user'];
$ideva="";
$jur=$_SESSION['user'];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Evaluación Proyecto</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../LocalSources/css/ionicons/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">

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
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/Help/_all-skins.min.css">

</head>
<style>
.white {
    color: white;
}

.invalid {
    border-color: #DD2C00;
}
</style>

<body class="hold-transition sidebar-mini">

    <!--Formulario Start-->

    <!--FormularioEnd-->
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
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                
            </ul>
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
                        //$posicion_espacio = strpos($usuario, " ");
                        //$usuario=substr($usuario,0,$posicion_espacio);
                        $recortarUsuario = explode(' ',$usuario);
                        echo $recortarUsuario[0];?>
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

                            <li id="pestana1" class="nav-item" style="background: #B42A2A">
                                <a class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Evaluación Proyecto
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
        <div class="content-wrapper pb-2">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 id="Text">Evaluación Proyecto</h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            
                <section class="content">
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
                    <?php echo "
                    <div class='container-fluid'>
                    <div class='card card-warning'>
                                <div class='card-body'>
                    <div class='col-sm-12'>
                                        <iframe
                                            src='../../archivos/$alma/$archivo'
                                            width='100%' height='500' style='border: none;'></iframe>
                                            </div> 
                                            </div>
                                            </div>
                                            </div>"; ?>
                    <?php
                        $conta=0;
                        $ide=0;
                        $jurado='';
                        require("../../connect_db.php");
                        $sql=("SELECT * FROM evaluacion WHERE id_tesis=$id");
                        $ressql=mysqli_query($mysqli,$sql);
                        while ($row=mysqli_fetch_row ($ressql)) {
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
                          //and $conta<2 and $jurado!=$jur
                          {
                            ?>
                    <div class="container-fluid">
                        <form id="idFormEvalProyect">
                            <div class="card card-warning">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-4">

                                            <div class="form-group">
                                                <label>Id_eval</label>
                                                <input type="text" name="id" value="<?php echo $ide ?>"
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
                                                    placeholder="Usuario" value="<?php echo $jur; ?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Título:</label>
                                                <input type="text" name="titulo" value="<?php echo $titulo_tesis; ?>"
                                                    class="form-control" placeholder="Titulo.." readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-warning">
                                <div class="card-body">
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
                                                        <td><input type="number" name="forprob"
                                                                onchange="onChange(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                        <script>
                                                        function onChange(changeVal) {
                                                            var Subtotal_1 = 0;
                                                            Subtotal_1 = parseFloat(Subtotal_1);

                                                            //console.log(Subtotal_1);
                                                            // alert("Value is " + changeVal.value);
                                                            var value = parseFloat(changeVal.value).toFixed(1);
                                                            //    console.log(Number(Subtotal_1) + Number(value));

                                                            var data = $("#idFormEvalProyect")
                                                                .serializeArray();

                                                            // 4 - 11

                                                            var sumatoria = 0;

                                                            var uno = parseFloat(data[4].value).toFixed(1),
                                                                dos = parseFloat(data[5].value).toFixed(1),
                                                                tres = parseFloat(data[6].value).toFixed(1),
                                                                cuatro = parseFloat(data[7].value).toFixed(1),
                                                                cinco = parseFloat(data[8].value).toFixed(1),
                                                                seis = parseFloat(data[9].value).toFixed(1),
                                                                siete = parseFloat(data[10].value).toFixed(1),
                                                                ocho = parseFloat(data[11].value).toFixed(1);

                                                            // document.getElementsByName("acc")[0].value

                                                            var forprob = document.getElementsByName("forprob")[
                                                                    0],
                                                                justificacion = document.getElementsByName(
                                                                    "justificacion")[
                                                                    0],
                                                                objetivos = document.getElementsByName(
                                                                    "objetivos")[
                                                                    0],
                                                                marcoref = document.getElementsByName(
                                                                    "marcoref")[
                                                                    0],
                                                                metodologia = document.getElementsByName(
                                                                    "metodologia")[
                                                                    0],
                                                                crono = document.getElementsByName(
                                                                    "crono")[
                                                                    0],
                                                                presupuesto = document.getElementsByName(
                                                                    "presupuesto")[
                                                                    0],
                                                                biblio = document.getElementsByName(
                                                                    "biblio")[
                                                                    0];

                                                            //  debugger;
                                                            var sumatoria = 0;
                                                            if (uno > 0) {
                                                                if (uno <= 2.4) {
                                                                    forprob.value = uno;
                                                                    sumatoria = sumatoria + Number(uno);
                                                                } else {
                                                                    forprob.value = 0;
                                                                }
                                                            } else {
                                                                forprob.value = 0;
                                                            }

                                                            if (dos > 0) {
                                                                if (dos <= 8.0) {
                                                                    justificacion.value = dos;
                                                                    sumatoria = sumatoria + Number(dos);
                                                                } else {
                                                                    justificacion.value = 0;
                                                                }
                                                            } else {
                                                                justificacion.value = 0;
                                                            }

                                                            if (tres > 0) {
                                                                if (tres <= 4.0) {
                                                                    objetivos.value = tres;
                                                                    sumatoria = sumatoria + Number(tres);
                                                                } else {
                                                                    objetivos.value = 0;
                                                                }
                                                            } else {
                                                                objetivos.value = 0;
                                                            }

                                                            if (cuatro > 0) {
                                                                if (cuatro <= 4.0) {
                                                                    marcoref.value = cuatro;
                                                                    sumatoria = sumatoria + Number(cuatro);
                                                                } else {
                                                                    marcoref.value = 0;
                                                                }
                                                            } else {
                                                                marcoref.value = 0;
                                                            }

                                                            if (cinco > 0) {
                                                                if (cinco <= 4.8) {
                                                                    metodologia.value = cinco;
                                                                    sumatoria = sumatoria + Number(cinco);
                                                                } else {
                                                                    metodologia.value = 0;
                                                                }
                                                            } else {
                                                                metodologia.value = 0;
                                                            }

                                                            if (seis > 0) {
                                                                if (seis <= 3.2) {
                                                                    crono.value = seis;
                                                                    sumatoria = sumatoria + Number(seis);
                                                                } else {
                                                                    crono.value = 0;
                                                                }
                                                            } else {
                                                                crono.value = 0;
                                                            }

                                                            if (siete > 0) {
                                                                if (siete <= 6.4) {
                                                                    presupuesto.value = siete;
                                                                    sumatoria = sumatoria + Number(siete);
                                                                } else {
                                                                    presupuesto.value = 0;
                                                                }
                                                            } else {
                                                                presupuesto.value = 0;
                                                            }

                                                            if (ocho > 0) {
                                                                if (ocho <= 7.2) {
                                                                    biblio.value = ocho;
                                                                    sumatoria = sumatoria + Number(ocho);
                                                                } else {
                                                                    biblio.value = 0;
                                                                }
                                                            } else {
                                                                biblio.value = 0;
                                                            }

                                                            $("#idSubtotal_1").val(sumatoria);

                                                            var SumatoriaTotal = 0;
                                                            var Subtotal_2 = parseFloat($("#idSubtotal_2").val());

                                                            //  console.log($("#idSubtotal_2").val());
                                                            SumatoriaTotal = Subtotal_2 + sumatoria;

                                                            $("#idTotal").val(SumatoriaTotal);

                                                        }
                                                        </script>

                                                    </tr>
                                                    <tr>
                                                        <td>Cumplimiento de objetivos general y específico</td>
                                                        <td>8.0</td>
                                                        <td><input type="number" name="justificacion"
                                                                onchange="onChange(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profundidad del tema</td>
                                                        <td>4.0</td>
                                                        <td><input type="number" name="objetivos"
                                                                onchange="onChange(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Desarrollo del tema</td>
                                                        <td>4.0</td>
                                                        <td><input type="number" name="marcoref"
                                                                onchange="onChange(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tecnicas de Cálculo Aplicadas</td>
                                                        <td>4.8</td>
                                                        <td><input type="number" name="metodologia"
                                                                onchange="onChange(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Calidad y manejo de la información</td>
                                                        <td>3.2</td>
                                                        <td><input type="number" name="crono" onchange="onChange(this)"
                                                                value="0" value="0" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Impacto de los resultados</td>
                                                        <td>6.4</td>
                                                        <td><input type="number" name="presupuesto"
                                                                onchange="onChange(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Conclusiones y recomendaciones del proyecto</td>
                                                        <td>7.2</td>
                                                        <td><input type="number" name="biblio" onchange="onChange(this)"
                                                                value="0" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>SubTotal</td>
                                                        <td>40</td>
                                                        <td><input id="idSubtotal_1" value="0" type="number"
                                                                class="form-control" readonly="readonly"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                                        <td><input type="text" name="ciber" onchange="onChange2(this)"
                                                                value="0" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Correlación de la sustentación con el documento</td>
                                                        <td>2.5</td>
                                                        <td><input type="text" name="claridad"
                                                                onchange="onChange2(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Respuestas y aclaración de dudas</td>
                                                        <td>3.0</td>
                                                        <td><input type="text" name="evidencia"
                                                                onchange="onChange2(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dominio del tema</td>
                                                        <td>2.5</td>
                                                        <td><input type="text" name="concepto"
                                                                onchange="onChange2(this)" value="0"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <script>
                                                    function onChange2(changeVal) {
                                                        var Subtotal_1 = 0;
                                                        Subtotal_1 = parseFloat(Subtotal_1);

                                                        //console.log(Subtotal_1);
                                                        // alert("Value is " + changeVal.value);
                                                        var value = parseFloat(changeVal.value).toFixed(1);
                                                        //    console.log(Number(Subtotal_1) + Number(value));

                                                        var data = $("#idFormEvalProyect")
                                                            .serializeArray();

                                                        // 4 - 11

                                                        var sumatoria = 0;

                                                        var uno = parseFloat(data[12].value).toFixed(1),
                                                            dos = parseFloat(data[13].value).toFixed(1),
                                                            tres = parseFloat(data[14].value).toFixed(1),
                                                            cuatro = parseFloat(data[15].value).toFixed(1);

                                                        // document.getElementsByName("acc")[0].value

                                                        var ciber = document.getElementsByName("ciber")[
                                                                0],
                                                            claridad = document.getElementsByName(
                                                                "claridad")[
                                                                0],
                                                            evidencia = document.getElementsByName(
                                                                "evidencia")[
                                                                0],
                                                            concepto = document.getElementsByName(
                                                                "concepto")[
                                                                0];


                                                        //  debugger;
                                                        var sumatoria = 0;
                                                        if (uno > 0) {
                                                            if (uno <= 2.0) {
                                                                ciber.value = uno;
                                                                sumatoria = sumatoria + Number(uno);
                                                            } else {
                                                                ciber.value = 0;
                                                            }
                                                        } else {
                                                            ciber.value = 0;
                                                        }

                                                        if (dos > 0) {
                                                            if (dos <= 2.5) {
                                                                claridad.value = dos;
                                                                sumatoria = sumatoria + Number(dos);
                                                            } else {
                                                                claridad.value = 0;
                                                            }
                                                        } else {
                                                            claridad.value = 0;
                                                        }

                                                        if (tres > 0) {
                                                            if (tres <= 3.0) {
                                                                evidencia.value = tres;
                                                                sumatoria = sumatoria + Number(tres);
                                                            } else {
                                                                evidencia.value = 0;
                                                            }
                                                        } else {
                                                            evidencia.value = 0;
                                                        }

                                                        if (cuatro > 0) {
                                                            if (cuatro <= 2.5) {
                                                                concepto.value = cuatro;
                                                                sumatoria = sumatoria + Number(cuatro);
                                                            } else {
                                                                concepto.value = 0;
                                                            }
                                                        } else {
                                                            concepto.value = 0;
                                                        }

                                                        $("#idSubtotal_2").val(sumatoria);

                                                        // idTotal

                                                        var SumatoriaTotal = 0;
                                                        var Subtotal_1 = parseFloat($("#idSubtotal_1").val());

                                                        //  console.log($("#idSubtotal_2").val());
                                                        SumatoriaTotal = Subtotal_1 + sumatoria;
                                                        $("#idTotal").val(SumatoriaTotal);

                                                    }
                                                    </script>
                                                    <tr>
                                                        <td>SubTotal</td>
                                                        <td>10</td>
                                                        <td><input id="idSubtotal_2" value="0" type="text"
                                                                class="form-control" readonly="readonly"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>TOTAL</td>
                                                        <td>50</td>
                                                        <td><input id="idTotal" value="0" type="text"
                                                                class="form-control" readonly="readonly"></td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Observaciones:</label>
                                                    <textarea name="observaciones" class="form-control" rows="auto"
                                                        placeholder="Enter ..."></textarea>
                                                </div>
                                            </div>

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
                                            onclick="location.replace('../directorcoord.php')">Volver</button>

                                        <button id="idButtonGuardar" type="button" value=""
                                            class="btn btn-primary float-right mr-2"
                                            style="background-color: green; margin-bottom: 10px ">Guardar</button>

                                    </div>

                                    <script>
                                    $(document).ready(function() {
                                        Evaluar();

                                    });

                                    var Evaluar = function() {
                                        $('#idButtonGuardar').on("click", function(e) {
                                            e.preventDefault();
                                            // alert("123");

                                            var other_data = $("#idFormEvalProyect")
                                                .serializeArray();
                                            console.log(other_data);
                                            var paqueteDeDatos = new FormData();
                                            var error = 0;

                                            /*  $.each(other_data, function(key, input) {
                                                  var elemento = document
                                                      .getElementsByName(input.name);
                                                  if (input.value == "0") {
                                                      elemento[0].className += " invalid";
                                                      error = error + 1;
                                                      // console.log(input.name);
                                                  } else {
                                                      elemento[0].className =
                                                          "form-control";
                                                  }
                                              });
                                              */

                                            var Box = document.getElementById("idBox");
                                            var iconBox = document.getElementById(
                                                "idIConBox");
                                            var Mensaje = document.getElementById(
                                                "idMessageComen");

                                            // if (error === 0) {

                                            $.each(other_data, function(key, input) {
                                                paqueteDeDatos.append(input.name, input
                                                    .value);
                                            });

                                            var Box = document.getElementById("idBox");
                                            Box.style.display = 'None';
                                            var iconBox = document.getElementById(
                                                "idIConBox");
                                            var Mensaje = document.getElementById(
                                                "idMessageComen");

                                            $.ajax({
                                                type: "POST",
                                                contentType: false,
                                                processData: false,
                                                cache: false,
                                                url: "ejecu_eval_tesis.php",
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
                                                        "Evaluación actualizada con éxito";
                                                    $('#idButtonGuardar').prop(
                                                        'disabled',
                                                        true);
                                                }

                                                setTimeout(() => {
                                                    location.reload();
                                                }, 2000);

                                            });

                                            //  }


                                        })
                                    }
                                    </script>
                                </div>
                            </div>
                            <?php
                                } else {
                                ?>
                            <div class="container-fluid">

                                <div class="card card-warning">
                                    <div class="card-body">
                                        <div class="alert alert-info"><strong>¡Nota!</strong> EVALUACIÓN YA REALIZADA...
                                        </div>
                                        <center>
                                            <button type="button" class="btn btn-danger"
                                                onclick="location.replace('../directorcoord.php')">Volver</button>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>


                        </form>
                    </div>
                </section>
                <!-- /.content -->
        
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