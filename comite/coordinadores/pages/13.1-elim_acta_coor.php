<!DOCTYPE html>
<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../../index.html");
}

require("../../connect_db.php");
?>


<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Eliminar Documento</title>
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
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <!-- -->



</head>
<style>
.white {
    color: white;
}
</style>

<body>

    <div id="idCardBorrar" class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Borrado de Acta</h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>
        <?php
		extract($_GET);
		?>
        <div class="card-body">
            <div class="alert alert-warning">
                Está seguro que quiere <strong>borrar</strong> el documento ?
            </div>
            <?php $fecha=date("Y-m-d");?>
            <form id="idFormBorrarEval" autocomplete="off">
                <!-- action=" echo htmlspecialchars($_SERVER['PHP_SELF']) "
                method="post" -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Id.</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $id?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Número: </label>
                            <input type="text" class="form-control" name="numero" value="<?php echo $numero?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Programa:</label>
                            <input type="text" class="form-control" name="programa" value="<?php echo $programa?>"
                                readonly="readonly">
                        </div>
                    </div>

                </div>


                <div class="card-footer mt-3">
                    <button type="button" class="btn btn-danger float-right" onclick="history.back();">Volver</button>
                    <button id="idActualEval" type="submit" class="btn btn-primary float-right mr-2">Borrar</button>

                    <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </form>
        </div>


    </div>
</body>
<script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    onSendHeight();
    onSubmitActualizar();
    localStorage.setItem("Mensaje2", null);
});

function onSendHeight(event) {
    var card = document.getElementById("idCardBorrar");
    //console.log(card.clientHeight);
    localStorage.setItem("evaluar", card.clientHeight);
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
            url: "13.1.1-ejec_eli_acta_coor.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            // console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "Eliminar Acta");
                localStorage.setItem("Mensaje2-Message", "El Acta fue eliminada con éxito!");
            } else {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Eliminar Acta");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, no se elimino el Acta");
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