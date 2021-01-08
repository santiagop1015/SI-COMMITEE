<!DOCTYPE html>
<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../Login/index.html");
}

$usuario=$_SESSION['user'];
extract($_GET);
?>


<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Enviar mensaje</title>
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
    <link href="../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <!-- -->
</head>
<style>
.white {
    color: white;
}
</style>

<body style="background-color: #f4f6f9;" id="idCardBorrar">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row md-2">
                <h1>Usuarios</h1>
            </div>
        </div>
    </section>

    <div class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Enviar Mensaje a Usuario</h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>

        <div class="card-body">
            <?php $fecha=date("Y-m-d");?>
            <form id="idFormBorrarEval" autocomplete="off">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>De:</label>
                            <input type="text" class="form-control" name="user"
                                value="<?php echo 'Comité proyectos '. $usuario; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Programa: </label>
                            <input type="text" class="form-control" name="programa" value="<?php echo $programa?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Mensaje: </label>
                            <textarea required class="form-control" rows="4" cols="50" id="comen" name="comen"
                                placeholder="Mensaje"></textarea>
                        </div>
                    </div>
                </div>


                <div class="card-footer mt-3">
                    
                    <button id="idActualEval" type="submit" class="btn btn-primary float-right mr-2">Enviar</button>

                    <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </form>
        </div>


    </div>
</body>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="../LocalSources/ajax/jquery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    onSendHeight();
    onSubmitActualizar();
    localStorage.setItem("Mensaje", null);
});

function onSendHeight(event) {
    var card = document.getElementById("idCardBorrar");
    //console.log(card.clientHeight);
    localStorage.setItem("height", card.clientHeight);
}

var onSubmitActualizar = function() {
    $("#idFormBorrarEval").on("submit", function(e) {
        e.preventDefault();
        $('#idActualEval').attr("disabled", true);

        document.getElementById("idSpinner").style.display = "block";
        //alert('evento submit');

        // ejec_act_tesis_coor

        var other_data = $("#idFormBorrarEval").serializeArray();
        var paqueteDeDatos = new FormData();

        $.each(other_data, function(key, input) {
            paqueteDeDatos.append(input.name, input.value);
        });

        //console.log(other_data);
        $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: "1.2.1-enviar_msg_jur.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            //console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje", 1);
                localStorage.setItem("Mensaje-Title", "Enviar Mensaje a Usuario");
                localStorage.setItem("Mensaje-Message",
                    "El mensaje ha sido enviado con éxito!");
            } else {
                localStorage.setItem("Mensaje", 0);
                localStorage.setItem("Mensaje-Title", "Enviar Mensaje a Usuario");
                localStorage.setItem("Mensaje-Message",
                    "Error en el procesamiento, el Mensaje no fue enviado");
            }
            document.getElementById("idSpinner").style.display = "none";
        });

    });
}
</script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>




</html>