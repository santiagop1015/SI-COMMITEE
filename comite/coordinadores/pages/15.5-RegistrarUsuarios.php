<!DOCTYPE html>
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too

session_start();
if(@!$_SESSION['user']) {
    header("Location: ../../../index.html");
}

date_default_timezone_set('America/Bogota');
$pr = $_SESSION['id'];
extract($_GET);
require("../../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);

while ($arreglo = mysqli_fetch_array($query)) {
  //  utf8_decode($programa='Sistemas'); actualizacion #2
  utf8_decode($programa=$arreglo[11]);


    $coordir=$arreglo[4];
    $passd=$arreglo[8];
    
    if ($arreglo[2] != 'Coordinador') {
        require("../../desconectar.php");
        header("Location:../../../index.html");
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Registrar Usuarios</title>
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

<body id="idCard" style="background-color: #f4f6f9;" onresize="Height();">

    <!-- Start Content-wrapper -->

    <section class="content">
        <div class="card card-default">
            <div class="card-header" style="background-color:#B42A2A;color: white;">
                <h3 class="card-title">
                    <button id="idOnBack" type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                            onclick="history.back();"></i></button>
                </h3>
            </div>
            <div class="card-body">
                <?php $fecha=date("Y-m-d");?>
                <form id="FormRegistrar" autocomplete="off">
                    <div class="row">
                        <div class="col-12">
                            <label>Tipo de Usuario: (Seleccionar primero)</label>
                            <select id="TipoUsuario" class="form-control" name="tipousuario" required>
                                <?php
                            $sql=("SELECT distinct TipoUsuario FROM usuarios ORDER BY id DESC");
                            $query=mysqli_query($mysqli,$sql);
                            while($arreglo=mysqli_fetch_array($query)){
                          // echo '<option>'.$arreglo[0].'</option>';
                          if($arreglo[0] == "Estudiante" || $arreglo[0] == "Director") {
                           echo '<option value="'.$arreglo[0].'"';
                           if($tipousuario == $arreglo[0]){
                               echo 'selected';
                           }
                           echo '>'.$arreglo[0].'</option>';
                          }
                       }
                            ?>
                                <!--<option value="Estudiante">Estudiante</option>
                                <option value="Director">Profesor</option>-->
                            </select>
                            <script>
                            const selectUser = document.querySelector('#TipoUsuario');
                            selectUser.addEventListener('change', (event) => {

                                var selectItem = event.target.value;
                                var LineaInvestigacion = document.getElementById("DivLineaInves");
                                if (selectItem == "Director") {
                                    //  LineaInvestigacion.classList.add("disabled");
                                    //  LineaInvestigacion.disabled = true;
                                    //   location.replace("15.5-RegistrarUsuarios.php?tipousuario=Director");
                                    $('#DivLineaInves').attr("disabled", false);
                                } else {
                                    // location.replace("15.5-RegistrarUsuarios.php?tipousuario="+selectItem);
                                    $('#DivLineaInves').attr("disabled", true);
                                    //$("#DivLineaInves").val($("#DivLineaInves option:first").val());
                                    $("#DivLineaInves option[value='0']").attr("selected",true);
                                }

                            });
                            </script>

                        </div>
                        <div class="col-6">
                            <label>Nombres y Apellidos: </label>
                            <input type="text" class="form-control" name="user" class="Nombre"
                                placeholder="Nombres y Apellidos" required>
                        </div>

                        <div class="col-6">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" class="Usuario"
                                placeholder="Email @unilibre.edu.co" required>
                        </div>

                        <div class="col-6">
                            <label>Contraseña</label>
                            <input type="number" class="form-control" name="password" class="Contraseña"
                                placeholder="Contraseña/Cedula" required>
                        </div>

                        <div class="col-6">
                            <label>Teléfono</label>
                            <input type="number" class="form-control" name="telefono" class="telefono"
                                placeholder="Telefono">
                        </div>

                        <div class="col-6">
                            <label>Programa: </label>
                            <select class="form-control" name="programa" required>
                            <?php
                            $sql=("SELECT distinct programa FROM programas ORDER BY id ASC");
                            $query=mysqli_query($mysqli,$sql);
                            while($arreglo=mysqli_fetch_array($query)){
                             //   echo '<option value="'.$arreglo[0].'">'.$arreglo[0].'</option>';
                          // echo '<option>'.$arreglo[0].'</option>';
                        //  if($arreglo[0] != "Administrador") {
                         /*   if($programa == 'Sistemas' || $programa == 'Industrial') {

                                if($arreglo[0] == "Sistemas" || $arreglo[0] == "Industrial") {
                                echo '<option value="'.$arreglo[0].'"';
                                if($programa == $arreglo[0]){
                                    echo 'selected';
                                }
                                echo '>'.$arreglo[0].'</option>';
                            }

                            } else {*/

                                if($arreglo[0] == $programa) {
                                echo '<option value="'.$arreglo[0].'"';
                                 if($programa == $arreglo[0]){
                                   echo 'selected';
                                   }
                                echo '>'.$arreglo[0].'</option>';
                                }

                           // } 
                           
                           }
                            
                            ?>
                            </select>
                        </div>

                        <div class="col-6">
                            <label>Fecha Nacimiento</label>
                            <input type="date" class="form-control" name="fechadenacimiento" id="fechadenacimiento"
                                placeholder="Fec_nacimiento">
                        </div>

                        <div class="col-12">
                            <label>Linea de Investigación: </label>
                            <?php if($tipousuario == "Director") {   ?>
                            <select id="DivLineaInves" class="form-control" name="area" required>
                                <?php
                                } else {
                                ?>
                                <select id="DivLineaInves" class="form-control" name="area" disabled required>
                                    <?php
                                }  
                                ?>
                                        <option value="0">No Aplica</option>
                                        <?php
                                    $query = $mysqli -> query ("SELECT * FROM area_inves ORDER BY  id_area ASC ");
                                    while ($valores = mysqli_fetch_array($query)) {
                                    if($nombre_area==''){ $nombre_area=0;}
                                    echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                    } 
                                ?>
                                    </select>
                        </div>

                        <div class="col-12">
                            <div class="callout callout-danger mt-3">
                                <h5>Atención!</h5>
                                <p>Tenga en cuenta que es posible que el mensaje llegue a su bandeja de Spam</p>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer mt-2">

                        <button type="submit" id="idRegistrar" value=""
                            class="btn btn-primary float-right mr-2">Registrar</button>

                        <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- End Content-wrapper -->
</body>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    //Height();
    onSubmitRegistrar();
});

function Height(event) {
    //var card = document.getElementById("idCard");
    //localStorage.setItem("height", card.clientHeight);
    window.parent.ReloadsFrames("non-reaload");
}

var onSubmitRegistrar = function() {
    $('#FormRegistrar').on("submit", function(e) {
        e.preventDefault();
        $('#idRegistrar').attr("disabled", true);

        document.getElementById("idSpinner").style.display = "block";

        var other_data = $("#FormRegistrar").serializeArray();
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
            url: "15.5.1-ejec_registrar_usuario.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "Registrar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "El usuario ha sido registrado con éxito!");
                $('#idRegistrar').attr("disabled", true);
            } else if (info === "0") {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Registrar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, el Usuario no fue registrado");
                $('#idRegistrar').attr("disabled", false);
            } else if (info === "2") {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Registrar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Atencion, ya existe un usuario con estos caracteres, verifique sus datos");
                $('#idRegistrar').attr("disabled", false);
            } else if (info === "3") {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Registrar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Las contraseñas son incorrectas");
                $('#idRegistrar').attr("disabled", false);
            }
            setTimeout(() => {
                localStorage.setItem("Mensaje2", null);
            }, 500);

            setTimeout(() => {
                document.getElementById("idSpinner").style.display = "none";
            }, 1000);
        });
    })
}
</script>


</html>