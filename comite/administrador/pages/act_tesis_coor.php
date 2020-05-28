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
                                        Evaluar Documento
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
                            <h1 id="Text">Evaluar Documento</h1>
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

                                    //ojo
                                    $sql = "SELECT * FROM tesis WHERE ID_estudiante=$ID_estudiante";
                                    $ressql = mysqli_query($mysqli, $sql);
                                    while ($row = mysqli_fetch_row($ressql)) {
                                        utf8_decode($ID_estado = $row[6]);

                                        if ($ID_estado == 'Entrega Propuesta' or $ID_estado == 'Correccion Propuesta') {
                                            utf8_decode($Pobservaciones = $row[7]);
                                        }
                                        if ($ID_estado == 'Entrega Anteproyecto') {
                                            utf8_decode($Aobservaciones = $row[7]);
                                        }
                                        if ($ID_estado == 'Entrega Proyecto') {
                                            utf8_decode($Pyobservaciones = $row[7]);
                                        } else {

                                            utf8_decode($Oobservaciones = $row[7]);
                                        }
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
                                    $query = $mysqli->query("SELECT * FROM ejes_tem where id_eje='$id_eje'");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        utf8_decode($nombre_eje = $valores[1]);
                                    }
                                    ?>
                                    <?php $fecha = date("Y-m-d"); ?>
                                    <form id="loginForm" action="ejec_act_tesis_coor.php" method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Id documento</label>
                                                    <input type="text" name="id" class="form-control" placeholder="id" value="<?php echo $id ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Id Estudiante</label>
                                                    <input type="text" name="ID_estudiante" value="<?php echo $ID_estudiante ?>" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Id Estudiante 2</label>
                                                    <input type="text" name="ID_estudiante1" class="form-control" value="<?php echo $ID_estudiante1; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Opción de Grado</label>
                                                    <!--(Proyecto - 0, Semillero - 1, Curso - 2, Posgrado - 4, Auxiliar - 3)-->
                                                    <select class="form-control" name="id_estudiante2" class="id_estudiante2" value="<?php echo $id_estudiante2 ?>">
                                                        <option value="0"> Semillero </option>
                                                        <option value="1"> Curso </option>
                                                        <option value="2"> Posgrado </option>
                                                        <option value="3"> Auxiliar </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <textarea class="form-control" rows="3" name="titulo_tesis" cols="29" aria-required="true"><?php echo $titulo_tesis ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Director</label>
                                                    <select name="ID_directores" class="form-control select2" style="width: 100%;">
                                                        <option value="<?php echo $ID_directores ?>"><?php echo $ID_directores ?></option>
                                                        <?php
                                                        require("../../connect_db.php");
                                                        $dir = "Director";
                                                        $coor = "Coordinador";
                                                        $query = $mysqli->query("SELECT * FROM login where (TipoUsuario='$dir' or tipoUsuario='$coor' or tipoUsuario='Cifi')  ORDER BY  user asc");

                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            if ($valores['user'] != '') {
                                                                $contador = 0;
                                                                $query1 = $mysqli->query("SELECT * FROM tesis where terminado!=2 and ID_directores='$valores[user]'");
                                                                while ($valores1 = mysqli_fetch_array($query1)) {
                                                                    $contador = $contador + 1;
                                                                }
                                                            }
                                                            echo '<option value"' . $valores['user'] . '">' . $valores['user'] . ' - Cant: ' . $contador . '</option>';
                                                        }

                                                        ?>
                                                        <option value="No aplica">No aplica</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Aprobado por el Director</label>

                                                    <select name="aprob_dir" class="form-control select2" style="width: 100%;">
                                                        <option value="<?php echo $aprob_dir ?>"><?php echo $aprob_dir ?></option>
                                                        <?php
                                                        if ($aprob_dir != 'SI') {
                                                            echo '<option value="SI">SI</option>';
                                                        }
                                                        if ($aprob_dir != 'NO') {
                                                            echo '<option value="NO">NO</option>';
                                                        }
                                                        ?>
                                                        <option value="No aplica">No aplica</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Evaluador 1</label>
                                                    <select name="jurado1" class="form-control select2" style="width: 100%;">
                                                        <option value="<?php echo $jurado1 ?>"><?php echo $jurado1 ?></option>
                                                        <?php
                                                        utf8_decode($dir = "Director");
                                                        $query = $mysqli->query("SELECT * FROM login where (TipoUsuario='$dir' or tipoUsuario='$coor' or tipoUsuario='Cifi')  ORDER BY   user asc ");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            if ($valores['user'] != '') {
                                                                $contador1 = 0;
                                                                $query1 = $mysqli->query("SELECT * FROM tesis where terminado!=2 and (jurado1='$valores[user]' or jurado2='$valores[user]')");
                                                                while ($valores1 = mysqli_fetch_array($query1)) {
                                                                    $contador1 = $contador1 + 1;
                                                                }
                                                            }
                                                            echo '<option value="' . $valores['user'] . '">' . $valores['user'] . ' - Cant: ' . $contador1 . '</option>';
                                                        }
                                                        ?>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Evaluador 2</label>
                                                    <select name="jurado2" class="form-control select2" style="width: 100%;">
                                                        <option value="<?php echo $jurado2 ?>"><?php echo $jurado2 ?></option>
                                                        <?php
                                                        utf8_decode($dir = "Director");
                                                        $query = $mysqli->query("SELECT * FROM login where (TipoUsuario='$dir' or tipoUsuario='$coor' or tipoUsuario='Cifi')  ORDER BY  user asc ");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            if ($valores['user'] != '') {
                                                                $contador2 = 0;
                                                                $query1 = $mysqli->query("SELECT * FROM tesis where terminado!=2 and (jurado1='$valores[user]' or jurado2='$valores[user]')");
                                                                while ($valores1 = mysqli_fetch_array($query1)) {
                                                                    $contador2 = $contador2 + 1;
                                                                }
                                                            }
                                                            echo '<option value="' . $valores['user'] . '">' . $valores['user'] . ' - Cant: ' . $contador2 . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <input type="text" name="ID_estado" class="form-control" placeholder="Estado.." value="<?php echo $ID_estado ?>" readonly="readonly">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <center>
                                                        <label>Historial/Observaciones</label>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <center><label>De la propuesta</label>
                                                        <?php
                                                        if (isset($Pobservaciones)) {
                                                            //  echo "<input type='text' class='form-control' placeholder='Estado..' value='$Pobservaciones' readonly='readonly'>";
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>$observaciones</textarea>";
                                                        } else {
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>Sin comentarios</textarea>";
                                                        }
                                                        ?>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <center>
                                                        <label>Del anteproyecto</label>
                                                        <?php
                                                        if (isset($Aobservaciones)) {
                                                            //   echo "\n<b>Del anteproyecto:</b> " . $Aobservaciones;
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>$Aobservaciones</textarea>";
                                                        } else {
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>Sin comentarios</textarea>";
                                                        }
                                                        ?>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <center>
                                                        <label>Del Proyecto</label>
                                                        <?php
                                                        if (isset($Pyobservaciones)) {
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>$Pyobservaciones</textarea>";
                                                        } else {
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>Sin comentarios</textarea>";
                                                        }
                                                        ?>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <center>
                                                        <label>Otro</label>
                                                        <?php
                                                        if (isset($Oobservaciones)) {
                                                            //  echo "\n<b>Otro:</b> " . $Oobservaciones;
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>$Oobservaciones</textarea>";
                                                        } else {
                                                            // echo "\n<b>Otro:</b> ";
                                                            echo "<textarea class='form-control' rows='2' cols='29' aria-required='true'>Sin comentarios</textarea>";
                                                        }
                                                        ?>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" name="observaciones" cols="29" aria-required="true"><?php echo $observaciones ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Linea de Investigación</label>
                                                    <select name="jurado2" class="form-control select2" style="width: 100%;">
                                                        <option value="<?php echo utf8_decode($id_area) ?>"><?php echo 'L&iacutenea ' . $id_area . ' : ' . $nombre_area ?></option>
                                                        <?php
                                                        $query = $mysqli->query("SELECT * FROM area_inves ORDER BY  id_area ASC ");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            if ($nombre_area == '') {
                                                                $nombre_area = 0;
                                                            }
                                                            echo '<option  value="' . $valores['id_area'] . '">' . $valores['id_area'] . ': ' . $valores['nombre_area'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Eje temático</label>
                                                    <select name="id_eje" class="form-control select2" style="width: 100%;">
                                                        <option value="<?php echo utf8_decode($id_eje) ?>"><?php echo 'Eje ' . $id_eje . ': ' . $nombre_eje ?></option>
                                                        <?php
                                                        $query = $mysqli->query("SELECT * FROM ejes_tem ORDER BY  id_eje ASC ");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            if ($nombre_eje == '') {
                                                                $nombre_eje = 0;
                                                            }
                                                            echo '<option value="' . $valores['id_eje'] . '">Línea' . $valores['id_area'] . ': Eje ' . $valores['id_eje'] . ': ' . $valores['nombre_eje'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Archivo</label>
                                                    <input type="text" name="archivo" class="form-control" value="<?php echo $archivo ?>" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha entrega Propuesta</label>
                                                    <input type="date" name="fecha_propuesta" class="form-control" value="<?php echo $fecha_propuesta ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha actualizacion / aprobacion propuesta</label>
                                                    <input type="date" name="fecha_aprob_propuesta" class="form-control" value="<?php echo $fecha_aprob_propuesta ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha entrega anteproyecto (minimo 30, maximo 360 dias)</label>
                                                    <input type="date" name="fecha_ent_anteproyecto" class="form-control" value="<?php echo $fecha_ent_anteproyecto ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha entrega proyecto (mínimo 120, maximo 360 días)</label>
                                                    <input type="date" name="proyecto" class="form-control" value="<?php echo $proyecto ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <center>
                                                        <label>Estado del Documento</label>
                                                        <br>
                                                        <label>Estado inicial: <small>Por Evaluar </small> <br>Cuando el documento se modifica: <small>En Proceso</small></label>
                                                    </center>
                                                    <?php
                                                    require("../../connect_db.php");
                                                    $query = $mysqli->query("SELECT * FROM estado where id_estado='$terminado'");
                                                    //$query = $mysqli->query("SELECT * FROM estado");
                                                    while ($valores = mysqli_fetch_array($query)) {
                                                        $estab = $valores[1];
                                                        if ($estab == '0') {
                                                            $estab = 'Por procesar';
                                                        }
                                                    }
                                                    ?>

                                                    <select class="form-control" name="terminado" required>
                                                        <!--<option></option> -->
                                                        <option value="<?php echo $terminado ?>"><?php echo $estab ?></option>
                                                        <?php
                                                        require("../../connect_db.php");
                                                        $query = $mysqli->query("SELECT * FROM estado ORDER BY  id_estado DESC");
                                                        while ($valores = mysqli_fetch_array($query)) {
                                                            echo '<option value="' . $valores['id_estado'] . '">' . $valores['nombree'] . '</option>';
                                                        }
                                                        ?>
                                                        <option value="0">No aplica</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label>Nota: <small>(Aplica para sustentación proyecto - Monografía)</small></label>
                                                <input type="text" class="form-control" name="nota" value="<?php echo $nota; ?>">
                                            </div>


                                            <div class="col-12 pt-2">
                                                <label>Señor Coordinador, los cambios en el registro serán notificados vía correo electrónico automáticamente a los interesados</label>
                                            </div>

                                        </div>


                                        <div class="card-footer">
                                            <!--  <button class="btn btn-default float-right" onclick="window.close();" style="margin-bottom: 10px ">Cancelar</button>
                                            <button type="submit" id="login" class="btn btn-primary float-right mr-2" style="background-color: green; margin-bottom: 10px ">Guardar</button>-->
                                            <center>
                                                <input type="submit" value="Guardar" class="btn btn-dark">
                                                <input type="button" class="btn btn-dark" value="Volver" name="volver" onclick="window.close()">
                                            </center>

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