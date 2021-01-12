<!DOCTYPE html>



<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../../index.html");
}
$pr=$_SESSION['id'];

//require '2.1.1-ejec_act_tesis_coor.php';

?>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Vobo</title>
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

<body id="idCardAct">

    <div class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                VoBo
            </h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>
        <?php
		extract($_GET);
		require("../../connect_db.php");
		$sql="SELECT * FROM tesis WHERE id_tesis=$id";
		$query=mysqli_query($mysqli,$sql);
		while($row=mysqli_fetch_array($query)){
            $id=$row[0];
            $ID_tesis=$row[0];
            $ID_estudiante=$row[1];
            $proyecto=$row[2];
            $titulo_tesis=$row[3];
            $aprob_dir=$row[4];
            $ID_directores=$row[5];
            $ID_estado=$row[6];
            $observaciones=$row[7];
            //$archivo=$row[8];
            $fecha_propuesta=$row[9];
            $fecha_aprob_propuesta=$row[10];
            $fecha_ent_anteproyecto=$row[11];
            $jurado1=$row[13];
            $jurado2=$row[14];
           }
        ?>

        <div class="card-body">
            <form id="idFormActEval" autocomplete="off">
                <!-- action=" echo htmlspecialchars($_SERVER['PHP_SELF']) "
                method="post" -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Id. del Proyecto:</label>
                            <input type="text" class="form-control" name="id_tesis" value="<?php echo $ID_tesis?>"
                                readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Titulo del proyecto:</label>
                            <textarea class="form-control" rows="4" name="id_proyecto" cols="29"
                                aria-required="true" readonly="readonly"><?php echo $titulo_tesis?></textarea>

                        </div>
                    </div>
        
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Carta de solicitud opción de grado:</label>
                            <input type="HIDDEN" name="carta">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Actas de reuniones del semillero:</label>
                            <input type="HIDDEN" name="actas">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ponencia en la Facultad:</label>
                            <input type="HIDDEN" name="ponencia_fac">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ponencia Nacional:</label>
                            <input type="HIDDEN" name="ponencia_nal">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ponencia Internacional:</label>
                            <input type="HIDDEN" name="ponencia_int">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Presentacion de Artículo:</label>
                            <input type="HIDDEN" name="articulo">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Capitulo de Libro:</label>
                            <input type="HIDDEN" name="cap_libro">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha del VoBo:</label>
                            <input type="HIDDEN" name="fecha">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Certificado del CIFI</label>
                            <input type="HIDDEN" name="certi_CIFI">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cargar archivo del certificado:</label>
                            <input type="HIDDEN" name="archivo" align="center" pattern="\S{10,15}">
                        </div>
                    </div>
                    <input type="HIDDEN" name="act">
                    <input type="HIDDEN" name="oti">
                    

                </div>
                <div class="alert alert-warning">
                Haga click en <strong>Guardar</strong>, para comenzar con el proceso...
                </div>
                <div class="card-footer mt-3">
                    <button type="button" class="btn btn-danger float-right" onclick="history.back();">Volver</button>
                    <button id="idActualEval" type="submit" class="btn btn-primary float-right mr-2">Guardar</button>
                    <!--  -->
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
    //onSendHeight();
    window.addEventListener('resize', function(event) {
        // do stuff here
        onSendHeight();
    });
    onSubmitActualizar();
    localStorage.setItem("Mensaje2", null);
});

function onSendHeight(event) {
    //var card = document.getElementById("idCardAct");
    //console.log(card.clientHeight);
    //localStorage.setItem("evaluar", card.clientHeight);
    window.parent.ReloadsFrames("non-reaload");
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
            url: "1.1.1-validaciondinvestigar.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "VoBo Investigar");
                localStorage.setItem("Mensaje2-Message", "Operacion realizada correctamente");
                $('#idActualEval').attr("disabled", true);
            } else if (info === "2"){
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "VoBo Investigar");
                localStorage.setItem("Mensaje2-Message",
                    "Solo se permiten archivos menores de 5MB");
                $('#idActualEval').attr("disabled", false);
            } else {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "VoBo Investigar");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, no se realizo la operación");
                $('#idActualEval').attr("disabled", false);
            }
            setTimeout(() => {
                localStorage.setItem("Mensaje2", null);
            }, 500);

            setTimeout(() => {
                document.getElementById("idSpinner").style.display = "none";
            }, 1000);
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