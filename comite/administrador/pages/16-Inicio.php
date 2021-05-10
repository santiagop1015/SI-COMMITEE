<!DOCTYPE html>

<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../../index.html");
}
    //@$buscart=$_POST['buscart'];
    

	@$buscar=$_POST['buscar'];

date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
$usuario=$_SESSION['user'];
extract($_GET);
require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
utf8_decode($programa=$arreglo[11]);
$coordir=$arreglo[4];
$passd=$arreglo[8];

 if ($arreglo[2]!='Administrador') {
	require("../../desconectar.php");
	header("Location:../../../index.html");
}
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Profesores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../LocalSources/css/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
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

    <script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>

    <style>
    .nav-pills .nav-link {
        color: black;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #10707f;
    }

    .nav-pills .nav-link:not(.active):hover {
        color: #10707f;
    }
    </style>
</head>

<body id="idCard" style="background-color: #f4f6f9;">
    <div class="btn-group w-100 mb-2">
        <a id="idAnclaReg" class="btn btn-info" href="javascript:onClickManejo(0)"> Registrar Información </a>
        <a id="idAnclaRep" class="btn btn-info" href="javascript:onClickManejo(1)"> Generar Reportes </a>
        <a id="idAnclaAct" class="btn btn-info" href="javascript:onClickManejo(2)"> Act. Mis Datos </a>
        <a id="idAnclaDirJur" class="btn btn-info" href="javascript:onClickManejo(3)"> Dir/Jur </a>
    </div>
    <script>
    function onClickManejo(value, ancla) {
        switch (value) {
            case 0:
                document.getElementById("idAnclaReg").classList.add("active");
                document.getElementById("idAnclaRep").classList.remove("active");
                //document.getElementById("idAnclaAct").classList.remove("active");
                //document.getElementById("idAnclaDirJur").classList.remove("active");

                document.getElementById("IdDivRegistrarInfo").classList.remove("d-none");
                document.getElementById("IdDivGenerarReportes").classList.add("d-none");
                //document.getElementById("IdDivActDatos").classList.add("d-none");
                //document.getElementById("IdDivDirJur").classList.add("d-none");
                window.parent.ReloadsFrames("non-reaload");
                break;
            case 1:
                document.getElementById("idAnclaReg").classList.remove("active");
                document.getElementById("idAnclaRep").classList.add("active");
                // document.getElementById("idAnclaAct").classList.remove("active");
                //document.getElementById("idAnclaDirJur").classList.remove("active");

                document.getElementById("IdDivRegistrarInfo").classList.add("d-none");
                document.getElementById("IdDivGenerarReportes").classList.remove("d-none");
                //document.getElementById("IdDivActDatos").classList.add("d-none");
                //document.getElementById("IdDivDirJur").classList.add("d-none");
                window.parent.ReloadsFrames("non-reaload");
                break;
            case 2:
                /* document.getElementById("idAnclaReg").classList.remove("active");
                 document.getElementById("idAnclaRep").classList.remove("active");
                 document.getElementById("idAnclaAct").classList.add("active");
                 document.getElementById("idAnclaDirJur").classList.remove("active");

                 document.getElementById("IdDivRegistrarInfo").classList.add("d-none");
                 document.getElementById("IdDivGenerarReportes").classList.add("d-none");
                 document.getElementById("IdDivActDatos").classList.remove("d-none");
                 document.getElementById("IdDivDirJur").classList.add("d-none");*/
                window.top.location.href = "../profile.php";
                break;
            case 3:
                /* document.getElementById("idAnclaReg").classList.remove("active");
                 document.getElementById("idAnclaRep").classList.remove("active");
                // document.getElementById("idAnclaAct").classList.remove("active");
                 document.getElementById("idAnclaDirJur").classList.add("active");

                 document.getElementById("IdDivRegistrarInfo").classList.add("d-none");
                 document.getElementById("IdDivGenerarReportes").classList.add("d-none");
                 //document.getElementById("IdDivActDatos").classList.add("d-none");
                 document.getElementById("IdDivDirJur").classList.remove("d-none");
                 */
                //alert("123");
                window.top.location.href = "../directorcoord.php";
                break;
            default:
                1

                break;
        }
        Evaluar();

    }
    </script>
    <div id="IdDivRegistrarInfo" class="mt-2 d-none">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                          <!--  <li class="nav-item">
                                <a class="nav-link" href="#tabEstudiante" data-toggle="tab">
                                    <i class="fas fa-user-graduate"></i> Estudiante
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabProfesor" data-toggle="tab">
                                    <i class="fas fa-chalkboard-teacher"></i> Profesor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabAsistente" data-toggle="tab">
                                    <i class="fas fa-user-tie"></i> Asistente
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="#tabLinea" data-toggle="tab">
                                    <i class="fas fa-flask"></i> Linea Investigación
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabEje" data-toggle="tab">
                                    <i class="fab fa-buffer"></i> Eje Temático
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="idNavFechas" class="nav-link" href="#tabFecha" data-toggle="tab">
                                    <i class="fa fa-calendar"></i> Fechas de Reuniones
                                </a>
                            </li>
                            <script>
                            // Cuando hace click al algun elemento con nav-link
                            $(document).on("click", ".nav-link", function() {
                                Evaluar();
                            });
                            </script>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane" id="tabEstudiante">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Estudiante</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip"
                                        title="Registrar Usuario">
                                        <i class="fa fa-sync" onclick="ClearEstudiante();"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="idFormRegEst">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nombres y Apellidos</label>
                                                <input type="text" class="form-control" name="user" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    placeholder="@unilibre.edu.co" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cedula</label>
                                                <input type="number" class="form-control" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="number" class="form-control" name="telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Programa</label>
                                                <!--<input type="text" class="form-control" name="programa"
                                                    value="<?php //echo $programa;?>" readonly="readonly"> -->
                                                <select class="form-control" name="programa">
                                                    <option>Sistemas</option>
                                                    <option>Industrial</option>
                                                    <option>Mecanica</option>
                                                    <option>Ambiental</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha de nacimiento</label>
                                                <input type="date" class="form-control" name="fechadenacimiento">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="callout callout-info">
                                                <h5>Tener en cuenta que..</h5>
                                                <p>es posible que el mensaje llegue a su bandeja de Spam</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div id="idBoxEst" class="alert alert-danger alert-dismissible mt-6"
                                        style="Display: None;">
                                        <h5>
                                            <i id="idIConBoxEst" class="icon fas fa-ban"></i>

                                        </h5>
                                        <p id="idMessageComenEst"></p>

                                    </div>
                                    <button id="idButtonRegEst" type="submit"
                                        class="btn btn-primary float-right">Registrar</button>
                                </div>
                            </form>
                            <script>
                            function ClearEstudiante() {
                                $("#idFormRegEst")[0].reset();
                                document.getElementById("idButtonRegEst").disabled = false;
                                document.getElementById("idBoxEst").style.display = 'None';
                            }

                            $('#idFormRegEst').submit(function(e) {
                                e.preventDefault();
                                //alert("onsubmit");
                                var data_Est = $("#idFormRegEst").serializeArray();
                                var paqueteDeDatos_Est = new FormData();
                                $.each(data_Est, function(key, input) {
                                    paqueteDeDatos_Est.append(input.name, input.value);
                                });
                                var BoxEst = document.getElementById("idBoxEst");
                                BoxEst.style.display = 'None';
                                var iconBoxEst = document.getElementById(
                                    "idIConBoxEst");
                                var MensajeEst = document.getElementById(
                                    "idMessageComenEst");
                                var ButtonRegistarEst = document.getElementById("idButtonRegEst");

                                $.ajax({
                                    type: "POST",
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    url: "16.1-registro_est.php",
                                    data: paqueteDeDatos_Est,
                                }).done(function(info) {
                                    //console.log(info);
                                    //debugger;
                                    if (info == "1") {
                                        MensajeEst.innerHTML = "Estudiante Registrado Correctamente";
                                        idBoxEst.style.display = "Block";
                                        idBoxEst.className =
                                            "alert alert-success alert-dismissible";
                                        iconBoxEst.className = "icon fas fa-check";
                                        iconBoxEst.innerHTML = " Correcto";
                                        ButtonRegistarEst.disabled = true;
                                    } else if (info == "2") {
                                        MensajeEst.innerHTML =
                                            "ya existe un usuario con estos caracteres, verifique sus datos";
                                        idBoxEst.style.display = "Block";
                                        idBoxEst.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxEst.className = "icon fas fa-exclamation-triangle";
                                        iconBoxEst.innerHTML = " Atencion";
                                        ButtonRegistarEst.disabled = false;
                                    } else if (info == "3") {
                                        MensajeEst.innerHTML = "Las contraseñas son incorrectas";
                                        idBoxEst.style.display = "Block";
                                        idBoxEst.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxEst.className = "icon fas fa-exclamation-triangle";
                                        iconBoxEst.innerHTML = " Atencion";
                                        ButtonRegistarEst.disabled = false;
                                    }
                                    Evaluar();
                                });

                            });
                            </script>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabProfesor">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Profesor</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip">
                                        <i class="fa fa-sync" onclick="ClearProfesor();"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="idFormRegProf">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nombres y Apellidos</label>
                                                <input type="text" class="form-control" name="user" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    placeholder="@unilibre.edu.co" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cedula</label>
                                                <input type="number" class="form-control" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="number" class="form-control" name="telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Programa</label>
                                                <!-- <input type="text" class="form-control" name="programa"
                                                    value="<?php //echo $programa;?>" readonly="readonly"> -->
                                                <select class="form-control" name="programa">
                                                    <option>Sistemas</option>
                                                    <option>Industrial</option>
                                                    <option>Mecanica</option>
                                                    <option>Ambiental</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha de nacimiento</label>
                                                <input type="date" class="form-control" name="fechadenacimiento">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Lìnea de Investigación</label>
                                                <select name="area" class="form-control" required>
                                                    <?php
                                                       $query = $mysqli -> query ("SELECT * FROM area_inves where   programa='$programa' ORDER BY  id_area ASC ");
                                                       while ($valores = mysqli_fetch_array($query)) {
                                                       if($nombre_area==''){ $nombre_area=0;}
                                                       echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                                       } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="callout callout-info">
                                                <h5>Tener en cuenta que..</h5>
                                                <p>es posible que el mensaje llegue a su bandeja de Spam</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div id="idBoxProf" class="alert alert-danger alert-dismissible mt-6"
                                        style="Display: None;">
                                        <h5>
                                            <i id="idIConBoxProf" class="icon fas fa-ban"></i>

                                        </h5>
                                        <p id="idMessageComenProf"></p>

                                    </div>
                                    <button id="idButtonRegProf" type="submit"
                                        class="btn btn-primary float-right">Registrar</button>
                                </div>
                            </form>
                            <script>
                            function ClearProfesor() {
                                $("#idFormRegProf")[0].reset();
                                document.getElementById("idButtonRegProf").disabled = false;
                                document.getElementById("idBoxProf").style.display = 'None';
                            }
                            $('#idFormRegProf').submit(function(e) {
                                e.preventDefault();
                                //alert("onsubmit");
                                var data_Prof = $("#idFormRegProf").serializeArray();
                                var paqueteDeDatos_Prof = new FormData();
                                $.each(data_Prof, function(key, input) {
                                    paqueteDeDatos_Prof.append(input.name, input.value);
                                });
                                var BoxProf = document.getElementById("idBoxProf");
                                BoxProf.style.display = 'None';
                                var iconBoxProf = document.getElementById(
                                    "idIConBoxProf");
                                var MensajeProf = document.getElementById(
                                    "idMessageComenProf");
                                var ButtonRegistarProf = document.getElementById("idButtonRegProf");

                                $.ajax({
                                    type: "POST",
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    url: "16.2-registro_prof.php",
                                    data: paqueteDeDatos_Prof,
                                }).done(function(info) {
                                    //console.log(info);
                                    //debugger;
                                    if (info == "1") {
                                        MensajeProf.innerHTML = "Profesor Registrado Correctamente";
                                        BoxProf.style.display = "Block";
                                        BoxProf.className =
                                            "alert alert-success alert-dismissible";
                                        iconBoxProf.className = "icon fas fa-check";
                                        iconBoxProf.innerHTML = " Correcto";
                                        ButtonRegistarProf.disabled = true;
                                    } else if (info == "2") {
                                        MensajeProf.innerHTML =
                                            "ya existe un usuario con estos caracteres, verifique sus datos";
                                        BoxProf.style.display = "Block";
                                        BoxProf.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxProf.className = "icon fas fa-exclamation-triangle";
                                        iconBoxProf.innerHTML = " Atencion";
                                        ButtonRegistarProf.disabled = false;
                                    } else if (info == "3") {
                                        MensajeProf.innerHTML = "Las contraseñas son incorrectas";
                                        BoxProf.style.display = "Block";
                                        BoxProf.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxProf.className = "icon fas fa-exclamation-triangle";
                                        iconBoxProf.innerHTML = " Atencion";
                                        ButtonRegistarProf.disabled = false;
                                    }
                                    Evaluar();
                                });


                            });
                            </script>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabAsistente">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Asistente/Jurado</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip">
                                        <i class="fa fa-sync" onclick="ClearJurado();"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="idFormRegJur">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nombres y Apellidos</label>
                                                <input type="text" class="form-control" name="user" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    placeholder="@unilibre.edu.co" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cedula</label>
                                                <input type="number" class="form-control" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="number" class="form-control" name="telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Programa</label>
                                                <!-- <input type="text" class="form-control" name="programa"
                                                    value="<?php //echo $programa;?>" readonly="readonly"> -->
                                                <select class="form-control" name="programa">
                                                    <option>Sistemas</option>
                                                    <option>Industrial</option>
                                                    <option>Mecanica</option>
                                                    <option>Ambiental</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha de nacimiento</label>
                                                <input type="date" class="form-control" name="fechadenacimiento">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="callout callout-info">
                                                <h5>Tener en cuenta que..</h5>
                                                <p>es posible que el mensaje llegue a su bandeja de Spam</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div id="idBoxJur" class="alert alert-danger alert-dismissible mt-6"
                                        style="Display: None;">
                                        <h5>
                                            <i id="idIConBoxJur" class="icon fas fa-ban"></i>

                                        </h5>
                                        <p id="idMessageComenJur"></p>

                                    </div>
                                    <button id="idButtonRegJur" type="submit"
                                        class="btn btn-primary float-right">Registrar</button>
                                </div>
                            </form>
                            <script>
                            function ClearJurado() {
                                $("#idFormRegJur")[0].reset();
                                document.getElementById("idButtonRegJur").disabled = false;
                                document.getElementById("idBoxJur").style.display = 'None';

                            }
                            $('#idFormRegJur').submit(function(e) {
                                e.preventDefault();
                                //alert("onsubmit");
                                var data_Jur = $("#idFormRegJur").serializeArray();
                                var paqueteDeDatos_Jur = new FormData();
                                $.each(data_Jur, function(key, input) {
                                    paqueteDeDatos_Jur.append(input.name, input.value);
                                });
                                var BoxJur = document.getElementById("idBoxJur");
                                BoxJur.style.display = 'None';
                                var iconBoxJur = document.getElementById(
                                    "idIConBoxJur");
                                var MensajeJur = document.getElementById(
                                    "idMessageComenJur");
                                var ButtonRegistarJur = document.getElementById("idButtonRegJur");

                                $.ajax({
                                    type: "POST",
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    url: "16.3-registro_jur.php",
                                    data: paqueteDeDatos_Jur,
                                }).done(function(info) {
                                    //console.log(info);
                                    //debugger;
                                    if (info == "1") {
                                        MensajeJur.innerHTML =
                                            "Asistente/Jurado Registrado Correctamente";
                                        BoxJur.style.display = "Block";
                                        BoxJur.className =
                                            "alert alert-success alert-dismissible";
                                        iconBoxJur.className = "icon fas fa-check";
                                        iconBoxJur.innerHTML = " Correcto";
                                        ButtonRegistarJur.disabled = true;
                                    } else if (info == "2") {
                                        MensajeJur.innerHTML =
                                            "ya existe un usuario con estos caracteres, verifique sus datos";
                                        BoxJur.style.display = "Block";
                                        BoxJur.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxJur.className = "icon fas fa-exclamation-triangle";
                                        iconBoxJur.innerHTML = " Atencion";
                                        ButtonRegistarJur.disabled = false;
                                    } else if (info == "3") {
                                        MensajeJur.innerHTML = "Las contraseñas son incorrectas";
                                        BoxJur.style.display = "Block";
                                        BoxJur.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxJur.className = "icon fas fa-exclamation-triangle";
                                        iconBoxJur.innerHTML = " Atencion";
                                        ButtonRegistarJur.disabled = false;
                                    }
                                    Evaluar();
                                });


                            });
                            </script>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabLinea">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Línea de Investigación</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip">
                                        <i class="fa fa-sync" onclick="ClearLinea();"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="idFormRegLinea">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nombres de línea</label>
                                                <input type="text" class="form-control" name="nombre_area" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Programa</label>
                                                <!-- <input type="text" class="form-control" name="programa"
                                                    value="<?php //echo $programa;?>" readonly="readonly"> -->
                                                <select class="form-control" name="programa">
                                                    <option>Sistemas</option>
                                                    <option>Industrial</option>
                                                    <option>Mecanica</option>
                                                    <option>Ambiental</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div id="idBoxLinea" class="alert alert-danger alert-dismissible mt-6"
                                        style="Display: None;">
                                        <h5>
                                            <i id="idIConBoxLinea" class="icon fas fa-ban"></i>

                                        </h5>
                                        <p id="idMessageComenLinea"></p>

                                    </div>
                                    <button id="idButtonRegLinea" type="submit"
                                        class="btn btn-primary float-right">Registrar</button>
                                </div>
                            </form>
                            <script>
                            function ClearLinea() {
                                $("#idFormRegLinea")[0].reset();
                                document.getElementById("idButtonRegLinea").disabled = false;
                                document.getElementById("idBoxLinea").style.display = 'None';
                            }
                            $('#idFormRegLinea').submit(function(e) {
                                e.preventDefault();
                                //alert("onsubmit");
                                var data_Linea = $("#idFormRegLinea").serializeArray();
                                var paqueteDeDatos_Linea = new FormData();
                                $.each(data_Linea, function(key, input) {
                                    paqueteDeDatos_Linea.append(input.name, input.value);
                                });
                                var BoxLinea = document.getElementById("idBoxLinea");
                                BoxLinea.style.display = 'None';
                                var iconBoxLinea = document.getElementById(
                                    "idIConBoxLinea");
                                var MensajeLinea = document.getElementById(
                                    "idMessageComenLinea");
                                var ButtonRegistarLinea = document.getElementById("idButtonRegLinea");

                                $.ajax({
                                    type: "POST",
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    url: "16.4-registro_linea.php",
                                    data: paqueteDeDatos_Linea,
                                }).done(function(info) {
                                    //console.log(info);
                                    //debugger;
                                    if (info == "1") {
                                        MensajeLinea.innerHTML = "Línea Registrada Correctamente";
                                        BoxLinea.style.display = "Block";
                                        BoxLinea.className =
                                            "alert alert-success alert-dismissible";
                                        iconBoxLinea.className = "icon fas fa-check";
                                        iconBoxLinea.innerHTML = " Correcto";
                                        ButtonRegistarLinea.disabled = true;
                                    } else {
                                        MensajeLinea.innerHTML =
                                            "Error registrando la línea por favor contacte al administrador";
                                        BoxLinea.style.display = "Block";
                                        BoxLinea.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxLinea.className = "icon fas fa-exclamation-triangle";
                                        iconBoxLinea.innerHTML = " Atencion";
                                        ButtonRegistarLinea.disabled = false;
                                    }
                                    Evaluar();
                                });


                            });
                            </script>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabEje">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Eje temático</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip">
                                        <i class="fa fa-sync" onclick="ClearEje();"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="idFormRegEje">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php
										     require("../../connect_db.php");
                                             $query = $mysqli -> query ("SELECT * FROM area_inves  ");
                                             while ($valores = mysqli_fetch_array($query)) {
                                             $id_area=$valores[0];
								             $nombre_area=$valores[1];
                                             } 
                                             ?>
                                            <div class="form-group">
                                                <label>Nombre Eje</label>
                                                <input type="text" class="form-control" name="nombre_eje" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Programa</label>
                                                <!-- <input type="text" class="form-control" name="programa"
                                                    value="<?php //echo $programa;?>" readonly="readonly"> -->
                                                <select class="form-control" name="programa">
                                                    <option>Sistemas</option>
                                                    <option>Industrial</option>
                                                    <option>Mecanica</option>
                                                    <option>Ambiental</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Línea de investigación</label>
                                                <select name="id_area" class="form-control" required>
                                                    <?php
                                                       $query = $mysqli -> query ("SELECT * FROM area_inves where   programa='$programa' ORDER BY  id_area ASC ");
                                                       while ($valores = mysqli_fetch_array($query)) {
                                                       echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                                       } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div id="idBoxEje" class="alert alert-danger alert-dismissible mt-6"
                                        style="Display: None;">
                                        <h5>
                                            <i id="idIConBoxEje" class="icon fas fa-ban"></i>

                                        </h5>
                                        <p id="idMessageComenEje"></p>

                                    </div>
                                    <button id="idButtonRegEje" type="submit"
                                        class="btn btn-primary float-right">Registrar</button>
                                </div>
                            </form>
                            <script>
                            function ClearEje() {
                                $("#idFormRegEje")[0].reset();
                                document.getElementById("idButtonRegEje").disabled = false;
                                document.getElementById("idBoxEje").style.display = 'None';
                            }
                            $('#idFormRegEje').submit(function(e) {
                                e.preventDefault();
                                //alert("onsubmit");
                                var data_Eje = $("#idFormRegEje").serializeArray();
                                var paqueteDeDatos_Eje = new FormData();
                                $.each(data_Eje, function(key, input) {
                                    paqueteDeDatos_Eje.append(input.name, input.value);
                                });
                                var BoxEje = document.getElementById("idBoxEje");
                                BoxEje.style.display = 'None';
                                var iconBoxEje = document.getElementById(
                                    "idIConBoxEje");
                                var MensajeEje = document.getElementById(
                                    "idMessageComenEje");
                                var ButtonRegistarEje = document.getElementById("idButtonRegEje");

                                $.ajax({
                                    type: "POST",
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    url: "16.5-registro_eje.php",
                                    data: paqueteDeDatos_Eje,
                                }).done(function(info) {
                                    //console.log(info);
                                    //debugger;
                                    if (info == "1") {
                                        MensajeEje.innerHTML = "Línea Registrada Correctamente";
                                        BoxEje.style.display = "Block";
                                        BoxEje.className =
                                            "alert alert-success alert-dismissible";
                                        iconBoxEje.className = "icon fas fa-check";
                                        iconBoxEje.innerHTML = " Correcto";
                                        ButtonRegistarEje.disabled = true;
                                    } else {
                                        MensajeEje.innerHTML =
                                            "Error registrando la línea por favor contacte al administrador";
                                        BoxEje.style.display = "Block";
                                        BoxEje.className =
                                            "alert alert-warning alert-dismissible";
                                        iconBoxEje.className = "icon fas fa-exclamation-triangle";
                                        iconBoxEje.innerHTML = " Atencion";
                                        ButtonRegistarEje.disabled = false;
                                    }
                                    Evaluar();
                                });


                            });
                            </script>

                        </div>
                    </div>
                    <div class="tab-pane" id="tabFecha">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Fechas de Reuniones</h3>

                            </div>
                            <form id="idFormFechas">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                          <?php
										     require("../../connect_db.php");
                                             $query = $mysqli -> query ("SELECT * FROM fechascom WHERE programa='$programa'");
                                             $fecha = '';
                                             while ($valores = mysqli_fetch_array($query)) {
                                               $id_fecha=$valores[0];
                                               $fecha=$valores[1];
                                             } 
                                             ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $fecha ?>" name="fecha" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div id="idBoxFecha" class="alert alert-danger alert-dismissible mt-6"
                                        style="Display: None;">
                                        <h5>
                                            <i id="idIConBoxFecha" class="icon fas fa-ban"></i>

                                        </h5>
                                        <p id="idMessageComenFecha"></p>

                                    </div>
                                    <button id="idButtonRegFecha" type="submit"
                                        class="btn btn-primary float-right">
                                        Registrar
                                    </button>
                                </div>
                            </form>
                            <script> 
                            var action = ''
                            $('#idFormFechas').submit(function(e) {
                                e.preventDefault();
                                var data_Fecha = $("#idFormFechas").serializeArray();
                                var paqueteDeDatos_Fecha = new FormData();
                                if(action.length == 0) {
                                  action = <?php echo strlen($fecha) > 0 ? '"update"' : '"insert"'; ?>;
                                } 
                                $.each(data_Fecha, function(key, input) {
                                    paqueteDeDatos_Fecha.append(input.name, input.value);
                                });
                                paqueteDeDatos_Fecha.append("action", action);
                                paqueteDeDatos_Fecha.append("programa", "<?php echo $programa ?>");

                                var BoxFecha = document.getElementById("idBoxFecha");
                                BoxFecha.style.display = 'None';
                                var iconBoxFecha = document.getElementById(
                                    "idIConBoxFecha");
                                var MensajeFecha = document.getElementById(
                                    "idMessageComenFecha");
                                var ButtonRegistarFecha = document.getElementById("idButtonRegFecha");
                                ButtonRegistarFecha.disabled = true

                                $.ajax({
                                    type: "POST",
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    url: "16.6-registro_fecha.php",
                                    data: paqueteDeDatos_Fecha,
                                }).done(function(info) {
                                    //console.log(info);
                                    if (info === "1") {
                                        action = 'update' 
                                        BoxFecha.className =
                                            "alert alert-success alert-dismissible";
                                        MensajeFecha.innerHTML = "Fechas Registradas Correctamente";
                                        iconBoxFecha.className = "icon fas fa-check";
                                        iconBoxFecha.innerHTML = " Correcto";
                                        setTimeout(() => {
                                            BoxFecha.style.display = "Block";
                                            Evaluar();
                                            ButtonRegistarFecha.disabled = false
                                        }, 500);
                                    } else {
                                        BoxFecha.style.display = "Block";
                                        BoxFecha.className =
                                            "alert alert-danger alert-dismissible";
                                        MensajeFecha.innerHTML =
                                            "Error registrando las fechas por favor contacte al administrador";
                                        iconBoxFecha.className = "icon fas fa-exclamation-triangle";
                                        iconBoxFecha.innerHTML = " Atencion";
                                        setTimeout(() => {
                                            BoxFecha.style.display = "Block";
                                            Evaluar();
                                            ButtonRegistarFecha.disabled = false
                                        }, 500);
                                    }

                                });


                            });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="IdDivGenerarReportes" class="mt-2 d-none">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#tabRepDirector" data-toggle="tab">
                                    <i class="fas fa-chalkboard-teacher"></i> Por Director
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabRepEvaluador" data-toggle="tab">
                                    <i class="fas fa-user-edit"></i> Por Evaluador
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabRepEstado" data-toggle="tab">
                                    <i class="fas fa-thermometer-half"></i> Por Estado
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabRepLinea" data-toggle="tab">
                                    <i class="fas fa-flask"></i> Por Linea
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabRepEje" data-toggle="tab">
                                    <i class="fab fa-buffer"></i> Por Eje
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabRepOpcion" data-toggle="tab">
                                    <i class="fas fa-tasks"></i> Por Opcion
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabRepIngreso" data-toggle="tab">
                                    <i class="fas fa-file-import"></i> Por Ingreso
                                </a>
                            </li>
                            <script>
                            // Cuando hace click al algun elemento con nav-link
                            $(document).on("click", ".nav-link", function() {
                                Evaluar();
                            });
                            </script>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane" id="tabRepDirector">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Generar reporte por Director</h3>
                            </div>
                            <form target="_blank" action="pdf/generarreportes.php" method="post">
                                <div class="card-body">
                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="programa"
                                        value="<?php echo $programa;?>" readonly="readonly">
                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="terminado" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_area" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_eje" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="Jurado" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="usuario"
                                        value="<?php echo $usuario;?>" readonly="readonly">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control" name="ID_directores">
                                                    <?php
		                                               require("../../connect_db.php");
                                                       $query = $mysqli -> query ("SELECT * FROM login where (TipoUsuario='Director' or tipoUsuario='Coordinador') and programa='$programa' ORDER BY  TipoUsuario DESC");
                                                       while ($valores = mysqli_fetch_array($query))	{
		                                               	echo '<option value="'.$valores[user].'">'.$valores[user].'</option>';
		                                               	}
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>F. Ini:</label>
                                                <input type="date" class="form-control" name="fini" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>F. Fin:</label>
                                                <input type="date" class="form-control" name="ffin" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabRepEvaluador">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte por Evaluador</h3>
                            </div>
                            <form target="_blank" action="pdf/generarreportes.php" method="post">
                                <div class="card-body">
                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="programa"
                                        value="<?php echo $programa;?>" readonly="readonly">
                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="terminado" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_area" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_eje" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="ID_directores" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="usuario"
                                        value="<?php echo $usuario;?>" readonly="readonly">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control" name="Jurado">
                                                    <?php
		                                               require("../../connect_db.php");
                                                       $query = $mysqli -> query ("SELECT * FROM login where (TipoUsuario='Director' or tipoUsuario='Coordinador') and programa='$programa' ORDER BY  TipoUsuario DESC");
                                                       while ($valores = mysqli_fetch_array($query))	{
                                                        echo '<option value="'.$valores[user].'">'.$valores[user].'</option>';
		                                               	}
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>F. Ini:</label>
                                                <input type="date" class="form-control" name="fini" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>F. Fin:</label>
                                                <input type="date" class="form-control" name="ffin" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabRepEstado">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte por Estado</h3>
                            </div>
                            <form target="_blank" action="pdf/generarreportes.php" method="post">
                                <div class="card-body">
                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="programa"
                                        value="<?php echo $programa;?>" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="ID_directores" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_area" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_eje" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="Jurado" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="usuario"
                                        value="<?php echo $usuario;?>" readonly="readonly">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control" name="terminado">
                                                    <?php
		                                               require("../../connect_db.php");
                                                       $query = $mysqli -> query ("SELECT * FROM estado ORDER BY  id_estado DESC");
                                                       while ($valores = mysqli_fetch_array($query))	{
                                                        echo '<option value='.$valores[id_estado].'>'.$valores[nombree].'</option>';
		                                               	}
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>F. Ini:</label>
                                                <input type="date" class="form-control" name="fini" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>F. Fin:</label>
                                                <input type="date" class="form-control" name="ffin" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabRepLinea">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte por Línea de Investigación</h3>
                            </div>
                            <form target="_blank" action="pdf/generarreportes.php" method="post">
                                <div class="card-body">
                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="programa"
                                        value="<?php echo $programa;?>" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="ID_directores" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="terminado" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_eje" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="Jurado" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="usuario"
                                        value="<?php echo $usuario;?>" readonly="readonly">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control" name="id_area">
                                                    <?php
		                                               require("../../connect_db.php");
                                                       $query = $mysqli -> query ("SELECT * FROM area_inves where programa='$programa'");
                                                       while ($valores = mysqli_fetch_array($query))	{
                                                        echo '<option value="'.$valores[id_area].'">'.$valores[nombre_area].'</option>';
		                                               	}
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabRepEje">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte por Eje Temático</h3>
                            </div>
                            <form id="idFormRepEje" target="_blank" action="pdf/generarreportes.php" method="post">
                                <div class="card-body">
                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="programa"
                                        value="<?php echo $programa;?>" readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="ID_directores" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="terminado" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="id_area" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="Jurado" value=""
                                        readonly="readonly">

                                    <!-- text input -->
                                    <input type="HIDDEN" class="form-control" name="usuario"
                                        value="<?php echo $usuario;?>" readonly="readonly">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control" name="id_eje">
                                                    <?php
		                                               require("../../connect_db.php");
                                                       $query = $mysqli -> query ("SELECT * FROM ejes_tem where programa='$programa'");
                                                       while ($valores = mysqli_fetch_array($query))	{
                                                           echo '<option value="'.$valores[id_eje].'">'.$valores[nombre_eje].'</option>';
														}
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Generar</button>
                                </div>
                            </form>
                            <script>
                            $('#idFormRepEje').submit(function(e) {
                                //e.preventDefault();

                                var data_repeje = $("#idFormRepEje").serializeArray();
                                console.log(data_repeje);
                            });
                            </script>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabRepOpcion">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte por Opción de Grado</h3>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabRepIngreso">
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte por Ingreso a la Plataforma</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="IdDivDirJur" class="mt-2 d-none">
        <input value="Div/Jur" />
    </div>
</body>


<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    //Evaluar();
    window.addEventListener('resize', function(event) {
        // do stuff here
        Evaluar();
    });
});

function Evaluar(event) {
    //var card = document.getElementById("idCard");
    // console.log(card.clientHeight);
    //localStorage.setItem("evaluar", card.clientHeight);
    //  console.log(card.clientHeight);
    window.parent.ReloadsFrames("non-reaload");
    //var elmnt = document.getElementById("idHeader");
    // card.scrollIntoView();
}
</script>

</html>