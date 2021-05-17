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
                Dar VoBo
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
            $ID_tesis=$row[0];
            $ID_estudiante=$row[1];
            $proyecto=$row[2];
            $titulo_tesis=$row[3];
            $aprob_dir=$row[4];
            $ID_directores=$row[5];
            $ID_estado=$row[6];
            $observaciones=$row[7];
            $archivo=$row[8];
            $fecha_propuesta=$row[9];
            $fecha_aprob_propuesta=$row[10];
            $fecha_ent_anteproyecto=$row[11];
            $jurado1=$row[13];
            $jurado2=$row[14];
           }
        ?>

        <div class="card-body">
            <form id="idFormEdit">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" placeholder="id" value="<?php echo $id?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Estudiante</label>
                            <input type="text" name="ID_estudiante" value="<?php echo $ID_estudiante?>"
                                class="form-control" placeholder="Id Estudiante.." readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Usuario</label>
                            <?php 
                            $query = $mysqli -> query ("SELECT * FROM login where id='$ID_estudiante'");
                            while ($valores = mysqli_fetch_array($query))	{
                              $nombre_user=$valores['user'];
                            }
                            ?>
                            <input type="text" name="proyecto" class="form-control" placeholder="Usuario"
                                value="<?php echo $nombre_user; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="titulo_tesis" value="<?php echo $titulo_tesis?>"
                                class="form-control" placeholder="Titulo Tesis..." readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Aprobado por el Director</label>
                            <select name="aprob_dir" class="form-control select2" style="width: 100%;" required>
                            <option value="<?php echo $aprob_dir?>"><?php echo $aprob_dir?></option>
                                <?php if($aprob_dir=="") { ?>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <?php } else if($aprob_dir=="SI") { ?>
                                
                                <option value="NO">NO</option>
                                <?php } else if($aprob_dir=="NO") { ?>
                                
                                <option value="SI">SI</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Director</label>
                            <input type="text" name="ID_directores" value="<?php echo $ID_directores?>"
                                class="form-control" placeholder="Director.." readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="ID_estado" class="form-control" placeholder="Estado.."
                                value="<?php echo $ID_estado?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Observaciones</label>
                            <input type="text" name="observaciones" value="<?php echo $observaciones?>"
                                class="form-control" placeholder="Observaciones.." readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="text" name="archivo" class="form-control" placeholder="Archivo"
                                value="<?php echo $archivo?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Propuesta</label>
                            <input type="text" name="fecha_propuesta" value="<?php echo $fecha_propuesta?>"
                                class="form-control" placeholder="Fecha propuesta.." readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Fecha aprob propuesta</label>
                            <input type="text" name="fecha_aprob_propuesta" class="form-control"
                                placeholder="Fecha aprob propuesta.." value="<?php echo $fecha_aprob_propuesta?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha ent anteproyecto</label>
                            <input type="text" name="fecha_ent_anteproyecto"
                                value="<?php echo $fecha_ent_anteproyecto?>" class="form-control"
                                placeholder="Fecha entrega anteproyecto.." readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Jurado 1</label>
                            <input type="text" name="jurado1" class="form-control" placeholder="No tiene"
                                value="<?php echo $jurado1?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jurado 2</label>
                            <input type="text" name="jurado2" value="<?php echo $jurado2?>" class="form-control"
                                placeholder="Jurado 2.." readonly="readonly">
                        </div>
                    </div>
                </div>

                <div id="idBox" class="alert alert-danger alert-dismissible mt-6" style="Display: None;">
                    <h5>
                        <i id="idIConBox" class="icon fas fa-ban"></i>

                    </h5>
                    <p id="idMessageComen"></p>

                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-default float-right" style="margin-bottom: 10px "
                        onclick="history.back();">Volver</button>

                    <!--window.close(); opener.location.reload(); -->

                    <button id="idButtonActualizar" class="btn btn-primary float-right mr-2"
                        style="background-color: green; margin-bottom: 10px " type="submit">Registrar</button>

                    <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <!-- ejecu_act_tesisdir -->
                </div>

            </form>

            <script>
            
            </script>
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
    $("#idFormEdit").on("submit", function(e) {
        e.preventDefault();
        //$('#idButtonActualizar').attr("disabled", true);
        document.getElementById("idButtonActualizar").style.display = "none";
        document.getElementById("idSpinner").style.display = "block";

        var other_data = $("#idFormEdit").serializeArray();
        var paqueteDeDatos = new FormData();

        $.each(other_data, function(key, input) {
            paqueteDeDatos.append(input.name, input.value);
        });

        $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: "1.1-ejecu_act_vobo.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            //console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "VoBo");
                localStorage.setItem("Mensaje2-Message", "Visto bueno, realizado con éxito");
                //$('#idButtonActualizar').attr("disabled", true);
            } else {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "VoBo");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, no se realizo la operación");
                document.getElementById("idButtonActualizar").style.display = "block";
                //$('#idButtonActualizar').attr("disabled", false);
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