<!DOCTYPE html>
<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../Login/index.html");
}
$usuario=$_SESSION['user'];
?>


<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Eliminar Documento</title>
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

<body>

    <div id="idCardBorrar" class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Borrado de Documentos</h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>
        <?php
		extract($_GET);
		require("../../connect_db.php");
		$sql="SELECT * FROM tesis WHERE ID_tesis=$id";
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
		    	$ID_tesis=$row[0];
		    	$ID_estudiante=$row[1];
				$ID_estudiante1=$row[15];
		    	$proyecto=$row[2];
		    	utf8_decode($titulo_tesis=$row[3]);
		    	$aprob_dir=$row[4];
		    	utf8_decode($ID_directores=$row[5]);
		    	utf8_decode($ID_estado=$row[6]);
                utf8_decode($observaciones=$row[7]);
		    	$archivo=$row[8];
		    	$fecha_propuesta=$row[9];
		    	$fecha_aprob_propuesta=$row[10];
                $fecha_ent_anteproyecto=$row[11];
				$programa=$row[12];
				utf8_decode($jurado1=$row[13]);
				utf8_decode($jurado2=$row[14]);
				$id_area=$row[16];
				$id_eje=$row[17];
				$id_estudiante2=$row[18];
				$terminado=$row[19];
				$nota=$row[20];
				
                    }

		?>
        <?php
		require("../../connect_db.php");
        $query = $mysqli -> query ("SELECT * FROM area_inves where id_area='$id_area' ");
        while ($valores = mysqli_fetch_array($query)) {                         
			utf8_decode($nombre_area=$valores[1]);
        } 
        ?>
        <?php
		require("../../connect_db.php");
        $query = $mysqli -> query ("SELECT * FROM ejes_tem where  id_eje='$id_eje'");
        while ($valores = mysqli_fetch_array($query)) {
		    utf8_decode($nombre_eje=$valores[1]);
        } 
        ?>

        <div class="card-body">
            <div class="alert alert-warning">
                Está seguro que quiere <strong>borrar</strong> el documento con la siguiente información?
            </div>
            <form id="idFormBorrarEval" autocomplete="off">
                <!-- action=" echo htmlspecialchars($_SERVER['PHP_SELF']) "
                method="post" -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Id.</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $id?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Id Estudiante</label>
                            <input type="text" class="form-control" name="ID_estudiante"
                                value="<?php echo $ID_estudiante?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Id Estudiante 2:</label>
                            <input type="text" class="form-control" name="ID_estudiante1"
                                value="<?php echo $ID_estudiante1?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Id Estudiante 3:</label>
                            <input type="text" class="form-control" name="id_estudiante2"
                                value="<?php echo $id_estudiante2?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Titulo</label>
                            <textarea class="form-control" rows="4" name="titulo_tesis" cols="29"
                                placeholder="Escriba las disposiciones del comité para esta acta..."
                                aria-required="true" readonly="readonly"><?php echo $titulo_tesis?></textarea>
                        </div>
                    </div>
                    <div class=" col-sm-6">
                        <div class="form-group">
                            <label>Director</label>
                            <input type="text" class="form-control" name="ID_directores"
                                value="<?php echo $ID_directores?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Aprobado por el director </label>
                            <input type="text" class="form-control" name="aprob_dir" value="<?php echo $aprob_dir?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jurado 1</label>
                            <input type="text" class="form-control" name="jurado1" value="<?php echo $jurado1?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jurado 2</label>
                            <input type="text" class="form-control" name="jurado2" value="<?php echo $jurado2?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" class="form-control" name="ID_estado" value="<?php echo $ID_estado?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Observaciones</label>
                            <textarea class="form-control" rows="4" name="observaciones" cols="20" aria-required="true"
                                readonly="readonly"><?php echo $observaciones?></textarea>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Línea de Investigación</label>
                            <input type="text" class="form-control" name="id_area"
                                value="<?php echo utf8_decode($id_area)?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ejé temático</label>
                            <input type="text" class="form-control" name="id_eje"
                                value="<?php echo utf8_decode($id_eje)?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="text" name="archivo" class="form-control" value="<?php echo $archivo?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Entrega Propuesta</label>
                            <input type="date" name="fecha_propuesta" class="form-control"
                                value="<?php echo $fecha_propuesta?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Actualización / Aprobación Propuesta</label>
                            <input type="date" name="fecha_aprob_propuesta" class="form-control"
                                value="<?php echo $fecha_aprob_propuesta?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Entrega Anteproyecto</label>
                            <input type="date" name="fecha_ent_anteproyecto" class="form-control"
                                value="<?php echo $fecha_ent_anteproyecto?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Entrega Proyecto</label>
                            <input type="date" name="proyecto" class="form-control" value="<?php echo $proyecto?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Terminado</label>
                            <input type="text" name="terminado" class="form-control" value="<?php echo $terminado?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nota: (Aplica para sustentación proyecto - Monografia)</label>
                            <input type="text" name="nota" class="form-control" value="<?php echo $nota?>"
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            url: "2.2.1-ejec_eli_tesis_coor.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            // console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "Eliminar Documento");
                localStorage.setItem("Mensaje2-Message", "Documento eliminado correctamente");
            } else {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Eliminar Documento");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, no se elimino el documento");
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