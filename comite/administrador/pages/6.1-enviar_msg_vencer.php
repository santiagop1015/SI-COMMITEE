<!DOCTYPE html>
<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../Login/index.html");
}

$usuario=$_SESSION['user'];
extract($_GET);

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Enviar Mensaje</title>
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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- -->



</head>
<style>
.white {
    color: white;
}
</style>

<body onload="getWidth();">

    <div id="idCardAct" class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Enviar Mensaje a Usuario</h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>
        <?php
		require("../../connect_db.php");
        $sql=("SELECT * FROM login where id=$ID_estudiante");
        $query=mysqli_query($mysqli,$sql);
        while($arreglo=mysqli_fetch_array($query)){
            $Correo=$arreglo[4];
            $estu=$arreglo[3];
        }
        ?>

        <div class="card-body">
            <form id="idFormActEval" autocomplete="off">
                <!-- action=" echo htmlspecialchars($_SERVER['PHP_SELF']) "
                method="post" -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>De: </label>
                            <input type="text" class="form-control" name="Nombre"
                                value="<?php echo 'Comité proyectos '.$programa;?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Para:</label>
                            <input type="text" class="form-control" name="Correo" value="<?php echo $Correo?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Disposicíones</label>
                            <textarea class="form-control" rows="4" name="Mensaje" cols="29"
                                aria-required="true">Notificación para <?php echo $estu;?></textarea>
                        </div>
                        <div class="alert alert-warning" style="padding-left: 10px;">
                            <strong>Señor coordinador </strong> este mensaje es una notificacion de recordatorio de
                            vencimiento del documento registrado, por parte del estudiante en mención. <br> Haga clic en
                            Enviar para hacer efectiva la notificación...
                        </div>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="button" class="btn btn-danger float-right" onclick="history.back();">Volver</button>
                    <button id="idActualEval" type="submit" class="btn btn-primary float-right mr-2">Enviar</button>
                    <!--  -->
                    <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </form>
        </div>


    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    onSendHeight();
    onSubmitActualizar();
    localStorage.setItem("Mensaje2", null);
});

function onSendHeight(event) {
    var card = document.getElementById("idCardAct");
    //console.log(card.clientHeight);
    localStorage.setItem("evaluar", card.clientHeight);
}

var onSubmitActualizar = function() {
    $("#idFormActEval").on("submit", function(e) {
        e.preventDefault();
        $('#idActualEval').attr("disabled", true);
        //$("#idSpinner").css("display") = 'Block';
        //document.getElementById("idSpinner").display = "Block";
        document.getElementById("idSpinner").style.display = "block";
        //alert('evento submit');

        // ejec_act_tesis_coor

        var other_data = $("#idFormActEval").serializeArray();
        var paqueteDeDatos = new FormData();

        $.each(other_data, function(key, input) {
            paqueteDeDatos.append(input.name, input.value);
        });

        //console.log(other_data);
        //console.log(paqueteDeDatos);

        $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: "6.1.1-enviarmsgusuvencer.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "Enviar Mensaje a Usuario");
                localStorage.setItem("Mensaje2-Message", "Mensaje enviado correctamente");
            } else {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Enviar Mensaje a Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, el mensaje no fue enviado");
            }
            document.getElementById("idSpinner").style.display = "none";
        });


        /*

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
                                    


        */




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