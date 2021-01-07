<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../../../index.html");
}/*elseif ($_SESSION['rol']==2) {
	header("Location:index2.php");
}*/
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Proyectos</title>
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
    <script rel="stylesheet" src="../dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="../dist/css/Help/font-awesome.min.css">
    <link rel="stylesheet" href="../dist/css/Help/_all-skins.min.css">
</head>
<style>
.white {
    color: white;
}
</style>

<body class="hold-transition sidebar-mini">
    <?php //include("actualizartesisdir.php"); ?>
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
                                        Editar Tesis
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
                            <h1 id="Text">Edición de Proyectos</h1>
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
                                    extract($_GET);

                                    require("../../connect_db.php");
                                    $sql="SELECT * FROM tesis WHERE ID_tesis=$id";
                                    $ressql=mysqli_query($mysqli,$sql);
                                    while ($row=mysqli_fetch_row ($ressql)){
                                        //var_dump($row);
                                            $ID_tesis=$row[0];
                                            $ID_estudiante=$row[1];
                                            $proyecto=$row[2];
                                            $titulo_tesis=$row[3];
                                            $aprob_dir=$row[4];
                                            $ID_directores=$row[5];
                                            $ID_estado=$row[6];
                                            $observaciones=$row[7];
                                            $archivo=$row[8];
                                            $fecha_propuesta=$row[9];
                                            $fecha_aprob_propuesta=$row[10];
                                            $fecha_ent_anteproyecto=$row[11];
                                            $jurado1=$row[13];
                                            $jurado2=$row[14];
                                                }
                                    ?>
                                    <!-- id="loginForm" action="ejecu_act_tesisdir.php" method="post"
                                        enctype="multipart/form-data" role="form" -->

                                    <form id="idFormEdit">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <input type="text" name="id" class="form-control" placeholder="id"
                                                        value="<?php echo $id?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Estudiante</label>
                                                    <input type="text" name="ID_estudiante"
                                                        value="<?php echo $ID_estudiante?>" class="form-control"
                                                        placeholder="Id Estudiante.." readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <input type="text" name="proyecto" class="form-control"
                                                        placeholder="Usuario" value="<?php echo $proyecto; ?>"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <input type="text" name="titulo_tesis"
                                                        value="<?php echo $titulo_tesis?>" class="form-control"
                                                        placeholder="Titulo Tesis..." readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Aprobado por el Director</label>
                                                    <select name="aprob_dir" class="form-control select2"
                                                        style="width: 100%;">
                                                        <option value="<?php echo $aprob_dir?>"><?php echo $aprob_dir?>
                                                        </option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Director</label>
                                                    <input type="text" name="ID_directores"
                                                        value="<?php echo $ID_directores?>" class="form-control"
                                                        placeholder="Director.." readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <input type="text" name="ID_estado" class="form-control"
                                                        placeholder="Estado.." value="<?php echo $ID_estado?>"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Observaciones</label>
                                                    <input type="text" name="observaciones"
                                                        value="<?php echo $observaciones?>" class="form-control"
                                                        placeholder="Observaciones.." readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Archivo</label>
                                                    <input type="text" name="archivo" class="form-control"
                                                        placeholder="Archivo" value="<?php echo $archivo?>"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha Propuesta</label>
                                                    <input type="text" name="fecha_propuesta"
                                                        value="<?php echo $fecha_propuesta?>" class="form-control"
                                                        placeholder="Fecha propuesta.." readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Fecha aprob propuesta</label>
                                                    <input type="text" name="fecha_aprob_propuesta" class="form-control"
                                                        placeholder="Fecha aprob propuesta.."
                                                        value="<?php echo $fecha_aprob_propuesta?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha ent anteproyecto</label>
                                                    <input type="text" name="fecha_ent_anteproyecto"
                                                        value="<?php echo $fecha_ent_anteproyecto?>"
                                                        class="form-control" placeholder="Fecha entrega anteproyecto.."
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Jurado 1</label>
                                                    <input type="text" name="jurado1" class="form-control"
                                                        placeholder="No tiene" value="<?php echo $jurado1?>"
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jurado 2</label>
                                                    <input type="text" name="jurado2" value="<?php echo $jurado2?>"
                                                        class="form-control" placeholder="Jurado 2.."
                                                        readonly="readonly">
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

                                            <!--window.close(); opener.location.reload(); -->

                                            <button id="idButtonActualizar" class="btn btn-primary float-right mr-2"
                                                style="background-color: green; margin-bottom: 10px ">Registrar</button>

                                            <!-- ejecu_act_tesisdir -->
                                        </div>

                                    </form>

                                    <script>
                                    $(document).ready(function() {
                                        ActualizarProyect();
                                    });


                                    var ActualizarProyect = function() {
                                        $('#idButtonActualizar').on("click", function(e) {
                                            e.preventDefault();

                                            var other_data = $("#idFormEdit").serializeArray();

                                            var paqueteDeDatos = new FormData();

                                            $.each(other_data, function(key, input) {
                                                paqueteDeDatos.append(input.name, input.value);
                                            });

                                            var Box = document.getElementById("idBox");
                                            var iconBox = document.getElementById("idIConBox");

                                            $.ajax({
                                                type: "POST",
                                                contentType: false,
                                                processData: false,
                                                cache: false,
                                                url: "ejecu_act_tesisdir.php",
                                                data: paqueteDeDatos,
                                            }).done(function(info) {
                                                console.log(info);
                                                if (info === "1") {
                                                    Box.style.display = 'Block';
                                                    Box.className =
                                                        "alert alert-success alert-dismissible";
                                                    iconBox.className = "icon fas fa-check";
                                                    iconBox.innerHTML = "   Edición Completada";
                                                    $('#idButtonActualizar').prop('disabled', true);
                                                } else {
                                                    Box.style.display = 'Block';
                                                    Box.className =
                                                        "alert alert-danger alert-dismissible";
                                                    iconBox.className = "icon fas fa-ban";
                                                    iconBox.innerHTML =
                                                        "   Error en el procesamiento, no se actualizaron los datos";
                                                    $('#idButtonActualizar').prop('disabled',
                                                        false);
                                                }
                                            });

                                        })
                                    }
                                    </script>








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