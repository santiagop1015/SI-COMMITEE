<!DOCTYPE html>
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too

session_start();
if(@!$_SESSION['user']) {
    header("Location: .../../../index.html");
}

date_default_timezone_set('America/Bogota');
$pr = $_SESSION['id'];
$tipousuario = 'Estudiante';
extract($_GET);
require("../../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);

while ($arreglo = mysqli_fetch_array($query)) {
  //  utf8_decode($programa='Sistemas'); actualizacion #2
  utf8_decode($programa=$arreglo[11]);


    $coordir=$arreglo[4];
    $passd=$arreglo[8];
    
    if ($arreglo[2] != 'Jurado') {
        require("../../desconectar.php");
        header("Location:../../../index.html");
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Secretaria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../LocalSources/css/ionicons.min.css">

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
    <link href="../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <script src="../LocalSources/ajax/jquery/2.0.3/jquery.min.js"></script>

</head>
<style>
.white {
    color: white;
}
</style>

<body id="idCard" style="background-color: #f4f6f9;" onresize="Height();">

    <!-- Start Content-wrapper -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row md-2">
                <h1 id="Titulo">Registrar Usuario</h1>
            </div>
        </div>
    </section>

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
                            <label>Tipo de Usuario: </label>
                            <select id="TipoUsuario" class="form-control" name="tipousuario" required>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Director">Profesor</option>
                            </select>
                            <script>
                            const selectUser = document.querySelector('#TipoUsuario');
                            selectUser.addEventListener('change', (event) => {

                                var selectItem = event.target.value;
                                var LineaInvestigacion = document.getElementById("DivLineaInves");
                                if (selectItem == "Director") {
                                    //  LineaInvestigacion.classList.remove("disabled");
                                    LineaInvestigacion.disabled = false;
                                } else if (selectItem == "Estudiante") {
                                    //  LineaInvestigacion.classList.add("disabled");
                                    LineaInvestigacion.disabled = true;
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
                            <input type="text" class="form-control" name="email" class="Usuario"
                                placeholder="Email @unilibre.edu.co" required>
                        </div>

                        <div class="col-6">
                            <label>Contraseña</label>
                            <input type="text" class="form-control" name="password" class="Contraseña"
                                placeholder="Contraseña/Cedula" required>
                        </div>

                        <div class="col-6">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="telefono" class="telefono"
                                placeholder="Telefono" required>
                        </div>

                        <div class="col-6">
                            <label>Programa: </label>
                            <select class="form-control" name="programa" required>
                                <?php
                                    if($programa=='Sistemas'){
                                ?>

                                <option value="Industrial">Industrial</option>
                                <option value="Sistemas">Sistemas</option>

                                <?php
                                } else if($programa=='Ambiental'){
                                ?>

                                <option value="Ambiental">Ambiental</option>

                                <?php
                                } else if($programa=='Mecanica'){
                                ?>

                                <option value="Mecanica">Mecanica</option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="col-6">
                            <label>Fecha Nacimiento</label>
                            <input type="date" class="form-control" name="fechadenacimiento" id="fechadenacimiento"
                                placeholder="Fec_nacimiento" required>
                        </div>

                        <div class="col-12">
                            <label>Linea de Investigación: </label>
                            <select id="DivLineaInves" class="form-control" name="area" required disabled>
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


                    </div>
                    <div class="card-footer mt-2">
                        
                        <button type="submit" id="idRegistrar" value="" class="btn btn-primary float-right mr-2"
                            >Registrar</button>

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
<script src="../LocalSources/ajax/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    Height();
    onSubmitRegistrar();
});

function Height(event) {
    var card = document.getElementById("idCard");
    localStorage.setItem("height", card.clientHeight);
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
            url: "6.1-ejec_registrar_usuario.php",
            data: paqueteDeDatos,
        }).done(function(info) {
          //  console.log(info);
              if (info === "1") {
                  localStorage.setItem("Mensaje", 1);
                  localStorage.setItem("Mensaje-Title", "Registrar Usuario");
                  localStorage.setItem("Mensaje-Message",
                      "El usuario ha sido registrado con éxito!");
              } else if(info === "0"){
                  localStorage.setItem("Mensaje", 0);
                  localStorage.setItem("Mensaje-Title", "Registrar Usuario");
                  localStorage.setItem("Mensaje-Message",
                  "Error en el procesamiento, el Usuario no fue registrado");
                  $('#idRegistrar').attr("disabled", false);
              } else if(info === "2") {
                  localStorage.setItem("Mensaje", 0);
                  localStorage.setItem("Mensaje-Title", "Registrar Usuario");
                  localStorage.setItem("Mensaje-Message",
                  "Atencion, ya existe un usuario con estos caracteres, verifique sus datos");
                  $('#idRegistrar').attr("disabled", false);
              } else if(info === "3") {
                  localStorage.setItem("Mensaje", 0);
                  localStorage.setItem("Mensaje-Title", "Registrar Usuario");
                  localStorage.setItem("Mensaje-Message",
                  "Las contraseñas son incorrectas");
                  $('#idRegistrar').attr("disabled", false);
              }
              setTimeout(() => {
                localStorage.setItem("Mensaje", null);
              }, 500);
              
              setTimeout(() => {
                document.getElementById("idSpinner").style.display = "none";
            }, 1000);
        });
    })
}
</script>


</html>