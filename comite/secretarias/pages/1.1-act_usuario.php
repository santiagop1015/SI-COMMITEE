<!DOCTYPE html>
<?php
session_start();

if(@!$_SESSION['user']) {
    header("Location: .../../Login/index.html");
}
$id;
$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../../connect_db.php");

$sql=("SELECT * FROM login where id='$id'");
$query=mysqli_query($mysqli,$sql);
while ($row=mysqli_fetch_row ($query)){
$id=$row[0];
$cedula=$row[1];
$tipousuario=$row[2];
$user=$row[3];
$email=$row[4];
$pasadmin=$row[5];
$pasdir=$row[6];
$pasjur=$row[7];
$pascor=$row[8];

if($tipousuario == 'Estudiante')//Asignar pass para Estudiante
{
$pass = $row[9];
}
else if($tipousuario == 'Director')//Asignar pass para director
{
$pass = $pasdir;
}
else if($tipousuario == 'Coordinador')//Asignar pass para Coordinador
{
$pass = $pascor;
}
else if($tipousuario == 'Jurado')//Asignar pass para secreteari@
{
$pass = $pasjur;
}
$telefono=$row[10];
$programa=$row[11];
$fechadenacimiento=$row[12];
$area=$row[13];
}

if($tipousuario=="Jurado"){
$tipousuario="Secretari@";
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Actualizar Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <!-- -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<style>
.white {
    color: white;
}
</style>

<body id="idCard" style="background-color: #f4f6f9;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row md-2">
                <h1 id="Titulo">Usuarios</h1>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-default">
            <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
                <h3 class="card-title">
                    <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                            onclick="history.back();"></i></button>
                    Actualizar Usuario</h3>
                <!-- <div class="card-tools">
            </div> -->
            </div>
            <?php $fecha=date("Y-m-d");?>
            <div class="card-body">
                <form id="idFormActUser" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Id.</label>
                                <input type="text" class="form-control" name="id" value="<?php echo $id?>"
                                    readonly="readonly">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Tipo de Usuario: </label>
                            <select class="form-control" name="tipousuario" value="<?php
                            // TipoUsuario
                            ?>">
                                <option <?php if($tipousuario == "Estudiante") echo 'selected'  ?> value="Estudiante">
                                    Estudiante</option>
                                <option <?php if($tipousuario == "Coordinador") echo 'selected'  ?> value="Coordinador">
                                    Coordinador</option>
                                <option <?php if($tipousuario == "Director") echo 'selected'  ?> value="Director">
                                    Profesor</option>
                                <option <?php if($tipousuario == "Secretari@") echo 'selected'  ?> value="Jurado">
                                    Secretari@</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nombre: </label>
                                <input type="text" class="form-control" name="user" value="<?php echo $user?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Cedula: </label>
                                <input type="number" class="form-control" name="cedula" value="<?php echo $cedula?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Usuario: </label>
                                <input type="text" class="form-control" name="email" value="<?php echo $email?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Password: </label>
                                <input type="text" class="form-control" name="password" value="<?php echo $pass?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Telefono: </label>
                                <input type="number" class="form-control" name="telefono" value="<?php echo $telefono?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Programa: </label>
                                <select class="form-control" name="programa" required>
                                    <option <?php if($programa == "Industrial") echo 'selected'  ?> value="Industrial">
                                        Industrial</option>
                                    <option <?php if($programa == "Sistemas") echo 'selected'  ?> value="Sistemas">
                                        Sistemas</option>
                                    <option <?php if($programa == "Ambiental") echo 'selected'  ?> value="Ambiental">
                                        Ambiental</option>
                                    <option <?php if($programa == "Mecanica") echo 'selected'  ?> value="Mecanica">
                                        Mecanica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Linea de Investigación: </label>
                            <select class="form-control" name="area" required>
                                <?php
									$querya = $mysqli -> query ("SELECT * FROM area_inves where  id_area = '$area'  and programa='$programa' limit 1");
									while ($valoresa = mysqli_fetch_array($querya)) {
									if($nombre_area==''){ $nombre_area=0;}
									echo '<option value="'.$valoresa[id_area].'">'.$valoresa[id_area].': '.$valoresa[nombre_area].'</option>';
                                    } 
                                ?>
                                <option value="0">No Aplica</option>
                                <?php
									$query = $mysqli -> query ("SELECT * FROM area_inves where  id_area <> '$area'  ORDER BY  id_area ASC ");
									while ($valores = mysqli_fetch_array($query)) {
									if($nombre_area==''){ $nombre_area=0;}
									echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                    } 
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Fecha de Nacimiento: </label>
                                <input type="date" class="form-control" name="fechadenacimiento" value="<?php 
                                    echo $fechadenacimiento
                                    ?>" <?php if($fechadenacimiento !== "0000-00-00") echo 'required' ?>>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer mt-3">
                        
                        <button id="idActualUser" type="submit"
                            class="btn btn-primary float-right mr-2">Actualizar</button>

                        <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </section>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    Height();
    onSubmitActualizar();
    localStorage.setItem("Mensaje", null);
});

function Height(event) {
    var card = document.getElementById("idCard");
    localStorage.setItem("height", card.clientHeight);
}

function onSubmitActualizar() {
    $("#idFormActUser").on("submit", function(e) {
        e.preventDefault();
        $('#idActualUser').attr("disabled", true);

        document.getElementById("idSpinner").style.display = "block";
        var other_data = $("#idFormActUser").serializeArray();
        var paqueteDeDatos = new FormData();

        $.each(other_data, function(key, input) {
            paqueteDeDatos.append(input.name, input.value);
        });

        // console.log(other_data);

        $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: "1.1.1-ejec_act_usuario.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            //console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje", 1);
                localStorage.setItem("Mensaje-Title", "Actualizar Usuario");
                localStorage.setItem("Mensaje-Message", "El Usuario fue actualizado con éxito!");
            } else {
                localStorage.setItem("Mensaje", 0);
                localStorage.setItem("Mensaje-Title", "Actualizar Usuario");
                localStorage.setItem("Mensaje-Message",
                    "Error en el procesamiento, el Usuario no fue actualizado");
            }
            setTimeout(() => {
                document.getElementById("idSpinner").style.display = "none";
            }, 1000);

        });
    });
}
</script>

</html>