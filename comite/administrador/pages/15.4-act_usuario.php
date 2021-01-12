<!DOCTYPE html>
<?php
session_start();

if(@!$_SESSION['user']) {
    header("Location: .../../../index.html");
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

if($tipousuario == 'Administrador')//Asignar pass para director
{
$pass = $row[5];
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
else if($tipousuario == 'Secretaria') {
    $pass = $row[9];
} else {
$pass = $row[9];
}
$telefono=$row[10];
$programa=$row[11];
$fechadenacimiento=$row[12];
$area=$row[13];
}

/*if($tipousuario=="Jurado"){
$tipousuario="Secretari@";
}*/
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Actualizar Usuario</title>
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
    <!-- -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">

</head>
<style>
.white {
    color: white;
}
</style>

<body id="idCard" style="background-color: #f4f6f9;">

    <div class="card card-default">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Actualizar Usuario
            </h3>
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
                        <select id="TipoUsuario" class="form-control" name="tipousuario" value="<?php
                            // TipoUsuario
                            ?>">
                            <?php
                            $sql=("SELECT distinct TipoUsuario FROM usuarios ORDER BY id DESC");
                            $query=mysqli_query($mysqli,$sql);
                            while($arreglo=mysqli_fetch_array($query)){
                          // echo '<option>'.$arreglo[0].'</option>';
                        //  if($arreglo[0] != "Administrador") {
                           echo '<option value="'.$arreglo[0].'"';
                           if($tipousuario == $arreglo[0]){
                               echo 'selected';
                           }
                           echo '>'.$arreglo[0].'</option>';
                        //  }
                       }
                            ?>
                            <!--  <option <?php //if($tipousuario == "Estudiante") echo 'selected'  ?> value="Estudiante">
                                    Estudiante</option>
                                <option <?php //if($tipousuario == "Coordinador") echo 'selected'  ?> value="Coordinador">
                                    Coordinador</option>
                                <option <?php //if($tipousuario == "Director") echo 'selected'  ?> value="Director">
                                    Profesor</option>
                                <option <?php //if($tipousuario == "Secretari@") echo 'selected'  ?> value="Jurado">
                                    Secretari@</option> -->
                        </select>
                        <script>
                            const selectUser = document.querySelector('#TipoUsuario');
                            selectUser.addEventListener('change', (event) => {

                                var selectItem = event.target.value;
                                var LineaInvestigacion = document.getElementById("DivLineaInves");
                                
                                if (selectItem == "Director") {
                                    //  LineaInvestigacion.classList.add("disabled");
                                    //  LineaInvestigacion.disabled = true;
                                   // location.replace("15.4-RegistrarUsuarios.php?tipousuario=Director");
                                   $('#IdArea').attr("disabled", false);
                                } else {
                                   // location.replace("<?php //echo basename($_SERVER['REQUEST_URI']);?>?tipousuario="+selectItem);
                                   $('#IdArea').attr("disabled", true);
                                 //  $("#IdArea").val($("#IdArea option:first").val());
                                 $("#IdArea option[value='0']").attr("selected",true);
                                } 
                                
                            });
                            </script>
                            <?php //echo 'console.log("'.$_SERVER[‘DOCUMENT_ROOT’].'");';
                                  // echo basename($_SERVER['PHP_SELF']);
                                  //echo basename($_SERVER['REQUEST_URI']);
                                 // REQUEST_URI ?>
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
                            <input type="email" class="form-control" name="email" value="<?php echo $email?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Password: </label>
                            <input type="text" class="form-control" name="password" value="<?php echo $pass?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Telefono: </label>
                            <input type="number" class="form-control" name="telefono" value="<?php echo $telefono?>"
                                >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Programa: </label>
                            <select class="form-control" name="programa" required>
                            <?php
                            $sql=("SELECT distinct programa FROM programas ORDER BY id ASC");
                            $query=mysqli_query($mysqli,$sql);
                            while($arreglo=mysqli_fetch_array($query)){
                             //   echo '<option value="'.$arreglo[0].'">'.$arreglo[0].'</option>';
                          // echo '<option>'.$arreglo[0].'</option>';
                        //  if($arreglo[0] != "Administrador") {
                           echo '<option value="'.$arreglo[0].'"';
                           if($programa == $arreglo[0]){
                               echo 'selected';
                           }
                           echo '>'.$arreglo[0].'</option>';
                           
                        //  }
                       }
                            ?>
                                <!--<option <?php //if($programa == "Industrial") echo 'selected'  ?> value="Industrial">
                                    Industrial</option>
                                <option <?php //if($programa == "Sistemas") echo 'selected'  ?> value="Sistemas">
                                    Sistemas</option>
                                <option <?php //if($programa == "Ambiental") echo 'selected'  ?> value="Ambiental">
                                    Ambiental</option>
                                <option <?php //if($programa == "Mecanica") echo 'selected'  ?> value="Mecanica">
                                    Mecanica</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Linea de Investigación: </label>
                        <?php if($tipousuario == "Director") {   ?>
                            <select id="IdArea" class="form-control" name="area" required>
                        <?php
                        } else {
                        ?>
                        <select id="IdArea" class="form-control" name="area" disabled required>
                        <?php
                        }
                        ?>
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

                    <button id="idActualUser" type="submit" class="btn btn-primary float-right mr-2">Actualizar</button>

                    <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </form>

        </div>

    </div>

</body>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    //Height();
    onSubmitActualizar();
    localStorage.setItem("Mensaje2", null);
});

function Height(event) {
    //var card = document.getElementById("idCard");
    //localStorage.setItem("height", card.clientHeight);
    window.parent.ReloadsFrames("non-reaload");
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
            url: "15.4.1-ejec_act_usuario.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            //console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "Actualizar Usuario");
                localStorage.setItem("Mensaje2-Message", "El Usuario ha sido actualizado con éxito!");
                $('#idActualUser').attr("disabled", true);
            } else if (info === "0") {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Actualizar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, el Usuario no fue actualizado");
                $('#idActualUser').attr("disabled", false);
            } else if (info === "2") {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Registrar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Atencion, ya existe un usuario con estos caracteres, verifique sus datos");
                $('#idActualUser').attr("disabled", false);
            } else if (info === "3") {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Registrar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Las contraseñas son incorrectas");
                $('#idActualUser').attr("disabled", false);
            }
            setTimeout(() => {
                localStorage.setItem("Mensaje2", null);
            }, 500);
            setTimeout(() => {
                document.getElementById("idSpinner").style.display = "none";
            }, 1000);

        });
    });
}
</script>

</html>