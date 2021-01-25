<!DOCTYPE html>



<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../../index.html");
}

?>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Dinvestigar</title>
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
                Actualizar VoBo - Información del Proyecto
            </h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>
        <?php
        $id='';
        $id_tesis='';
        $carta='';
        $id_proyecto='';
        $actas='';
        $certi_CIFI='';
        $ponencia_fac='';
        $ponencia_nal='';
        $ponencia_int='';
        $articulo='';
        $cap_libr='';
        $fecha='';
        $act=0;
        $oti='';

		extract($_GET);
		require("../../connect_db.php");
		$sql="SELECT * FROM cifi WHERE id_tesis=$ide";
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$id_tesis=$row[1];
		    	$carta=$row[2];
		    	$id_proyecto=$row[3];
		    	$actas=$row[4];
		    	$certi_CIFI=$row[5];
		    	$ponencia_fac=$row[6];
                $ponencia_nal=$row[7];
		    	$ponencia_int=$row[8];
		    	$articulo=$row[9];
		    	$cap_libro=$row[10];
                $fecha=$row[11];
				$act=$row[12];
				$oti=$row[13];
                    }
                    //ojo
        ?>
        <div class="card-body">
            <form id="idFormActEval" autocomplete="off">
                <!-- action=" echo htmlspecialchars($_SERVER['PHP_SELF']) "
                method="post" -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Id:</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $id;?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Id. del Proyecto:</label>
                            <input type="text" class="form-control" name="id_tesis" value="<?php echo $ide;?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Titulo del Proyecto:</label>
                            <textarea class="form-control" rows="4" name="id_proyecto" cols="29"
                                aria-required="true"><?php echo $Titulo_tesis;?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Carta de solicitud opción de grado:</label>
                            <input class="form-control" type="text" name="carta" value="<?php echo $carta;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Actas de reuniones del semillero:</label>
                            <input class="form-control" type="text" name="actas" value="<?php echo $actas;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ponencia en la Facultad:</label>
                            <input class="form-control" type="text" name="ponencia_fac"
                                value="<?php echo $ponencia_fac;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ponencia Nacional:</label>
                            <input class="form-control" type="text" name="ponencia_nal"
                                value="<?php echo $ponencia_nal;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ponencia Internacional:</label>
                            <input class="form-control" type="text" name="ponencia_int"
                                value="<?php echo $ponencia_int;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Presentacion de Artículo:</label>
                            <input class="form-control" type="text" name="articulo" value="<?php echo $articulo;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Capitulo de Libro:</label>
                            <input class="form-control" type="text" name="cap_libro" value="<?php echo $cap_libr;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha del VoBo:</label>
                            <input class="form-control" type="text" name="fecha" value="<?php echo $fecha;?>">
                        </div>
                    </div>
                    <?php if($certi_CIFI=="NO" || $certi_CIFI=="") {  ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Certificado del CIFI</label>
                            <select class="form-control" type="text" name="certi_CIFI">
                                <option value="<?php echo $certi_CIFI?>"><?php echo $certi_CIFI?></option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cargar archivo del certificado:</label>
                            <input id="archivo" type="file" name="archivo" accept=".pdf" required>
                        </div>
                    </div>
                    <?php 
                        } else {
                    ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Certificado del CIFI</label>
                            <input class="form-control" type="text" name="certi_CIFI" value="<?php echo $certi_CIFI?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Archivo del certificado:</label>
                            <a href="./cifi/<?php echo $id_tesis?>.pdf"><?php echo $id_tesis?>.pdf</a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <input type="HIDDEN" name="act" value="<?php echo $act?>">
                    <input type="HIDDEN" name="oti" value="<?php echo $oti?>">

                </div>
                <!-- Div Alertas -->
                <div id="idBoxAlert" class="alert alert-danger alert-dismissible" style="Display: None;">
                    <h5>
                        <i id="idIConBox" class="icon fas fa-ban"></i>
                        Alerta
                    </h5>
                    <p id="idMessageRegistrarDoc"></p>
                </div>
                <!-- /Div Alertas -->
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
    //getWidth();
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
        //alert("eprevent");
        //$('#idActualEval').attr("disabled", true);
        //$("#idSpinner").css("display") = 'Block';
        //document.getElementById("idSpinner").display = "Block";
        //document.getElementById("idSpinner").style.display = "block";
        //alert('evento submit');

        // ejec_act_tesis_coor

        var other_data = $("#idFormActEval").serializeArray();
        var paqueteDeDatos = new FormData();

        $.each(other_data, function(key, input) {
            paqueteDeDatos.append(input.name, input.value);
        });

        //console.log(other_data);
        //console.log(paqueteDeDatos);

        if (document.querySelectorAll("input#archivo").length !== 0) {

            //-------Archivo
            var file = $("#archivo").prop("files")[0];
            var pharaf = document.getElementById("idMessageRegistrarDoc");
            var cardMessages = document.getElementById("idBoxAlert");
            var iconBox = document.getElementById("idIConBox");

            if (file !== undefined) {
                var validationArchive = fileValidation();
                if (validationArchive === 1) {
                    if (file.size <= 5000000) {
                        cardMessages.style.display = "None";
                        paqueteDeDatos.append("archivo", file);
                        onSendHeight();
                        //alert("enviar datos");
                        EnviarDatos();
                    } else {
                        pharaf.innerHTML = "Solo se permiten archivos menores de 5MB";
                        cardMessages.className = "alert alert-danger alert-dismissible";
                        iconBox.className = "icon fas fa-ban";
                        cardMessages.style.display = "Block";
                        onSendHeight();
                        $('#idActualEval').attr("disabled", false);
                        localStorage.setItem("Mensaje2", null);
                    }
                } else {
                    pharaf.innerHTML = "Suba un archivo pdf o word";
                    cardMessages.className = "alert alert-danger alert-dismissible";
                    iconBox.className = "icon fas fa-ban";
                    cardMessages.style.display = "Block";
                    onSendHeight();
                    $('#idActualEval').attr("disabled", false);
                    localStorage.setItem("Mensaje2", null);
                }
            }
            //-------Fin req archivo

        }

        function EnviarDatos() {
            document.getElementById("idSpinner").style.display = "block";
            $.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                cache: false,
                url: "1.2.1-ejec_act_tesis_dinvestigar.php",
                data: paqueteDeDatos,
            }).done(function(info) {
                //console.log(info);
                if (info === "1") {
                    localStorage.setItem("Mensaje2", 1);
                    localStorage.setItem("Mensaje2-Title", "Dar VoBo");
                    localStorage.setItem("Mensaje2-Message", "Edición terminada");
                    $('#idActualEval').attr("disabled", true);
                } else {
                    localStorage.setItem("Mensaje2", 0);
                    localStorage.setItem("Mensaje2-Title", "Dar VoBo");
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

        }

    });
}

function fileValidation() {
    var fileInput = document.getElementById("archivo");
    var filePath = fileInput.value,
        exit;
    var allowedExtensions = /(.pdf|.docx)$/i;

    if (!allowedExtensions.exec(filePath)) {
        exit = 0;
    } else {
        exit = 1;

        //console.log(filePath);
    }
    returnn = exit;
    return returnn;
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